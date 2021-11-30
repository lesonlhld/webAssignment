<?php

namespace Model;

/**
 * ORDER_Model
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class ORDER_ITEM_Model extends \Model\Model
{
    public function create($order_id, $product_id, $item)
    {
        $stmt = $this->pdo->prepare('INSERT INTO order_items(order_id, product_id, quantity, unit_price) VALUES (:order_id, :product_id, :quantity, :unit_price)');
        $stmt->bindParam(':order_id', $order_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':quantity', $item['quantity']);
        $stmt->bindParam(':unit_price', $item['unit_price']);
        $stmt->execute();
        return True;
    }

    public function get_by_order_id($order_id)
    {
        $stmt = $this->pdo->prepare('SELECT *, order_items.quantity FROM order_items LEFT JOIN products ON order_items.product_id=products.product_id LEFT JOIN orders ON order_items.order_id=orders.order_id WHERE order_items.order_id=:order_id');
        $stmt->bindParam(':order_id', $order_id);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    public function get_list_by_order_id($order_id, $start = null, $limit = null)
    {
        if ($start == null && $limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM products LEFT JOIN categories ON products.category_id=categories.category_id LEFT JOIN order_items ON products.product_id=order_items.product_id LEFT JOIN orders ON order_items.order_id=orders.order_id WHERE orders.order_id=:order_id');
            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();

            return $stmt->fetchAll();
        } elseif ($limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM products LEFT JOIN categories ON products.category_id=categories.category_id LEFT JOIN order_items ON products.product_id=order_items.product_id LEFT JOIN orders ON order_items.order_id=orders.order_id WHERE orders.order_id=:order_id LIMIT :start');
            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':start', $start);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = $this->pdo->prepare('SELECT * FROM products LEFT JOIN categories ON products.category_id=categories.category_id LEFT JOIN order_items ON products.product_id=order_items.product_id LEFT JOIN orders ON order_items.order_id=orders.order_id WHERE orders.order_id=:order_id LIMIT :start,:limit');
            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':limit', $limit);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }
}
