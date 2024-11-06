<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class UsersManagementModel extends Model
{
    protected $table            = 'users_management_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['ukpd_id', 'nama', 'email', 'nip', 'role_management_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUsersManagement($ukpd_id)
    {

        if ($ukpd_id == null) {
            return $this->table($this->table)
                ->select('users_management_table.id, users_management_table.ukpd_id, users_management_table.nama, users_management_table.email, users_management_table.nip, ukpd_table.ukpd, role_management_table.role_management')
                ->join('ukpd_table', 'ukpd_table.id = users_management_table.ukpd_id')
                ->join('role_management_table', 'role_management_table.id = users_management_table.role_management_id')
                ->orderBy('id desc')
                ->get()->getResultObject();
        } else {
            return $this->table($this->table)
                ->select('users_management_table.id, users_management_table.ukpd_id, users_management_table.nama, users_management_table.email, users_management_table.nip, ukpd_table.ukpd, role_management_table.role_management')
                ->join('ukpd_table', 'ukpd_table.id = users_management_table.ukpd_id')
                ->join('role_management_table', 'role_management_table.id = users_management_table.role_management_id')
                ->where(["users_management_table.ukpd_id" => $ukpd_id])
                ->orderBy('id desc')
                ->get()->getResultObject();
        }
    }


    public function getUserManagementData($email, $password)
    {
        return $this->table($this->table)
            ->select('users_management_table.id, users_management_table.ukpd_id, users_management_table.nama, users_management_table.email, users_management_table.nip,users_management_table.role_management_id ,ukpd_table.ukpd, role_management_table.role_management')
            ->join('ukpd_table', 'ukpd_table.id = users_management_table.ukpd_id')
            ->join('role_management_table', 'role_management_table.id = users_management_table.role_management_id')
            ->where(["users_management_table.email" => $email])
            ->where(["users_management_table.nip" => $password])
            ->orderBy('id desc')
            ->get()->getRowObject();
    }


    public function getUsersManagamentDataTable()
    {
        $db = db_connect();
        $builder = $db->table($this->table);
        $builder = $builder->select('users_management_table.id, users_management_table.ukpd_id, users_management_table.nama, users_management_table.email, users_management_table.nip, ukpd_table.ukpd, role_management_table.role_management')
            ->join('ukpd_table', 'ukpd_table.id = users_management_table.ukpd_id')
            ->join('role_management_table', 'role_management_table.id = users_management_table.role_management_id')
            ->orderBy('id desc');

        return $builder->orderBy('users_management_table.id', 'desc');
    }
}
