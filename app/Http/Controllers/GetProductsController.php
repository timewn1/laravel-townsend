<?php

namespace App\Http\Controllers;

use App\Actions\GetProductsAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetProductsController extends Controller
{
    /**
     * Dummy data for the purpose of the test, normally this would be set by a store builder class
     */
    public int $storeId = 3;

    private string $imagesDomain;

    public function __construct()
    {
        $this->imagesDomain = "https://img.tmstor.es/";
    }

    public function __invoke()
    {
        return $this->getStoreProductsBySectionWithPaginationAndSorting($this->storeId, '%', $_GET['number'] ?? null, $_GET['page'] ?? null, $_GET['sort'] ?? 0);
    }

    public function getStoreProductsBySectionWithPaginationAndSorting($store_id, $section, $number = null, $page = 'null', $sort = 0)
    {
        if ($store_id == '') {
            die;
        }

        if (!is_numeric($number) || $number < 1) {
            $number = 8;
        }

        if (!is_numeric($page) || $page < 1) {
            $page = 1;
        }

        $section_field = 'description';
        $section_compare = 'LIKE';
        if (is_numeric($section)) {
            $section_field = 'id';
            $section_compare = '=';
        }

        if ($sort === 0) {
            $sort = "position";
        }

        switch ($sort) {
            case "az":
                $order = "ORDER BY name Asc";
                break;
            case "za":
                $order = "ORDER BY name Desc";
                break;
            case "low":
                $order = "ORDER BY price Asc";
                break;
            case "high":
                $order = "ORDER BY price Desc";
                break;
            case "old":
                $order = "ORDER BY release_date Asc";
                break;
            case "new":
                $order = "ORDER BY release_date Desc";
                break;

            default:
                if ((isset($section) && ($section == "%" || $section == "all"))) {
                    $order = "ORDER BY sp.position ASC, release_date DESC";
                } else {
                    $order = "ORDER BY store_products_section.position ASC, release_date DESC";
                }
                break;
        }

        $date_time = time();
        $products = array();
        $x = 0;

        //Beginning of selection query used in 3 places below
        $query_start = "SELECT sp.id, artist_id, type, display_name, name, launch_date, remove_date, sp.description,
                                    available, price, euro_price, dollar_price, image_format, disabled_countries,release_date
                                FROM store_products sp ";

        if (isset($number) && isset($page) && $page != null) {
            $page = ($page-1)*$number;
            $pages = " LIMIT $page,$number";

            $query = $query_start;

            if ($section != '%' && strtoupper($section) != 'ALL') {

                $query .= "INNER JOIN store_products_section ON store_products_section.store_product_id = sp.id
                            INNER JOIN sections ON store_products_section.section_id = sections.id
                            WHERE sections.$section_field $section_compare '$section' AND ";

            } else {
                $query .= "LEFT JOIN sections ON sections.id = -1 WHERE ";
            }
            $query.= " sp.store_id= '$store_id' AND deleted = '0' AND available = 1 ";

            $result = DB::select($query);
            $num_products = count($result);

            $no_pages = ceil($num_products/$number);
            $products['pages'] = $no_pages;
        } else {
            if (isset($number)) {
                $pages = " LIMIT $number";
            } else {
                $pages = '';
            }
        }

        $query = $query_start;

        if ($section != '%') {
            $query .= "INNER JOIN store_products_section ON store_products_section.store_product_id = sp.id
                        INNER JOIN sections ON store_products_section.section_id = sections.id
                        WHERE sections.$section_field $section_compare '$section' AND ";
            $orderby = " ORDER BY store_products_section.position ASC, sp.position ASC, release_date DESC$pages";
        } else {
            $query .= "LEFT JOIN sections ON sections.id = -1 WHERE ";
            $orderby = " ORDER BY position ASC, release_date DESC$pages";
        }

        $query .= " sp.store_id = '$store_id' AND deleted = '0' AND available = 1  ";
        $query .= $orderby;

        $result = array_map('array_values', json_decode(json_encode(DB::select($query)), true));


        while (list($main_id, $artist_id, $type, $display_name, $name, $launch_date, $remove_date, $description, $available, $price, $euro_price, $dollar_price, $image_format, $disabled_countries, $release_date) = array_pop($result)) {

            if ($launch_date != null && !isset($_SESSION['preview_mode'])) {
                $launch = strtotime($launch_date);
                if ($launch > time()) {
                    continue;
                }
            }
            if ($remove_date != null) {
                $remove = strtotime($remove_date);
                if ($remove < $date_time) {
                    $available = 0;
                }
            }

            //check territories
            if ($disabled_countries != '') {
                $countries = explode(',', $disabled_countries);
                $geocode = $this->getGeocode();
                $country_code = $geocode['country'];

                if (in_array($country_code, $countries)) {
                    $available = 0;
                }
            }

            switch (session(['currency'])) {
                case "USD":
                    $price = $dollar_price;
                    break;
                case "EUR":
                    $price = $euro_price;
                    break;
            }

            if ($available == 1) {
                $query = "SELECT name FROM artists WHERE id = '$artist_id'";
                $artist = DB::select($query)[0]?->name;

                if (strlen($image_format) > 2) {
                    $products[$x]['image'] = $this->imagesDomain."/$main_id.".$image_format;
                } else {
                    $products[$x]['image'] = $this->imagesDomain."noimage.jpg";
                }

                $products[$x]['id'] = $main_id;
                $products[$x]['artist'] = $artist;
                $products[$x]['title'] = strlen($display_name) > 3 ? $display_name : $name;
                $products[$x]['description'] = $description;
                $products[$x]['price'] = $price;
                $products[$x]['format'] = $type;
                $products[$x]['release_date'] = $release_date;

                $x++;
            }
        }

        if (!empty($products)) {
            return $products;
        } else {
            return false;
        }
    }


    public function getGeocode()
    {
        //Return GB default for the purpose of the test
        return ['country' => 'GB'];
    }
}
