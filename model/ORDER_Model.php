<?php

namespace Model;

/**
 * ORDER_Model
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class ORDER_Model extends \Model\Model
{
    public function get_list($user_id, $start = null, $limit = null)
    {
        if ($start == null && $limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM orders LEFT JOIN users ON orders.user_id=users.id LEFT JOIN payments ON orders.payment_id=payments.payment_id WHERE user_id=:user_id');
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();

            return $stmt->fetchAll();
        } elseif ($limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM orders LEFT JOIN users ON orders.user_id=users.id LEFT JOIN payments ON orders.payment_id=payments.payment_id WHERE user_id=:user_id LIMIT :start');
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':start', $start);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = $this->pdo->prepare('SELECT * FROM orders LEFT JOIN users ON orders.user_id=users.id LEFT JOIN payments ON orders.payment_id=payments.payment_id WHERE user_id=:user_id LIMIT :start,:limit');
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':limit', $limit);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    public function count($user_id)
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM orders WHERE user_id=:user_id');
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function get($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM orders WHERE order_id=:order_id');
        $stmt->bindParam(':order_id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function create($data)
    {
        $code = $this->generate_code();

        $stmt = $this->pdo->prepare('INSERT INTO orders(order_id, user_id, total, payment_id, voucher) VALUES (:order_id, :user_id, :total, :payment_id, :voucher)');
        $stmt->bindParam(':order_id', $code);
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':total', $data['total']);
        $stmt->bindParam(':payment_id', $data['payment_id']);
        $stmt->bindParam(':voucher', $data['voucher']);
        $stmt->execute();

        return $code;
    }

    public function update_status($id, $data)
    {
        $stmt = $this->pdo->prepare('UPDATE orders SET order_status=:order_status WHERE order_id=:order_id');
        $stmt->bindParam(':order_status', $data['order_status']);
        $stmt->bindParam(':order_id', $id);
        $stmt->execute();

        return true;
    }

    public function generate_code()
    {
        $code = sprintf("%02d", $_SESSION["id"]);
        $code .= time();
        $code .= sprintf("%043", rand(0, 9999));

        return $code;
    }
}
