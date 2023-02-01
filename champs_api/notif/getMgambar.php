<?php

require_once 'DbOperation.php';

$db = new DbOperation();

$devices = $db->getMgambar('aaa');

//$response = array();

//$response['error'] = false;
//$response['no_tiket'] = array();

while ($device = $devices->fetch_assoc()) {
//    $temp = array();
    $temp['to_dept'] = $device['to_dept'];
    $temp['nm_gambar'] = $device['nm_gambar'];
    $temp['no_tiket'] = $device['no_tiket'];
    $ini = $device['nm_gambar'];
//    array_push($response['no_tiket'],$temp);
}
//echo $ini;
//echo json_encode($response);