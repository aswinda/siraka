<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Kegiatan extends Model {
	
	protected $table = 'kegiatan';

	public static function cari($id)
	{
		$list = DB::select( DB::raw(
				"SELECT 
					*
				FROM 
					kegiatan 
				WHERE 
					program_id = :id
					"), 

			array(
				"id"	=> $id
			));

		return $list;
	}

	public static function namaProgramKegiatan($id)
	{
		$list = DB::select( DB::raw(
				"SELECT nama_program FROM program, kegiatan WHERE kegiatan.id = :id AND kegiatan.program_id = program.id
					"), 

			array(
				"id"	=> $id
			));

		return $list[0]->nama_program;
	}

	public static function namaProgram($id)
	{
		$list = DB::select( DB::raw(
				"SELECT nama_program FROM program, kegiatan, output WHERE output.id = :id AND kegiatan.program_id = program.id AND output.kegiatan_id = kegiatan.id
					"), 

			array(
				"id"	=> $id
			));

		return $list[0]->nama_program;
	}

	public static function totalAnggaran($id)
	{
		$list = DB::select( DB::raw(
				"SELECT 
					SUM(output.anggaran) AS hitung 
				FROM kegiatan, output 
				WHERE kegiatan.id = :id AND kegiatan.id = output.kegiatan_id
					"), 

			array(
				"id"	=> $id
			));

		return $list[0]->hitung;
	}

}
