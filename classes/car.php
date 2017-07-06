<?php
include '..\function.php';
class Car
{
    //const URL='...';
    public $model;
    public  $speed;
    public  $engine;
    public  $maxSpeed;

//    public function __construct()
//    {
//        $this->model=$model;
//        $this->engine=$engine;
//        $this->maxSpeed=$maxSpeed;
//        $this->speed=$speed;
//    }

    /**
     * @return mixed
     */
    public function getMaxSpeed()
    {
        return $this->maxSpeed;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @param $maxSpeed
     */
    public function setMaxSpeed($maxSpeed)
    {
        $this->maxSpeed = $maxSpeed;
    }

    /**
     * @param mixed $speed
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    /**
     * @param mixed $engien
     */
    public function setEngine($engine)
    {
        $this->engine = $engine;
    }

    function speedUp() /* проверка на MAX*/
    {
        if ($this->speed<$this->maxSpeed)
        {
            $this->speed += 5;
        }
    }

    function on()
    {
        $this->engine=1;
    }
    function off()
    {
        $this->engine=0;
    }

    function speedDown()
    {
        if ($this->speed>=$this->maxSpeed) {
            $this->speed=0;}
    }


    function status() /* выводит все значения машины*/
    {
echo "maxSpeed=".$this->maxSpeed."<br>";
echo "speed=".$this->speed."<br>";
echo "engine=".$this->engine."<br>";
echo "model=".$this->model."<br>";
    }
    //$engienStatus)
}

$toyota = new Car();
//$ccc->getModel();
$toyota->setMaxSpeed(5);
$toyota->setSpeed(45);
$toyota->setEngine(1);
$toyota->setModel('toyota');

$toyota->off();
$toyota->speedDown();
//$toyota->speedUp();
pre($toyota->status());
?>