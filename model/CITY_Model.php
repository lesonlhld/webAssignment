<?php

namespace Model;

/**
 * CITY_Model
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class CITY_Model extends Model
{
    public function get_city($id = null)
    {
        if ($id == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM cities');
            $stmt->execute();

            return $stmt->fetchAll();
        } else {
            $stmt = $this->pdo->prepare('SELECT * FROM cities WHERE id=:id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch();
        }
    }
}
