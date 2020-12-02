<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Menu extends BaseController
{
    protected $MenuModel;
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
    }
    // Menu
    public function destinasiku()
    {
        $email = session()->get('email');
        $nama = session()->get('nama');
        if ($email) {
            if ($nama) {
                $menu = $this->MenuModel->menuAkhir();
            } else {
                $menu = $this->MenuModel->menuAwal();
            }
            $data = [
                'judul' => 'JL - Destinasiku',
                'menu' => $menu,
            ];
            return view('Menu/destinasiku', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
