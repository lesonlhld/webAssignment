<?php

namespace Model;

/**
 * PRODUCT_Model
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

    public function get_list($start = null, $limit = null)
    {
        if ($start == null && $limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM products LEFT JOIN categories ON products.category_id=categories.category_id WHERE trash=0');
            $stmt->execute();

            return $stmt->fetchAll();
        } elseif ($limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM products LEFT JOIN  categories ON products.category_id=categories.category_id WHERE trash=0 LIMIT :start');
            $stmt->bindParam(':start', $start);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = $this->pdo->prepare('SELECT * FROM products LEFT JOIN categories ON products.category_id=categories.category_id WHERE trash=0 LIMIT :start,:limit');
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':limit', $limit);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    public function count()
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM products WHERE trash=0');
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function get($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM products WHERE product_id=:product_id');
        $stmt->bindParam(':product_id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO products(product_name, price, quantity, discount, category_id, description, image, publish) VALUES (:product_name, :price, :quantity, :discount, :category_id, :description, :image, :publish)');
        $stmt->bindParam(':product_name', $data['name']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':quantity', $data['quantity']);
        $stmt->bindParam(':discount', $data['discount']);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':publish', $data['status']);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE products SET product_name=:product_name, price=:price, quantity=:quantity, discount=:discount, category_id= :category_id, description= :description, image= :image, publish=:publish WHERE product_id=:product_id');
        $stmt->bindParam(':product_name', $data['name']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':quantity', $data['quantity']);
        $stmt->bindParam(':discount', $data['discount']);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':publish', $data['status']);
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
}