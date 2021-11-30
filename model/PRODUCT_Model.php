<?php

namespace Model;

/**
 * PRODUCT_Model
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class PRODUCT_Model extends \Model\Model
{
    public function get_list_active($keyword = '', $start = null, $limit = null)
    {

        if ($start == null && $limit == null) {
            $stmt = $this->pdo->prepare("SELECT * FROM products LEFT JOIN categories ON products.category_id=categories.category_id WHERE publish=1 AND trash=0 AND product_name LIKE '%{$keyword}%'");
            $stmt->execute();

            return $stmt->fetchAll();
        } elseif ($limit == null) {
            $stmt = $this->pdo->prepare("SELECT * FROM products LEFT JOIN categories ON products.category_id=categories.category_id WHERE publish=1 AND trash=0 AND product_name LIKE '%{$keyword}%' LIMIT :start");
            $stmt->bindParam(':start', $start);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = $this->pdo->prepare("SELECT * FROM products LEFT JOIN categories ON products.category_id=categories.category_id WHERE publish=1 AND trash=0 AND product_name LIKE '%{$keyword}%' LIMIT :start,:limit");
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':limit', $limit);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    public function count_active($keyword = '')
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM products LEFT JOIN categories ON products.category_id=categories.category_id WHERE publish=1 AND trash=0 AND product_name LIKE '%{$keyword}%'");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function get_list($trash = 0, $start = null, $limit = null)
    {
        if ($start == null && $limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM products LEFT JOIN categories ON products.category_id=categories.category_id WHERE trash=:trash');
            $stmt->bindParam(':trash', $trash);
            $stmt->execute();

            return $stmt->fetchAll();
        } elseif ($limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM products LEFT JOIN  categories ON products.category_id=categories.category_id WHERE trash=:trash LIMIT :start');
            $stmt->bindParam(':trash', $trash);
            $stmt->bindParam(':start', $start);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = $this->pdo->prepare('SELECT * FROM products LEFT JOIN categories ON products.category_id=categories.category_id WHERE trash=:trash LIMIT :start,:limit');
            $stmt->bindParam(':trash', $trash);
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':limit', $limit);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    public function count($trash = 0)
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM products WHERE trash=:trash');
        $stmt->bindParam(':trash', $trash);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function get($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products LEFT JOIN categories ON products.category_id=categories.category_id WHERE product_id=:product_id');
        $stmt->bindParam(':product_id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function create($data)
    {
        $hot = $data['hot'] ?? "0";
        $stmt = $this->pdo->prepare('INSERT INTO products(product_name, price, quantity, discount, category_id, description, attribute, image, publish, hot) VALUES (:product_name, :price, :quantity, :discount, :category_id, :description, :attribute, :image, :publish, :hot)');
        $stmt->bindParam(':product_name', $data['name']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':quantity', $data['quantity']);
        $stmt->bindParam(':discount', $data['discount']);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':attribute', $data['attribute']);
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':publish', $data['status']);
        $stmt->bindParam(':hot', $hot);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $hot = $data['hot'] ?? "0";
        $stmt = $this->pdo->prepare('UPDATE products SET product_name=:product_name, price=:price, quantity=:quantity, discount=:discount, category_id= :category_id, description= :description, attribute= :attribute, image= :image, publish=:publish, hot=:hot WHERE product_id=:product_id');
        $stmt->bindParam(':product_name', $data['name']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':quantity', $data['quantity']);
        $stmt->bindParam(':discount', $data['discount']);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':attribute', $data['attribute']);
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':publish', $data['status']);
        $stmt->bindParam(':hot', $hot);
        $stmt->bindParam(':product_id', $id);
        $stmt->execute();

        return true;
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

    public function update_rate($id)
    {
        $stmt = $this->pdo->prepare("UPDATE products SET products.rate=(SELECT AVG(comments.rate) FROM comments WHERE comments.product_id = products.product_id) WHERE products.product_id=:product_id");
        $stmt->bindParam(':product_id', $id);
        $stmt->execute();

        return true;
    }
    
    public function delete($id)
    {
        $id_list = implode(",", $id);
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE product_id IN ($id_list)");
        $stmt->execute();

        return true;
    }
}
