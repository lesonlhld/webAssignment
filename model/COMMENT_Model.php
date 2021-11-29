<?php

namespace Model;

class COMMENT_Model extends \Model\Model
{
    public function get_list($start = null, $limit = null)
    {
        if ($start == null && $limit == null) {
            $stmt = $this->pdo->prepare("SELECT c.rate AS comment_rate, c.id AS comment_id, c.comment, c.create_at, c.create_by, c.product_id, p.product_name AS product_name, u.avatar, u.first_name, u.last_name FROM comments c LEFT JOIN products p ON c.product_id=p.product_id LEFT JOIN users u ON c.create_by=u.id");
        } elseif ($limit == null) {
            $stmt = $this->pdo->prepare("SELECT c.rate AS comment_rate, c.id AS comment_id, c.comment, c.create_at, c.create_by, c.product_id, p.product_name AS product_name, u.avatar, u.first_name, u.last_name FROM comments c LEFT JOIN products p ON c.product_id=p.product_id LEFT JOIN users u ON c.create_by=u.id LIMIT :start");
            $stmt->bindParam(':start', $start);
        } else {
            $stmt = $this->pdo->prepare("SELECT c.rate AS comment_rate, c.id AS comment_id, c.comment, c.create_at, c.create_by, c.product_id, p.product_name AS product_name, u.avatar, u.first_name, u.last_name FROM comments c LEFT JOIN products p ON c.product_id=p.product_id LEFT JOIN users u ON c.create_by=u.id LIMIT :start,:limit");
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':limit', $limit);
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function get_list_by_product($product_id, $start = null, $limit = null)
    {
        if ($start == null && $limit == null) {
            $stmt = $this->pdo->prepare("SELECT c.rate AS comment_rate, c.id AS comment_id, c.comment, c.create_at, c.create_by, c.product_id, p.product_name AS product_name, u.avatar, u.first_name, u.last_name FROM comments c LEFT JOIN products p ON c.product_id=p.product_id LEFT JOIN users u ON c.create_by=u.id WHERE c.product_id=:product_id");
        } elseif ($limit == null) {
            $stmt = $this->pdo->prepare("SELECT c.rate AS comment_rate, c.id AS comment_id, c.comment, c.create_at, c.create_by, c.product_id, p.product_name AS product_name, u.avatar, u.first_name, u.last_name FROM comments c LEFT JOIN products p ON c.product_id=p.product_id LEFT JOIN users u ON c.create_by=u.id WHERE c.product_id=:product_id LIMIT :start");
            $stmt->bindParam(':start', $start);
        } else {
            $stmt = $this->pdo->prepare("SELECT c.rate AS comment_rate, c.id AS comment_id, c.comment, c.create_at, c.create_by, c.product_id, p.product_name AS product_name, u.avatar, u.first_name, u.last_name FROM comments c LEFT JOIN products p ON c.product_id=p.product_id LEFT JOIN users u ON c.create_by=u.id WHERE c.product_id=:product_id LIMIT :start,:limit");
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':limit', $limit);
        }
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function count()
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM comments LEFT JOIN products ON comments.product_id=products.product_id");         
        $stmt->execute();
        return $stmt->fetchColumn();
        
    }

    public function count_by_product($product_id)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM comments LEFT JOIN products ON comments.product_id=products.product_id WHERE comments.product_id=:product_id");  
        $stmt->bindParam(':product_id', $product_id);         
        $stmt->execute();
        return $stmt->fetchColumn();
        
    }

    public function get($id)
    {
        $stmt = $this->pdo->prepare("SELECT c.rate AS comment_rate, c.id AS comment_id, c.comment, c.create_at, c.create_by, c.product_id, p.product_name AS product_name, u.avatar, u.first_name, u.last_name FROM comments c LEFT JOIN products p ON c.product_id=p.product_id LEFT JOIN users u ON c.create_by=u.id WHERE c.id=:comment_id");
        $stmt->bindParam(':comment_id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function create($member_id, $product_id, $data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO comments(rate, comment, create_by, product_id) VALUES (:rate, :comment, :create_by, :product_id)');
        $stmt->bindParam(':rate', $data['stars-rating']);
        $stmt->bindParam(':comment', $data['comment']);
        $stmt->bindParam(':create_by', $member_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        return true;
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE comments SET rate=:rate, comment=:comment WHERE id=:id');
        $stmt->bindParam(':rate', $data['rate']);
        $stmt->bindParam(':comment', $data['content']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return true;
    }

    public function delete($id)
    {
        $id_list = implode(",", $id);
        $stmt = $this->pdo->prepare("DELETE FROM comments WHERE id IN ($id_list)");
        $stmt->execute();

        return true;
    }
}
