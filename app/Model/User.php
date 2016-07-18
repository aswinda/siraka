<?php namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public static function getGroup($email)
	{
		$data = DB::table('users')
					->select('group_id')
					->where('email', $email)
					->get();

		// default
		$group_id = 0;

        foreach($data as $id){
        	$group_id = $id->group_id;
        }

		return $group_id;
	}

	public static function getId($email)
	{
		$data = DB::table('users')
					->select('id')
					->where('email', $email)
					->get();

		// default
		$id = 0;

        foreach($data as $id){
        	$id = $id->id;
        }

		return $id;
	}

	public static function getName($email)
	{
		$list = DB::select( DB::raw(
				"SELECT 
					profiles.name
				FROM 
					users, 
					profiles 
				WHERE 
					users.email = :email AND
					users.profile_id = profiles.id
					"), 

			array(
				"email"	=> $email
			));

		return $list[0]->name;
	}

	public static function listUser()
	{
		// group id 5, user customer tidak ditampilkan
		$list = DB::select( DB::raw("SELECT 
					users.id AS user_id,
					profiles.name,
					users.email,
					groups.name AS group_name
				FROM
					users,
					profiles,
					groups
				WHERE
					users.profile_id = profiles.id AND
					users.group_id = groups.id ")
		);
		

		return $list;
	}

	public static function detailUsersWithImage($id)
	{
		$list = DB::select( DB::raw(
				"SELECT 
					users.id,
				    users.email,
				    users.group_id,
				    profiles.name,
				    address,
				    gender,
				    photo
				FROM 
					users,
					profiles
				WHERE 
					users.id = :id AND
					users.profile_id = profiles.id
					"), 

			array(
				"id"	=> $id
			));

		return $list[0];
	}
}
