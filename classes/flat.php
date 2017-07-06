<?php
include '..\function.php';
include 'room.php';

class Flat
{
    public $room;

    /**
     * @param mixed $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }


//
//    function speedUp() /* проверка на MAX*/
//    {
//        if ($this->speed<$this->maxSpeed)
//        {
//            $this->speed += 5;
//        }
//    }
//
//    function on()
//    {
//        $this->engine=1;
//    }
//    function off()
//    {
//        $this->engine=0;
//    }
//
//    function speedDown()
//    {
//        if ($this->speed>=$this->maxSpeed) {
//            $this->speed=0;}
//    }
//
//
//    function status() /* выводит все значения машины*/
//    {
//echo "maxSpeed=".$this->maxSpeed."<br>";
//echo "speed=".$this->speed."<br>";
//echo "engine=".$this->engine."<br>";
//echo "model=".$this->model."<br>";
//    }
//    //$engienStatus)
//}
//
//$toyota = new Car();
////$ccc->getModel();
//$toyota->setMaxSpeed(5);
//$toyota->setSpeed(45);
//$toyota->setEngine(1);
//$toyota->setModel('toyota');
//
//$toyota->off();
//$toyota->speedDown();
////$toyota->speedUp();
//pre($toyota->status());
?>