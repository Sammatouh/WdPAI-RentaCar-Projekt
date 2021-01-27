<?php

require_once __DIR__.'/../models/Car.php';

class CarRepository extends Repository
{
    public function getCar(int $id): ?Car
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cars WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $car = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($car == false)
            return null;

        return new Car(
            $car['name'],
            $car['image'],
            $car['info'],
            $car['price_per_day'],
            $car['id']
        );
    }

    public function getAllCars(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cars ORDER BY id
        ');
        $stmt->execute();
        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($cars as $car) {
            $result[] = new Car(
                $car['name'],
                $car['image'],
                $car['info'],
                $car['price_per_day'],
                $car['id']
            );
        }

        return $result;
    }
}