<?php

namespace Model;

/**
 * USER_Model
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class PRODUCT_Model extends \Model\Model
{
    public function get_product($start = null, $limit = null)
    {
        if ($start == null && $limit == null) {

            $stmt = $this->pdo->prepare('SELECT * FROM products');
            $stmt->execute();

            return $stmt->fetchAll();
        } elseif ($limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM users LIMIT :start');
            $stmt->bindParam(':role_id', $role);
            $stmt->bindParam(':start', $start);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = $this->pdo->prepare('SELECT * FROM users LIMIT :start,:limit');
            $stmt->bindParam(':role_id', $role);
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':limit', $limit);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    public function count($role = 1)
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM users WHERE role_id=:role_id');
        $stmt->bindParam(':role_id', $role);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

}
