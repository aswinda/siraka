<?php namespace App\Http\Controllers;

use App\Model\Program as Program;
use App\Model\TahunAnggaran as TahunAnggaran;
use App\Model\Kegiatan as Kegiatan;
use App\Model\Output as Output;
use App\Model\Group as Group;

class HomeController extends Controller {

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
		//$this->middleware('guest');
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

		$anggaranTercapaiPerBulan = Program::anggaranTercapaiPerBulan();

		$kinerja_total = Output::kinerja_total();
		$kinerja_sisa = Output::kinerja_sisa();

		$kinerjaTercapaiPerBulan = Program::kinerjaTercapaiPerBulan();

		$deputi = Group::all();
		$anggaranDeputi = Program::anggaranPerDeputi();
		$realisasiAnggaranDeputi = Program::realisasiAnggaranPerDeputi();
		$realisasiKinerjaDeputi = Program::realisasiKinerjaPerDeputi();

		foreach($deputi as $dep)
		{
			// anggaran
			foreach($anggaranDeputi as $angDep)
				if($dep->id == $angDep->id)
				{
					$dep->anggaran = $angDep->anggaran;
					break;
				}

			// realisasi anggaran
			foreach($realisasiAnggaranDeputi as $rea)
				if($dep->id == $rea->id)
				{
					$dep->realisasiAnggaran = $rea->realisasi_anggaran*100/$dep->anggaran;
					break;
				}

			// realisasi kinerja
			foreach($realisasiKinerjaDeputi as $kin)
				if($dep->id == $kin->id)
				{
					$dep->realisasiKinerja = $kin->realisasi_kinerja;
					break;
				}

			// capaian output
			$dep->capaian = Program::capaianOutputPerDeputi($dep->id);
		}

		//var_dump($anggaran);
		return view('frontend.index')
			->with('anggaran_tercapai', $total_anggaran)
			->with('anggaran_sisa', $sisa)
			->with('total_anggaran', $anggaran[0]->anggaran)
			->with('anggaran_tercapai_bulan', $anggaranTercapaiPerBulan[0])
			->with('kinerja_tercapai_bulan', $kinerjaTercapaiPerBulan[0])
			->with('kinerja_total', $kinerja_total)
			->with('kinerja_sisa', $kinerja_sisa)
			->with('deputi', $deputi);
	}

}
