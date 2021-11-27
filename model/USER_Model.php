<?php

namespace Model;

/**
 * USER_Model
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class USER_Model extends \Model\Model
{
    public function get_list($role = 1, $trash = 0, $start = null, $limit = null)
    {
        if ($start == null && $limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM users WHERE role_id=:role_id AND trash=:trash');
            $stmt->bindParam(':role_id', $role);
            $stmt->bindParam(':trash', $trash);
            $stmt->execute();

            return $stmt->fetchAll();
        } elseif ($limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM users WHERE role_id=:role_id AND trash=:trash LIMIT :start');
            $stmt->bindParam(':role_id', $role);
            $stmt->bindParam(':trash', $trash);
            $stmt->bindParam(':start', $start);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = $this->pdo->prepare('SELECT * FROM users WHERE role_id=:role_id AND trash=:trash LIMIT :start,:limit');
            $stmt->bindParam(':role_id', $role);
            $stmt->bindParam(':trash', $trash);
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':limit', $limit);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    public function count($role = 1, $trash = 0)
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM users WHERE role_id=:role_id AND trash=:trash');
        $stmt->bindParam(':role_id', $role);
        $stmt->bindParam(':trash', $trash);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function get($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function get_by_email($email)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email=:email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function login($email, $password)
    {
        $password = hashpass($password);
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email=:email AND password=:password');
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function create($data, $role = 1)
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
        $stmt->bindParam(':avatar', $data['image']);
        $stmt->bindParam(':role_id', $role);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE users SET first_name=:first_name, last_name=:last_name, email=:email, birth_date=:birth_date, phone= :phone, address= :address, gender= :gender, avatar=:avatar WHERE id=:id');
        $stmt->bindParam(':first_name', $data['firstname']);
        $stmt->bindParam(':last_name', $data['lastname']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':birth_date', $data['birthday']);
        $stmt->bindParam(':phone', $data['phone']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':gender', $data['gender']);
        $stmt->bindParam(':avatar', $data['image']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return true;
    }

    public function check_exist_email($email)
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM users WHERE email=:email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function check_exist_phone($phone)
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM users WHERE phone=:phone');
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();

        return $stmt->fetchColumn();
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

    public function delete($id)
    {
        $id_list = implode(",", $id);
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id IN ($id_list)");
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

    public function update_token($email, $token = null)
    {
        $stmt = $this->pdo->prepare('UPDATE users SET token=:token WHERE email =:email');
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return true;
    }
}
