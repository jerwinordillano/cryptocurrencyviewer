<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/28/2019
 * Time: 9:24 AM
 */

include "data.php";

class TableData{

    private $cdata;

    function getName(){
        $this->cdata = new CryptoData();
        $this->cdata->id = "ID";
        $this->cdata->rank = "#";
        $this->cdata->name = "Name";
        $this->cdata->symbol = "Symbol";
        $this->cdata->circ_supply = "Circulating Supply";
        $this->cdata->market_cap = "Market Cap";
        $this->cdata->price = "Price";
        $this->cdata->vol24h = "Volume(24h)";
        $this->cdata->percent1h = "%1h";
        $this->cdata->percent24h = "%24h";
        $this->cdata->percent7d = "%7d";
        return $this->cdata;
    }

    function getData($arr){

        $data = [];

        foreach($arr as $key => $value){
            if($key == "data"){
                foreach ($value as $key2 => $value2){

                    $this->cdata = new CryptoData();

                    $this->cdata->id = $value2["id"];
                    $this->cdata->rank = $value2["cmc_rank"];
                    $this->cdata->name = $value2["name"];
                    $this->cdata->symbol = $value2["symbol"];
                    $this->cdata->circ_supply = $value2["circulating_supply"];

                    foreach ($value2["quote"] as $key3 => $value3){
                        $this->cdata->market_cap = $value3["market_cap"];
                        $this->cdata->price = $value3["price"];
                        $this->cdata->vol24h = $value3["volume_24h"];
                        $this->cdata->percent1h = $value3["percent_change_1h"];
                        $this->cdata->percent24h = $value3["percent_change_24h"];
                        $this->cdata->percent7d = $value3["percent_change_7d"];
                    }

                    $data[] = $this->cdata;
                }
            }
        }

        return $data;
    }


}