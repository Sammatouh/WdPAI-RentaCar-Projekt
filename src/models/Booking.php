<?php


class Booking
{
    private $id;
    private $idUsers;
    private $idCars;
    private $value;
    private $whenBooked;
    private $noDays;

    public function __construct($idUsers, $idCars, $value, $whenBooked, $noDays, $id=null)
    {
        $this->id = $id;
        $this->idUsers = $idUsers;
        $this->idCars = $idCars;
        $this->value = $value;
        $this->whenBooked = $whenBooked;
        $this->noDays = $noDays;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getIdUsers()
    {
        return $this->idUsers;
    }

    public function setIdUsers($idUsers): void
    {
        $this->idUsers = $idUsers;
    }

    public function getIdCars()
    {
        return $this->idCars;
    }

    public function setIdCars($idCars): void
    {
        $this->idCars = $idCars;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value): void
    {
        $this->value = $value;
    }

    public function getWhenBooked()
    {
        return $this->whenBooked;
    }

    public function setWhenBooked($whenBooked): void
    {
        $this->whenBooked = $whenBooked;
    }

    public function getNoDays()
    {
        return $this->noDays;
    }

    public function setNoDays($noDays): void
    {
        $this->noDays = $noDays;
    }


}