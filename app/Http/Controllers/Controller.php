<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;


class Controller extends BaseController

{
	public function index()
	{
		// mengambil data dari table syllabus
		$syllabus = DB::table('tb_pendaftaran')->get();
	
		// mengirim data syllabus ke view index
		return view('welcome', ['syllabus' => $syllabus]);
	}	
}