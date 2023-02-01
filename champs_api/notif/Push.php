<?php

date_default_timezone_set('Asia/Jakarta');
class Push
{
    //notification title
    private $title;

    //notification message 
    private $message;
    private $submessage;

    //notification image url 
    private $image; 

    //initializing values in this constructor
    function __construct($title, $message, $submessage, $image )
    {
        $this->title = $title;
        $this->message = $message;
        $this->submessage = $submessage;
        $this->image = $image; 
    }

    //getting the push notification
    public function getPush()
    {
        $res = array();
        $res['data']['title'] = $this->title;
        $res['data']['message'] = $this->message;
        $res['data']['submessage'] = $this->submessage;
        $res['data']['image'] = $this->image; 
        $res['data']['timestamp'] = date("Y-m-d H:i:s"); 
        return $res;
    }

}