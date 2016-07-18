<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class TahunAnggaran extends Model {
	
	protected $table = 'tahun_anggaran';

	public static function getTahunAnggaran()
	{
		$list = DB::select( DB::raw(
				"SELECT * FROM `tahun_anggaran` WHERE tahun = YEAR(CURDATE())") 
		);

		return $list;
	}

}
