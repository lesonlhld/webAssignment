<?php

namespace Model;

/**
 * USER_Model
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class PRODUCT_Model extends \Model\Model
{
    public function get_list_active($start = null, $limit = null)
    {
        if ($start == null && $limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM products WHERE publish=1 AND trash=0 ');
            $stmt->execute();

            return $stmt->fetchAll();
        } elseif ($limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM products WHERE publish=1 AND trash=0 LIMIT :start');
            $stmt->bindParam(':start', $start);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = $this->pdo->prepare('SELECT * FROM products WHERE publish=1 AND trash=0 LIMIT :start,:limit');
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':limit', $limit);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    public function count_active()
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM products WHERE publish=1 AND trash=0');
        $stmt->execute();

        return $stmt->fetchColumn();
    }
}
