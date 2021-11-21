<?php

namespace Model;

/**
 * USER_Model
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class USER_Model extends \Model\Model
{
    public function get_user($role = 1, $start = null, $limit = null)
    {
        if ($start == null && $limit == null) {

            $stmt = $this->pdo->prepare('SELECT * FROM users WHERE role_id=:role_id AND trash=0');
            $stmt->bindParam(':role_id', $role);
            $stmt->execute();

            return $stmt->fetchAll();
        } elseif ($limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM users WHERE role_id=:role_id AND trash=0 LIMIT :start');
            $stmt->bindParam(':role_id', $role);
            $stmt->bindParam(':start', $start);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = $this->pdo->prepare('SELECT * FROM users WHERE role_id=:role_id AND trash=0 LIMIT :start,:limit');
            $stmt->bindParam(':role_id', $role);
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':limit', $limit);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    public function count($role = 1)
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM users WHERE role_id=:role_id AND trash=0');
        $stmt->bindParam(':role_id', $role);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function login($email, $password, $role = 1)
    {
        $password = hashpass($password);
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email=:email AND password=:password AND role_id=:role_id');
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role_id', $role);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function register($data, $role = 1)
    {
        $password = hashpass($data['password']);
        $stmt = $this->pdo->prepare('INSERT INTO users(first_name, last_name, password, email, birth_date, phone, address, gender, avatar, role_id) VALUES (:first_name, :last_name, :password, :email, :birth_date, :phone, :address, :gender, :avatar, :role_id)');
        $stmt->bindParam(':first_name', $data['firstname']);
        $stmt->bindParam(':last_name', $data['lastname']);
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
        $stmt = $this->pdo->prepare('SELECT id FROM users WHERE email=:email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return count($stmt->fetchAll()) > 0;
    }

    public function update_published($id)
    {
        $stmt = $this->pdo->prepare('SELECT publish FROM users WHERE id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $publish = $stmt->fetchColumn();
        $publish = ($publish + 1) % 2;

        $stmt = $this->pdo->prepare('UPDATE users SET publish=:publish WHERE id =:id');
        $stmt->bindParam(':publish', $publish);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $publish;
    }

    public function update_trash($id, $trash)
    {
        $id_list = implode(",", $id);
        $stmt = $this->pdo->prepare("UPDATE users SET trash=:trash WHERE id IN ($id_list)");
        $stmt->bindParam(':trash', $trash);
        $stmt->execute();

        return true;
    }

    public function update_password($id, $new_password)
    {
        $password = hashpass($new_password);
        $stmt = $this->pdo->prepare('UPDATE users SET password=:password WHERE id =:id');
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return true;
    }
}
