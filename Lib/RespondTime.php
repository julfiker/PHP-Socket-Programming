<?php
namespace Lib;

class RespondTime {

    /**
     * @var timestamp
     */
    private  $startTime;

    /**
     * Constructor that would be called when RespondeTime object has created, will be injected startTime
     * @param $startTime
     */
    public function __construct($startTime) {
        $this->startTime = $startTime;
    }

    /**
     * Get respondTime from server started time to current time
     *
     * @param $timestamp
     * @return string
     */
    public function getTime($timestamp){
        $difference = $timestamp - $this->startTime;
        $periods = array("second", "minute", "hour", "day", "week", "month", "years", "decade");
        $lengths = array("60","60","24","7","4.35","12","10");
        for($j = 0; $difference >= $lengths[$j]; $j++)
            $difference /= $lengths[$j];
        $difference = round($difference);
        if($difference != 1) $periods[$j].= "s";
        $text = "$difference $periods[$j] ago";
        return $text;
    }
} 