<?php
class SessionManager
{
    public static function clearTimestamps($data){
        //clean timestamps older than 1 minute
        for ($i=1; $i < count($data); $i++) { 
            if(time() - $data[$i] > 60){
                // it will never be 0 because just before checking the timestamp you will add one current timestamp
                array_splice($data,$i-1);
                break;
            }
        }
        return $data;
    }
}
