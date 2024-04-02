<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EntryModel;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{

    private $entryModel;

    public function __construct()
    {
        $this->entryModel = new EntryModel();
    }

    public function index()
    {
        $currentDateTime = date('Y-m-d H:i:s');
        
        $entries = $this->entryModel
            ->where('created_at >=', date('Y-m-d 00:00:00', strtotime($currentDateTime)))
            ->where('created_at <=', date('Y-m-d 23:59:59', strtotime($currentDateTime)))
            ->findAll();

        return view('home', ['entries' => $entries]);
    }
}
