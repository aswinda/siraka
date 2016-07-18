<?php namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Model\Product as Product;
use App\Model\ProductCategory as ProductCategory;
use App\Model\Program as Program;
use App\Model\TahunAnggaran as TahunAnggaran;
use App\Model\Kegiatan as Kegiatan;
use App\Model\Output as Output;
use Input;
use Hash;
use Redirect;
use File;

class AdminKegiatanController extends Controller {

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
	public function index($id)
	{
		$kegiatan = Kegiatan::cari($id);
		$anggaran = Program::find($id);

		return view('backend.kegiatan.index')
			->with('id', $id)
			->with('anggaran', $anggaran)
			->with('kegiatan', $kegiatan);
	}

	public function detail($id)
	{
		// $anggaran = TahunAnggaran::getTahunAnggaran();
		// $program = Program::all();
		// $groups = Group::all();
		// $detailProgramAnggaran = Program::detailProgramAnggaran();
		
		$kegiatan = Kegiatan::find($id);
		$nama_program = Kegiatan::namaProgramKegiatan($id);
		$output = Output::get($id);

		return view('backend.kegiatan.detail')
			->with('id', $id)
			->with('nama_program', $nama_program)
			->with('kegiatan', $kegiatan)
			->with('output', $output);
	}

	public function create()
	{
		$anggaran = new Program;
		$anggaran->kode_program = Input::get('kode_program');
		$anggaran->nama_program = Input::get('nama_program');
		$anggaran->alokasi_anggaran = Input::get('alokasi_anggaran');
		$anggaran->alokasi_kinerja = Input::get('alokasi_kinerja');
		$anggaran->save();

		return Redirect::to('admin/program');
	}

	public function store($id)
	{
		$anggaran = new Kegiatan;
		$anggaran->program_id = $id;
		$anggaran->nama = Input::get('nama_program');
		$anggaran->alokasi_anggaran = Input::get('alokasi_anggaran');
		$anggaran->alokasi_kinerja = Input::get('alokasi_kinerja');
		$anggaran->save();

		return Redirect::to('admin/kegiatan/'.$id);
	}

	public function output($id)
	{
		$output = new Output;
		$output->kegiatan_id = $id;
		$output->kode = Input::get('kode');
		$output->nama = Input::get('nama');
		$output->anggaran = Input::get('anggaran');
		$output->kinerja = Input::get('kinerja');
		$output->capaian = Input::get('capaian');
		$output->unit = Input::get('unit');
		$output->sub_output = Input::get('sub_output');
		$output->n = Input::get('n');
		$output->januari = Input::get('jan');
		$output->februari = Input::get('feb');
		$output->maret = Input::get('mar');
		$output->april = Input::get('apr');
		$output->mei = Input::get('mei');
		$output->juni = Input::get('jun');
		$output->juli = Input::get('jul');
		$output->agustus = Input::get('agu');
		$output->september = Input::get('sep');
		$output->oktober = Input::get('okt');
		$output->november = Input::get('nov');
		$output->desember = Input::get('des');
		$output->save();

		return Redirect::to('admin/kegiatan/detail/'.$id);
	}

	public function updateAnggaran($id)
	{
		$anggaran = TahunAnggaran::find($id);
		$anggaran->anggaran = Input::get('anggaran');
		$anggaran->save();

		return Redirect::to('admin/program');
	}

	public function edit($id, $program)
	{
		$anggaran = Kegiatan::find($id);
		$anggaran->nama = Input::get('nama_program');
		$anggaran->alokasi_anggaran = Input::get('alokasi_anggaran');
		$anggaran->alokasi_kinerja = Input::get('alokasi_kinerja');
		$anggaran->save();

		return Redirect::to('admin/kegiatan/'.$program);
	}

	public function delete($id, $program)
	{
		Kegiatan::destroy($id);
		return Redirect::to('admin/kegiatan/'.$program);
	}


	public function show($id)
	{
		Kegiatan::destroy($id);
		return Redirect::to('admin/program');
	}

}
