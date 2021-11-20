<?php

namespace Model;

/**
 * USER_Model
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class USER_Model extends \Model\Model
{
    public function get_user($id = null)
    {
        if ($id == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM users');
            $stmt->execute();

            return $stmt->fetchAll();
        } else {
            $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id=:id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch();
        }
    }

    public function login($username, $password, $role = 1)
    {
        $password = hashpass($password);
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username=:username AND password=:password AND role_id=:role_id');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role_id', $role);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function register($data, $role = 1)
    {
        $password = hashpass($data['password']);
        $stmt = $this->pdo->prepare('INSERT INTO users(first_name, last_name, username, password, email, birth_date, phone, address, gender, avatar, role_id) VALUES (:first_name, :last_name, :username, :password, :email, :birth_date, :phone, :address, :gender, :avatar, :role_id)');
        $stmt->bindParam(':first_name', $data['firstname']);
        $stmt->bindParam(':last_name', $data['lastname']);
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':birth_date', $data['birthday']);
        $stmt->bindParam(':phone', $data['phone']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':gender', $data['gender']);
        $stmt->bindParam(':avatar', $data['avatar']);
        $stmt->bindParam(':role_id', $role);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    public function check_exist_email($email)
    {
        $stmt = $this->pdo->prepare('SELECT user_id FROM users WHERE email=:email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return count($stmt->fetchAll()) > 0;
    }

    public function check_exist_username($username)
    {
        $stmt = $this->pdo->prepare('SELECT user_id FROM users WHERE username=:username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return count($stmt->fetchAll()) > 0;
    }
}
