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
        $res['title'] = $this->title;
        $res['message'] = $this->message;
        $res['submessage'] = $this->submessage;
        $res['image'] = $this->image; 
        $res['timestamp'] = date("Y-m-d H:i:s"); 
        return $res;
    }

}