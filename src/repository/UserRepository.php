<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUserByUsername(string $username): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE username = :username
        ');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$user) {
            return null;
        }

        return new User($user['email'], $user['password'], $user['username'], $user['phone'], $user['id_user'], $user['id_role']);
    }
    public function addNewUser(User $user): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users (username, password, email, phone, id_role)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->getUsername(),
            $user->getPassword(),
            $user->getEmail(),
            $user->getPhone(),
            $user->getIdRole()
        ]);
    }
}