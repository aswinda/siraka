<?php namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Model\Program as Program;
use App\Model\Output as Output;
use App\Model\TahunAnggaran as TahunAnggaran;

class AdminController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$anggaran = TahunAnggaran::getTahunAnggaran();
		$total_anggaran = Program::anggaranTercapai();
		$sisa = $anggaran[0]->anggaran - $total_anggaran;

		$kinerja_total = Output::kinerja_total();
		$kinerja_sisa = Output::kinerja_sisa();

		return view('backend.index')
			->with('anggaran_tercapai', $total_anggaran)
			->with('anggaran_sisa', $sisa)
			->with('kinerja_total', $kinerja_total)
			->with('kinerja_sisa', $kinerja_sisa);
	}

	public function berita()
	{
		return view('backend.berita.index');
	}

}
