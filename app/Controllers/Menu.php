<?php

namespace App\Controllers;

class Menu extends BaseController
{
    // Menu
    public function destinasiku()
    {
        $data = [
            'judul' => 'JL - Destinasiku'
        ];
        return view('Menu/destinasiku', $data);
    }
}
