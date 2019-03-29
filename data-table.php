<?php

include "resources/setting.php";
include "resources/crypto.php";

$data = new SettingData();
$crypto = new GetCryptocurrencyRate($data->url . "", $data->key . "");
$data = $crypto->getJsonData();
?>

<div class="col-md-12">
    <table class="table table-hover text-right">
        <thead>
        <?php $crypto->getTableName(); ?>
        </thead>
        <tbody>
        <?php
            if(!isset($_GET["search"])){
                $crypto->getTableData($data);
            }
            else if($_GET["search"] == ""){
                $crypto->getTableData($data);
            }
            else{
                $crypto->getTableDataByName($data, $_GET["search"]);
            }

        ?>
        </tbody>
    </table>
</div>