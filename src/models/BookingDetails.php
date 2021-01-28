<?php


class BookingDetails
{
    private $bookingId;
    private $userId;
    private $email;
    private $userName;
    private $surname;
    private $carName;
    private $image;
    private $whenBooked;
    private $days;
    private $value;


    public function __construct($bookingId, $userId, $email, $userName, $surname, $carName, $image, $whenBooked, $days, $value)
    {
        $this->bookingId = $bookingId;
        $this->userId = $userId;
        $this->email = $email;
        $this->userName = $userName;
        $this->surname = $surname;
        $this->carName = $carName;
        $this->image = $image;
        $this->whenBooked = $whenBooked;
        $this->days = $days;
        $this->value = $value;
    }

    public function getBookingId()
    {
        return $this->bookingId;
    }

    public function setBookingId($bookingId): void
    {
        $this->bookingId = $bookingId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName): void
    {
        $this->userName = $userName;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    public function getCarName()
    {
        return $this->carName;
    }

    public function setCarName($carName): void
    {
        $this->carName = $carName;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getWhenBooked()
    {
        return $this->whenBooked;
    }

    public function setWhenBooked($whenBooked): void
    {
        $this->whenBooked = $whenBooked;
    }

    public function getDays()
    {
        return $this->days;
    }

    public function setDays($days): void
    {
        $this->days = $days;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value): void
    {
        $this->value = $value;
    }


}