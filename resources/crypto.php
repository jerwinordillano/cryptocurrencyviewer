<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/27/2019
 * Time: 10:07 PM
 */

include "datatable.php";

class GetCryptocurrencyRate extends TableData {


    private $key;
    private $url;

    function __construct($url, $key)
    {
        $this->url  = $url;
        $this->key = $key;
    }

    function getJsonData(){

        $parameters = [
            'start' => '1',
            'limit' => '10',
            'convert'=> 'USD',
        ];

        $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: ' . $this->key
        ];

        $qs = http_build_query($parameters);
        $request = "{$this->url}?{$qs}";


        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => 1
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }

    function getTableName(){
        $cdata = $this->getName();
        echo "<tr>";
        echo "<th class='text-right'>".$cdata->rank."</th>";
        echo "<th class='text-right'>".$cdata->name."</th>";
        echo "<th class='text-right'>".$cdata->symbol."</th>";
        echo "<th class='text-right'>".$cdata->market_cap."</th>";
        echo "<th class='text-right'>".$cdata->price."</th>";
        echo "<th class='text-right'>".$cdata->circ_supply."</th>";
        echo "<th class='text-right'>".$cdata->vol24h."</th>";
        echo "<th class='text-right'>".$cdata->percent1h."</th>";
        echo "<th class='text-right'>".$cdata->percent24h."</th>";
        echo "<th class='text-right'>".$cdata->percent7d."</th>";
        echo "</tr>";
    }

    function getTableData($arr)
    {
        $cdata = $this->getData($arr);
        for($x = 0; $x < count($cdata); $x++){
            echo "<tr>";
            echo "<td>".$cdata[$x]->rank."</td>";
            echo "<td>".$cdata[$x]->name."</td>";
            echo "<td>".$cdata[$x]->symbol."</td>";
            echo "<td>".number_format($cdata[$x]->market_cap, 2)."</td>";
            echo "<td>".number_format($cdata[$x]->price, 0)."</td>";
            echo "<td>".number_format($cdata[$x]->circ_supply,0)."</td>";
            echo "<td>".number_format($cdata[$x]->vol24h, 0)."</td>";
            echo "<td>".number_format($cdata[$x]->percent1h,2)."</td>";
            echo "<td>".number_format($cdata[$x]->percent24h,2)."</td>";
            echo "<td>".number_format($cdata[$x]->percent7d,2)."</td>";
            echo "</tr>";
        }
    }

    function getTableDataByName($arr, $name)
    {
        $cdata = $this->getData($arr);
        for($x = 0; $x < count($cdata); $x++){
            if(stripos(strtolower($cdata[$x]->name), strtolower($name)) !== FALSE){
                echo "<tr>";
                echo "<td>".$cdata[$x]->rank."</td>";
                echo "<td>".$cdata[$x]->name."</td>";
                echo "<td>".$cdata[$x]->symbol."</td>";
                echo "<td>".number_format($cdata[$x]->market_cap, 2)."</td>";
                echo "<td>".number_format($cdata[$x]->price, 0)."</td>";
                echo "<td>".number_format($cdata[$x]->circ_supply,0)."</td>";
                echo "<td>".number_format($cdata[$x]->vol24h, 0)."</td>";
                echo "<td>".number_format($cdata[$x]->percent1h,2)."</td>";
                echo "<td>".number_format($cdata[$x]->percent24h,2)."</td>";
                echo "<td>".number_format($cdata[$x]->percent7d,2)."</td>";
                echo "</tr>";
            }
        }
    }
}