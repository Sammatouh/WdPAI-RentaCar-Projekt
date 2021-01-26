<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    private function getUserDetailsId($user)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.user_details WHERE phone = :phone AND join_time = :joinTime
        ');

        $phone = $user->getPhone();
        $joinTime = $user->getJoinTime();

        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':joinTime', $joinTime, PDO::PARAM_STR);

        $stmt->execute();

        $response = $stmt->fetch(PDO::FETCH_ASSOC);

        return $response['id'];
    }

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.user_details u_d JOIN public.users u ON u.id_user_details = u_d.id WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['phone'],
            $user['avatar'],
            $user['join_time'],
            $user['id']
        );
    }

    public function addUser($user): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO user_details (name, surname, phone, avatar, join_time)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getPhone(),
            $user->getAvatar(),
            $user->getJoinTime()
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (id_user_details, email, password)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $this->getUserDetailsId($user),
            $user->getEmail(),
            $user->getPassword()
        ]);
    }

    public function isUserAdmin(int $id)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.admins a JOIN public.users u ON u.id = a.id_users WHERE u.id = :id
        ');
        $stmt->bindParam(':id', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return false;
        }
        else {
            return true;
        }
    }
}