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

    public function getCarsBySearch(string $search)
    {
        $search = '%'.strtolower($search).'%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cars WHERE LOWER(name) LIKE :search OR LOWER(info) LIKE :search
        ');
        $stmt->bindParam(':search', $search, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}