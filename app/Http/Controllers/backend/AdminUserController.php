<?php namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Model\User as User;
use App\Model\Profile as Profile;
use Input;
use Hash;
use Redirect;
use File;

class AdminUserController extends Controller {

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
		$users = User::listUser();

		return view('backend.user.index')
			->with('tab1', 'Users')
			->with('title', 'Users')
			->with('titleDescription', 'Manage Users')
			->with('users', $users);
	}

	public function create()
	{
		return view('backend.user.create')
			->with('tab1', 'Users')
			->with('tab2', 'Create')
			->with('title', 'Users')
			->with('titleDescription', 'Create');
	}

	public function store()
	{
		if(Input::get('password') != Input::get('password-confirmation'))
			return Redirect::back()
				->with('errors', 'Password tidak sama!');
		
		
		$profile = new Profile;
		$profile->email = Input::get('email');
		$profile->name = Input::get('name');
		$profile->address = Input::get('address');
		$profile->gender = Input::get('gender');
		
		// Store Image
		if (Input::file('file') != NULL)
		{
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

		$profile->save();

		//Store Products
		$user = new user;
		$user->email = Input::get('email');
		$user->profile_id = $profile->id;
		$user->password = Hash::make(Input::get('password'));
		$user->group_id = Input::get('group');
		$user->save();

		return Redirect::to('admin/user')
			->with('message', 'user has been added');
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
