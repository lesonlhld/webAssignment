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

    public function get_by_order_id($order_id){
        $stmt = $this->pdo->prepare('SELECT * FROM order_items LEFT JOIN products ON order_items.product_id=products.product_id LEFT JOIN orders ON order_items.order_id=orders.order_id WHERE order_id=:order_id');
        $stmt->bindParam(':order_id', $order_id);
        $stmt->execute();

        return $stmt->fetch();
    }
}