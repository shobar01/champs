<?php
//importing required files 
require_once 'DbOperation.php';
require_once 'Firebase.php';
require_once 'Push.php';

$db = new DbOperation();
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //hecking the required params
    if (isset($_POST['title']) and isset($_POST['message'])) {

        //creating a new push
        $push = null;
//        $nip = $_POST['nip'];
//        echo $aa; 
            //if the push don't have an image give null in place of image
            $push = new Push(
                $_POST['title'],
                $_POST['message'],
                $_POST['submessage'],
                null
            ); 

        //getting the push from push object
        $mPushNotification = $push->getPush(); 
        //getting the token from database object
        $devicetoken = $db->getTokenICT();
        //creating firebase class object
        $firebase = new Firebase(); 
        //sending push notification and displaying result
        echo $firebase->send($devicetoken, $mPushNotification);
    } else {
        $response['error'] = true;
        $response['message'] = 'Parameters missing';
    }
} else {
    $response['error'] = true;
    $response['message'] = 'Invalid request';
}

echo json_encode($response);