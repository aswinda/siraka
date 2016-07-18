<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Output extends Model {
	
	protected $table = 'output';

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

	public static function subOutput($id)
	{
		$list = DB::select( DB::raw(
				"SELECT 
					*
				FROM 
					sub_output 
				WHERE 
					sub_output.output_id = :id
					"), 

			array(
				"id"	=> $id
			));

		return $list;
	}

	public static function subOutputRealisasi($id)
	{
		$list = DB::select( DB::raw(
				"SELECT 
					sub_output.id AS sub_id,
					sub_output.nama,
					sub_output.anggaran,
					sub_output.kinerja,
					sub_output.capaian,
					sub_output.unit,
					sub_output_realisasi.*
				FROM 
					sub_output LEFT JOIN sub_output_realisasi 
						ON sub_output.realisasi_id = sub_output_realisasi.id
				WHERE 
					sub_output.output_id = :id
					"), 

			array(
				"id"	=> $id
			));

		return $list;
	}

	public static function kinerja_total()
	{
		$list = DB::select( DB::raw(
				"SELECT COUNT(*) AS hitung FROM `sub_output` WHERE 1
					"));

		return $list[0]->hitung;
	}

	public static function kinerja_sisa()
	{
		$list = DB::select( DB::raw(
				"SELECT COUNT(*) AS hitung FROM `sub_output` WHERE (januari+februari+maret+april+mei+juni+juli+agustus+september+oktober+november+desember) = 100
					"));

		return $list[0]->hitung;
	}

}
