<?php

namespace App\Controllers;

class Home extends BaseController
{
	// daftar destinasi
	public function index()
	{
		$data = [
			'judul' => 'JL - Index'
		];
		return view('Home/index', $data);
	}
}
