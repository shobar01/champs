<?php
//importing required files 
require_once 'DbOperation.php';
require_once 'Firebase.php';
require_once 'Push.php';

$db = new DbOperation();
$jsonInputan = json_decode(file_get_contents('php://input'));
$title = $jsonInputan->title;
$message = $jsonInputan->message;
$submessage = $jsonInputan->submessage;
$email = $jsonInputan->dept;

$response = array();
 
    if (isset($title) and isset($message) and isset($email)) {

        //creating a new push
        $push = null;
        $aa = $email;
//        echo $aa;


        //first check if the push has an image with it
        // if (isset($_POST['image'])) {
        //     //getting the token from database object
        //     $notiket = $_POST['image'];
        //     $devices = $db->getMgambar($notiket);

        //     while ($device = $devices->fetch_assoc()) { 
        //         $temp['to_dept'] = $device['to_dept'];
        //         $temp['nm_gambar'] = $device['nm_gambar'];
        //         $temp['no_tiket'] = $device['no_tiket'];
        //         $ini = "http://portal.champ-group.com/notifierpo/champs_api/images_request/" . $device['nm_gambar']; 
        //     } 
        //     $push = new Push(
        //         $_POST['title'],
        //         $_POST['message'],
        //         $_POST['submessage'],  
        //         $notiket
        //     );
        // } else {
            //if the push don't have an image give null in place of image
            $push = new Push(
                $title,
                $message,
                $submessage,
                null
            );
        // }

        //getting the push from push object
        $mPushNotification = $push->getPush();

        //getting the token from database object
        
        // $devicetoken = $db->getTokenKdakses($email); 
        $devicetoken = $db->getTokenByEmail($aa);

        //creating firebase class object
        $firebase = new Firebase();

        //sending push notification and displaying result
        echo $firebase->send($devicetoken, $mPushNotification);
    } else {
        $response['error'] = true;
        $response['message'] = 'Parameters missing';
    } 
echo json_encode($response);