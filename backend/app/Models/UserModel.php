<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
       
        return $data;
    }



    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tsc_no',
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'school_level',
        'isTrained',
        'county_id'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'email'        => 'required|max_length[254]|valid_email|is_unique[users.email]',
        'password'     => 'required|max_length[255]|min_length[8]|checkPassword',
    ];

    protected $validationMessages   = [
        'email' => [
            'required' => 'The email field is required.',
            'valid_email' => 'Please provide a valid email address.',
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
        ],
        'password' => [
            'required' => 'The password field is required.',
            'checkPassword' => 'Please input a strong password,',
        ]

    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['hashPassword'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
