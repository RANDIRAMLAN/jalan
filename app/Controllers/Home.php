<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'judul' => 'JL - Index'
		];
		return view('Home/index', $data);
	}
}
