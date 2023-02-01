<?php
//importing required files 
require_once 'DbOperation.php';
require_once 'Firebase.php';
require_once 'Push.php';

$db          = new DbOperation();
$response    = array();

$jsonInputan = json_decode(file_get_contents('php://input'));
$title       = $jsonInputan->title;
$message     = $jsonInputan->message;
$email       = $jsonInputan->email;
$ico         = null;

$push = new Push($title, $message, 'Auto System', $ico);
$mPushNotification = $push->getPush();
$devicetoken = $db->getTokenC2();
$firebase = new Firebase();

echo $firebase->send($devicetoken, $mPushNotification);

/*
if($_SERVER['REQUEST_METHOD']=='POST'){
    //hecking the required params
    if(isset($_POST['title']) and isset($_POST['message']) and isset($_POST['email'])){

        //creating a new push
//        $push = null;
//        $aa=$email;
//        echo $aa;

        //first check if the push has an image with it
//        if(isset($_POST['image'])){
//            //getting the token from database object
//            $notiket = $_POST['image'];
//            $devices = $db->getMgambar($notiket);
//
//            while($device = $devices->fetch_assoc()){
////    $temp = array();
//                $temp['to_dept']=$device['to_dept'];
//                $temp['nm_gambar']=$device['nm_gambar'];
//                $temp['no_tiket']=$device['no_tiket'];
//                $ini = "http://portal.champ-group.com/notifierpo/champs_api/images_request/".$device['nm_gambar'];
////    array_push($response['no_tiket'],$temp);
//            }
////            echo $notiket;
////            echo $ini;
//            $push = new Push(
//                $_POST['title'],
//                $_POST['message'],
//                $ini
//            );
//        }else{

            //if the push don't have an image give null in place of image
//            $push = new Push($title, $message, null);
//                $_POST['message'],
//                null
//            );
//        }

        //getting the push from push object
        $mPushNotification = $push->getPush();

        //getting the token from database object
        $devicetoken = $db->getTokenByNip($email);

        //creating firebase class object
        $firebase = new Firebase();

        //sending push notification and displaying result
        echo $firebase->send($devicetoken, $mPushNotification);
    }else{
        $response['error']=true;
        $response['message']='Parameters missing';
    }
}else{
    $response['error']=true;
    $response['message']='Invalid request';
}

echo json_encode($response); */