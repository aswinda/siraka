<?php namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Model\Product as Product;
use App\Model\ProductCategory as ProductCategory;
use App\Model\Program as Program;
use App\Model\TahunAnggaran as TahunAnggaran;
use Input;
use Hash;
use Redirect;
use File;

class AdminKinerjaController extends Controller {

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
		$program = Program::all();

		return view('backend.kinerja.index')
			->with('program', $program);
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

	public function store()
	{
		$anggaran = new Program;
		$anggaran->kode_program = Input::get('kode_program');
		$anggaran->nama_program = Input::get('nama_program');
		$anggaran->alokasi_anggaran = Input::get('alokasi_anggaran');
		$anggaran->alokasi_kinerja = Input::get('alokasi_kinerja');
		$anggaran->save();

		return Redirect::to('admin/program');
	}

	public function updateAnggaran($id)
	{
		$anggaran = TahunAnggaran::find($id);
		$anggaran->anggaran = Input::get('anggaran');
		$anggaran->save();

		return Redirect::to('admin/program');
	}

	public function edit($id)
	{
		$user = user::detailUsersWithImage($id);

		return view('backend.user.edit')
			->with('tab1', 'users')
			->with('title', 'users')
			->with('titleDescription', 'Edit')
			->with('user', $user);
	}

	public function update($id)
	{
		$user = User::find($id);
		$profile = Profile::find($user->profile_id);
		// Store Image
		if (Input::file('file') != NULL)
		{
			File::delete(public_path().'/images/users/'.$profile->photo);

			if(Input::file('file')->getClientMimeType() != 'image/jpeg' &&
			Input::file('file')->getClientMimeType() != 'image/jpg' &&
			Input::file('file')->getClientMimeType() != 'image/png'  &&
			Input::file('file')->getClientMimeType() != 'image/bmp')
			{
				return Redirect::back()
					->with('errors', 'File Harus gambar dan bertipe jpeg, jpg, png');
			}

			
			$file = Input::file('file');
			$name = strtotime("now");
			$extension = str_replace("image/", "", $file->getClientMimeType());
			$profile->photo = $name.'.'.$extension;
			Input::file('file')->move(public_path().'/images/profiles',$profile->photo);
		}

		$user->email = Input::get('email');
		if(Input::get('password') != "" && Input::get('password') == Input::get('password-confirmation'))
			$user->password = Hash::make(Input::get('password'));
		$user->group_id = Input::get('group');
		$user->save();

		$profile->email = Input::get('email');
		$profile->name = Input::get('name');
		$profile->address = Input::get('address');
		$profile->gender = Input::get('gender');
		$profile->save();

		

		return Redirect::to('admin/user')
			->with('message', 'user has been updated!');
	}

	public function delete($id)
	{
		User::destroy($id);
		return Redirect::to('admin/user')
			->with('message', 'user has been deleted!');
	}

	public function show($id)
	{
		$user = User::detailUsersWithImage($id);

		return view('backend.user.show')
			->with('tab1', 'users')
			->with('title', 'users')
			->with('titleDescription', 'show')
			->with('user', $user);
	}

}
