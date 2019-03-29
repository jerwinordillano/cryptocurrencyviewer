<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/28/2019
 * Time: 11:21 AM
 */

include "resources/setting.php";
include "resources/crypto.php";

$data = new SettingData();
$crypto = new GetCryptocurrencyRate($data->histurl . "", $data->key . "");
$data = $crypto->getJsonData();

echo "<pre>";
print_r($data);
echo "</pre>";
?>