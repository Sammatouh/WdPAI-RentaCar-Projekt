<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Booking.php';
require_once __DIR__.'/../models/BookingDetails.php';

class BookingRepository extends Repository
{

    public function addBooking(Booking $booking): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO bookings (id_users, id_cars, "value", when_booked, no_days)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $booking->getIdUsers(),
            $booking->getIdCars(),
            $booking->getValue(),
            $booking->getWhenBooked(),
            $booking->getNoDays()
        ]);
    }

    public function getBookingsByUserId(int $id): ?array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM booking_details WHERE u_id = :id ORDER BY b_id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $bookingDet = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($bookingDet as $booking) {
            $result[] = new BookingDetails(
                $booking['b_id'],
                $booking['u_id'],
                $booking['email'],
                $booking['username'],
                $booking['surname'],
                $booking['carname'],
                $booking['image'],
                $booking['when_booked'],
                $booking['no_days'],
                $booking['value']
            );
        }

        return $result;
    }

    public function getAllBookings()
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM booking_details
        ');
        $stmt->execute();

        $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($bookings as $booking) {
            $result[] = new BookingDetails(
                $booking['b_id'],
                $booking['u_id'],
                $booking['email'],
                $booking['username'],
                $booking['surname'],
                $booking['carname'],
                $booking['image'],
                $booking['when_booked'],
                $booking['no_days'],
                $booking['value']
            );
        }

        return $result;
    }
}