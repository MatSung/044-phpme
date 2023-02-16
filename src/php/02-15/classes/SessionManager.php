<?php
class SessionManager
{

    private array $timestamps;

    function __construct(private int $hitLimit = 10, private int $hitTimer = 60)
    {
        session_start();
        if(!isset($_SESSION['timestamps'])){
            $currentTime = time();
            $_SESSION['timestamps'] = json_encode([$currentTime]);
            $this->timestamps = time();
        } else {
            $this->timestamps = json_decode($_SESSION['timestamps'], true);
            array_unshift($this->timestamps, time());
            $this->timestamps = $this->clearTimestamps($this->timestamps);
            if(!$this->isOverLimit()){
                $_SESSION['timestamps'] = json_encode($this->timestamps);
            }
        }
    }

    public function clearTimestamps($data){
        //clean timestamps older than 1 minute
        for ($i=1; $i < count($data); $i++) { 
            if(time() - $data[$i] > $this->hitTimer){
                // it will never be 0 because just before checking the timestamp you will add one current timestamp
                array_splice($data,$i-1);
                break;
            }
        }
        return $data;
    }

    public function isOverLimit(): bool
    {
        if(count($this->timestamps) > $this->hitLimit){
            return true;
            serveData('Too many requests', 429, 'error');
        }
        return false;
    }

}
