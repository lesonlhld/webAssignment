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
            $stmt = $this->pdo->prepare('SELECT categories.*, count(*) AS quantity FROM categories JOIN products ON categories.category_id=products.category_id GROUP BY products.category_id');
            $stmt->execute();

            return $stmt->fetchAll();
        } elseif ($limit == null) {
            $stmt = $this->pdo->prepare('SELECT categories.*, count(*) AS quantity FROM categories JOIN products ON categories.category_id=products.category_id GROUP BY products.category_id LIMIT :start');
            $stmt->bindParam(':start', $start);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = $this->pdo->prepare('SELECT categories.*, count(*) AS quantity FROM categories JOIN products ON categories.category_id=products.category_id GROUP BY products.category_id LIMIT :start,:limit');
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':limit', $limit);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }
    public function get_list_admin($start = null, $limit = null )
    {
        if ($start == null && $limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM categories ');
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

    public function delete_category($id)
    {   
        $id_list = implode(",",$id);
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE category_id IN ($id_list)");
        $stmt->execute();

        return true;
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO categories(category_id,category_name) VALUES (:category_id,:category_name)');  
        $stmt->bindparam(':category_id',$data['category_id']);
        $stmt->bindparam(':category_name',$data['category_name']);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    public function update($id,$data)
    {
        $stmt = $this->pdo->prepare('UPDATE categories SET category_name=:category_name WHERE category_id=:id');  
    
        $stmt->bindparam(':category_name',$data['category_name']);
        $stmt->bindparam(':id',$id);
        $stmt->execute();

        return true;
    }


    public function check_exist_id($category_id)
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM categories WHERE category_id=:category_id');
        $stmt->bindParam(':category_id',$category_id);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function check_exist_name($category_name)
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM categories WHERE category_name=:category_name');
        $stmt->bindParam(':category_name',$category_name);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function get($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM categories WHERE category_id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

}
