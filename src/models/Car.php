<?php


class Car
{
    private $id;
    private $name;
    private $image;
    private $info;
    private $pricePerDay;

    public function __construct($name, $image, $info, $pricePerDay, $id=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->info = $info;
        $this->pricePerDay = $pricePerDay;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function setInfo($info): void
    {
        $this->info = $info;
    }

    public function getPricePerDay()
    {
        return $this->pricePerDay;
    }

    public function setPricePerDay($pricePerDay): void
    {
        $this->pricePerDay = $pricePerDay;
    }

}