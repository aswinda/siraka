<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class SubOutput extends Model {
	
	protected $table = 'sub_output';

	public static function get($id)
	{
		$list = DB::select( DB::raw(
				"SELECT 
					*
				FROM 
					output 
				WHERE 
					kegiatan_id = :id
					"), 

			array(
				"id"	=> $id
			));

		return $list;
	}

	public static function kinerja_total()
	{
		$list = DB::select( DB::raw(
				"SELECT COUNT(*) AS hitung FROM `output` WHERE 1
					"));

		return $list[0]->hitung;
	}

	public static function kinerja_sisa()
	{
		$list = DB::select( DB::raw(
				"SELECT COUNT(*) AS hitung FROM `output` WHERE output.desember = 100
					"));

		return $list[0]->hitung;
	}

}
