<?php

namespace Model;

/**
 * CONFIGS_Model
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class CONFIGS_Model extends \Model\Model
{
    public function get()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM configs WHERE id=1');
        $stmt->execute();

        return $stmt->fetch();
    }

    public function update($data)
    {
        $id = 1;
        $maintenance_mode = $data['maintenance_mode'] ?? 0;

        $stmt = $this->pdo->prepare("REPLACE INTO configs 
        (id, company_name, site_name, email, phone, address, maintenance_mode) 
        VALUES (:id, :company_name, :site_name, :email, :phone, :address, :maintenance_mode)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':company_name', $data['company_name']);
        $stmt->bindParam(':site_name', $data['site_name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':phone', $data['phone']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':maintenance_mode', $maintenance_mode);
        $stmt->execute();

        return true;
    }
}
