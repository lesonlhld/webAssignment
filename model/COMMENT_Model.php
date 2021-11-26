<?php

namespace Model;

class COMMENT_Model extends \Model\Model
{
    public function get_list_by_product($product_id)
    {
        $stmt = $this->pdo->prepare("SELECT c.rate AS comment_rate, c.comment, c.create_at, c.create_by, c.product_id, u.avatar, u.first_name, u.last_name FROM comments c LEFT JOIN products p ON c.product_id=p.product_id LEFT JOIN users u ON c.create_by=u.id WHERE c.product_id=:product_id");
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        return $stmt->fetchAll();
        
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
        $stmt = $this->pdo->prepare("SELECT * FROM comments WHERE comment_id=:comment_id");
        $stmt->bindParam(':comment_id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }
}
