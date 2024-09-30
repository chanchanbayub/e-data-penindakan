<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class RoleManagementModel extends Model
{
    protected $table            = 'role_management_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['role_management'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getRoleManagement($ukpd_id)
    {

        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->orderBy('id desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->orderBy('id desc')
                ->where(['role_management_table.id' => 1])
                ->get()->getResultObject();
        }
    }
}
