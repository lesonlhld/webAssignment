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

    public function login($username, $password)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username=:username AND password=:password');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        return $stmt->fetch();
    }
}
