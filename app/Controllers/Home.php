<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Home extends BaseController
{
	protected $MenuModel;
	public function __construct()
	{
		$this->MenuModel = new MenuModel();
	}
	// daftar destinasi
	public function index()
	{
		$nama = session()->get('nama');
		if ($nama) {
			$menu = $this->MenuModel->menuAkhir();
		} else {
			$menu = $this->MenuModel->menuAwal();
		}
		$data = [
			'judul' => 'JL - Destinasi',
			'menu' => $menu
		];
		return view('Home/index', $data);
	}
}
