<?php namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Model\Product as Product;
use App\Model\ProductCategory as ProductCategory;
use App\Model\Program as Program;
use App\Model\TahunAnggaran as TahunAnggaran;
use App\Model\Group as Group;
use App\Model\Kegiatan as Kegiatan;
use App\Model\Output as Output;
use App\Model\SubOutput as SubOutput;
use App\Model\SubOutputRealisasi as SubOutputRealisasi;
use Input;
use Hash;
use Redirect;
use File;

class AdminOutputController extends Controller {

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
		$sub_output = Output::subOutput($id);
		$nama_program = Kegiatan::namaProgram($id);
		$output = Output::find($id);

		return view('backend.output.index')
			->with('id', $id)
			->with('nama_program', $nama_program)
			->with('sub_output', $sub_output)
			->with('output', $output);
	}

	public function realisasi($id)
	{
		$sub_output = Output::subOutputRealisasi($id);
		$nama_program = Kegiatan::namaProgram($id);
		$output = Output::find($id);

		return view('backend.realisasi.index')
			->with('id', $id)
			->with('nama_program', $nama_program)
			->with('sub_output', $sub_output)
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
		$kegiatan = Kegiatan::find($id);
		$total_anggaran = Kegiatan::totalAnggaran($id);

		if(($total_anggaran + Input::get('anggaran')) > $kegiatan->alokasi_anggaran)
		{
			$kegiatan = Kegiatan::find($id);
			$nama_program = Kegiatan::namaProgram($id);
			$output = Output::get($id);

			return view('backend.kegiatan.detail')
				->with('id', $id)
				->with('nama_program', $nama_program)
				->with('kegiatan', $kegiatan)
				->with('output', $output)
				->with('error', 'Anggaran Melebihi Batas!');
		}
		else
		{
			$anggaran = new Output;
			$anggaran->kegiatan_id = $id;
			$anggaran->nama = Input::get('nama');
			$anggaran->anggaran = Input::get('anggaran');
			$anggaran->kinerja = Input::get('kinerja');
			$anggaran->save();

			return Redirect::to('admin/kegiatan/detail/'.$id);
		}
	}

	public function storesub($id)
	{
		$output = new SubOutput;
		$output->output_id = $id;
		$output->nama = Input::get('nama');
		$output->anggaran = Input::get('anggaran');
		$output->kinerja = Input::get('kinerja');
		$output->capaian = Input::get('capaian');
		$output->unit = Input::get('unit');
		$output->januari = Input::get('januari');
		$output->februari = Input::get('februari');
		$output->maret = Input::get('maret');
		$output->april = Input::get('april');
		$output->mei = Input::get('mei');
		$output->juni = Input::get('juni');
		$output->juli = Input::get('juli');
		$output->agustus = Input::get('agustus');
		$output->september = Input::get('september');
		$output->oktober = Input::get('oktober');
		$output->november = Input::get('november');
		$output->desember = Input::get('desember');
		$output->save();

		return Redirect::to('admin/output/'.$id);
	}

	public function updatesub($id, $out)
	{
		$output = SubOutput::find($id);
		$output->nama = Input::get('nama');
		$output->anggaran = Input::get('anggaran');
		$output->kinerja = Input::get('kinerja');
		$output->capaian = Input::get('capaian');
		$output->unit = Input::get('unit');
		$output->januari = Input::get('januari');
		$output->februari = Input::get('februari');
		$output->maret = Input::get('maret');
		$output->april = Input::get('april');
		$output->mei = Input::get('mei');
		$output->juni = Input::get('juni');
		$output->juli = Input::get('juli');
		$output->agustus = Input::get('agustus');
		$output->september = Input::get('september');
		$output->oktober = Input::get('oktober');
		$output->november = Input::get('november');
		$output->desember = Input::get('desember');
		$output->save();

		return Redirect::to('admin/output/'.$out);
	}

	public function deletesub($id, $output)
	{
		SubOutput::destroy($id);
		return Redirect::to('admin/output/'.$output);
	}

	public function realisasistoresub($id)
	{
		$output = new SubOutput;
		$output->output_id = $id;
		$output->nama = Input::get('nama');
		$output->anggaran = Input::get('anggaran');
		$output->kinerja = Input::get('kinerja');
		$output->capaian = Input::get('capaian');
		$output->unit = Input::get('unit');
		
		$sub_output = new SubOutputRealisasi;
		$sub_output->januari = Input::get('januari');
		$sub_output->februari = Input::get('februari');
		$sub_output->maret = Input::get('maret');
		$sub_output->april = Input::get('april');
		$sub_output->mei = Input::get('mei');
		$sub_output->juni = Input::get('juni');
		$sub_output->juli = Input::get('juli');
		$sub_output->agustus = Input::get('agustus');
		$sub_output->september = Input::get('september');
		$sub_output->oktober = Input::get('oktober');
		$sub_output->november = Input::get('november');
		$sub_output->desember = Input::get('desember');
		
		$sub_output->save();

		$output->realisasi_id = $sub_output->id;
		$output->save();
		

		return Redirect::to('admin/output/realisasi/'.$id);
	}

	public function realisasiupdatesub($id, $out)
	{
		$output = SubOutput::find($id);
		$output->nama = Input::get('nama');
		$output->anggaran = Input::get('anggaran');
		$output->kinerja = Input::get('kinerja');
		$output->capaian = Input::get('capaian');
		$output->unit = Input::get('unit');

		$sub_output = SubOutputRealisasi::find($output->realisasi_id);

		if(empty($sub_output))
		{
			$sub_output = new SubOutputRealisasi;
			$sub_output->januari = Input::get('januari');
			$sub_output->februari = Input::get('februari');
			$sub_output->maret = Input::get('maret');
			$sub_output->april = Input::get('april');
			$sub_output->mei = Input::get('mei');
			$sub_output->juni = Input::get('juni');
			$sub_output->juli = Input::get('juli');
			$sub_output->agustus = Input::get('agustus');
			$sub_output->september = Input::get('september');
			$sub_output->oktober = Input::get('oktober');
			$sub_output->november = Input::get('november');
			$sub_output->desember = Input::get('desember');

			$sub_output->save();

			$output->realisasi_id = $sub_output->id;
		}
		else
		{
			$sub_output->januari = Input::get('januari');
			$sub_output->februari = Input::get('februari');
			$sub_output->maret = Input::get('maret');
			$sub_output->april = Input::get('april');
			$sub_output->mei = Input::get('mei');
			$sub_output->juni = Input::get('juni');
			$sub_output->juli = Input::get('juli');
			$sub_output->agustus = Input::get('agustus');
			$sub_output->september = Input::get('september');
			$sub_output->oktober = Input::get('oktober');
			$sub_output->november = Input::get('november');
			$sub_output->desember = Input::get('desember');

			$sub_output->save();
		}
		
		$output->save();

		return Redirect::to('admin/output/realisasi/'.$out);
	}

	public function realisasideletesub($id, $output)
	{
		SubOutput::destroy($id);
		return Redirect::to('admin/output/realisasi/'.$output);
	}

	public function edit($id, $program)
	{
		$anggaran = Output::find($id);
		$anggaran->nama = Input::get('nama');
		$anggaran->anggaran = Input::get('anggaran');
		$anggaran->kinerja = Input::get('kinerja');
		$anggaran->save();

		return Redirect::to('admin/kegiatan/detail/'.$program);
	}

	public function delete($id, $program)
	{
		Output::destroy($id);
		return Redirect::to('admin/kegiatan/detail/'.$program);
	}

	

}
