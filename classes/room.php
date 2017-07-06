<?php
include '..\function.php';
class Room
{
    public $window;
    public  $door;
    public  $light;

    /**
     * @return mixed
     */
    public function getWindow()
    {
        return $this->window;
    }

    /**
     * @return mixed
     */
    public function getDoor()
    {
        return $this->door;
    }

    /**
     * @return mixed
     */
    public function getLight()
    {
        return $this->light;
    }

    /**
     * @param mixed $window
     */
    public function setWindow($window)
    {
        $this->window = $window;
    }

    /**
     * @param mixed $door
     */
    public function setDoor($door)
    {
        $this->door = $door;
    }

    /**
     * @param mixed $light
     */
    public function setLight($light)
    {
        $this->light = $light;
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