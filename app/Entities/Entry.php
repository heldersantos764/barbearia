<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Entry extends Entity
{
    protected $attributes = [
        'value' => null,
        'description' => null
    ];
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    protected $validationRules = [
        'value' => 'required|decimal',
    ];
}
