<?php

namespace Model;

/**
 * CATEGORY_Model
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class CATEGORY_Model extends \Model\Model
{
    public function get_list($start = null, $limit = null)
    {
        if ($start == null && $limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM categories');
            $stmt->execute();

            return $stmt->fetchAll();
        } elseif ($limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM categories LIMIT :start');
            $stmt->bindParam(':start', $start);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = $this->pdo->prepare('SELECT * FROM categories LIMIT :start,:limit');
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':limit', $limit);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    public function count()
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM categories');
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function update_published($id)
    {
        $stmt = $this->pdo->prepare('SELECT publish FROM products WHERE product_id=:product_id');
        $stmt->bindParam(':product_id', $id);
        $stmt->execute();

        $publish = $stmt->fetchColumn();
        $publish = ($publish + 1) % 2;

        $stmt = $this->pdo->prepare('UPDATE products SET publish=:publish WHERE product_id =:product_id');
        $stmt->bindParam(':publish', $publish);
        $stmt->bindParam(':product_id', $id);
        $stmt->execute();

        return $publish;
    }

    public function update_trash($id, $trash)
    {
        $id_list = implode(",", $id);
        $stmt = $this->pdo->prepare("UPDATE products SET trash=:trash WHERE product_id IN ($id_list)");
        $stmt->bindParam(':trash', $trash);
        $stmt->execute();

        return true;
    }
}
