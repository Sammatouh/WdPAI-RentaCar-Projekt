<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.user_details u_d JOIN public.users u ON u_d.id_users = u.id WHERE email = :email
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
            $user['id_users']
        );
    }

    public function addUser(User $user): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password)
            VALUES (?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword()
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO user_details ("name", surname, phone, avatar, join_time, id_users)
            VALUES (?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getPhone(),
            $user->getAvatar(),
            $user->getJoinTime(),
            $this->getUserId($user->getEmail())
        ]);


    }

    public function isUserAdmin(int $id)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.admins WHERE id_users = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return false;
        }
        else {
            return true;
        }
    }

    private function getUserId($email)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT id FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $response = $stmt->fetch(PDO::FETCH_ASSOC);

        return $response['id'];
    }
}