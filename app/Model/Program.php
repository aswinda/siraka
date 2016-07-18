<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Program extends Model {
	
	protected $table = 'program';
	
	public static function totalAnggaran()
	{
		$list = DB::select( DB::raw(
				"SELECT SUM(alokasi_anggaran) AS anggaran FROM `program`") 
		);

		return $list[0]->anggaran;
	}

	public static function anggaranTercapai()
	{
		$list = DB::select( DB::raw(
				"SELECT 
					(SUM(januari) +
						SUM(februari) +
						SUM(maret) +
						SUM(april) +
						SUM(mei) +
						SUM(juni) +
						SUM(juli) +
						SUM(agustus) +
						SUM(september) +
						SUM(oktober) +
						SUM(november) +
						SUM(desember)) AS jumlah
				FROM
					program LEFT JOIN kegiatan 
						ON program.id = kegiatan.program_id
					LEFT JOIN output 
						ON kegiatan.id = output.kegiatan_id
					LEFT JOIN sub_output
						ON output.id = sub_output.output_id") 
		);

		return $list[0]->jumlah;
	}

	public static function anggaranTercapaiPerBulan()
	{
		$list = DB::select( DB::raw(
				"SELECT 
					SUM(januari) AS jan,
					SUM(februari) AS feb,
					SUM(maret) AS mar,
					SUM(april) AS apr,
					SUM(mei) AS mei,
					SUM(juni) AS jun,
					SUM(juli) AS jul,
					SUM(agustus) AS agu,
					SUM(september) AS sep,
					SUM(oktober) AS okt,
					SUM(november) AS nov,
					SUM(desember) AS des
				FROM
					program LEFT JOIN kegiatan 
						ON program.id = kegiatan.program_id
					LEFT JOIN output 
						ON kegiatan.id = output.kegiatan_id
					LEFT JOIN sub_output
						ON output.id = sub_output.output_id") 
		);

		return $list;
	}

	public static function kinerjaTercapaiPerBulan()
	{
		$list = DB::select( DB::raw(
				"SELECT 
					SUM(((((((sub_output_realisasi.januari * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS jan,
					SUM(((((((sub_output_realisasi.februari * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS feb,
					SUM(((((((sub_output_realisasi.maret * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS mar,
					SUM(((((((sub_output_realisasi.april * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS apr,
					SUM(((((((sub_output_realisasi.mei * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS mei,
					SUM(((((((sub_output_realisasi.juni * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS jun,
					SUM(((((((sub_output_realisasi.juli * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS jul,
					SUM(((((((sub_output_realisasi.agustus * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS agu,
					SUM(((((((sub_output_realisasi.september * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS sep,
					SUM(((((((sub_output_realisasi.oktober * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS okt,
					SUM(((((((sub_output_realisasi.november * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS nov,
					SUM(((((((sub_output_realisasi.desember * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS des
				FROM
					program,
					kegiatan,
					output,
					sub_output,
					sub_output_realisasi
				WHERE
					program.id = kegiatan.program_id AND
					kegiatan.id = output.kegiatan_id AND
					output.id = sub_output.output_id AND
					sub_output.realisasi_id = sub_output_realisasi.id") 
		);

		return $list;
	}

	public static function detailProgramAnggaran()
	{
		$list = DB::select( DB::raw(
				"SELECT 
					program.id AS program_id,
					program.kode_program, 
					program.nama_program,
					SUM(januari) AS jan,
					SUM(februari) AS feb,
					SUM(maret) AS mar,
					SUM(april) AS apr,
					SUM(mei) AS mei,
					SUM(juni) AS jun,
					SUM(juli) AS jul,
					SUM(agustus) AS agu,
					SUM(september) AS sep,
					SUM(oktober) AS okt,
					SUM(november) AS nov,
					SUM(desember) AS des
				FROM
					program LEFT JOIN kegiatan 
						ON program.id = kegiatan.program_id
					LEFT JOIN output 
						ON kegiatan.id = output.kegiatan_id
					LEFT JOIN sub_output
						ON output.id = sub_output.output_id
				GROUP BY program.kode_program") 
		);

		return $list;
	}

	public static function detailProgramRealisasi()
	{
		$list = DB::select( DB::raw(
				"SELECT 
					program.id AS program_id,
					program.kode_program, 
					program.nama_program,
					SUM(((((((sub_output_realisasi.januari * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS jan,
					SUM(((((((sub_output_realisasi.februari * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS feb,
					SUM(((((((sub_output_realisasi.maret * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS mar,
					SUM(((((((sub_output_realisasi.april * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS apr,
					SUM(((((((sub_output_realisasi.mei * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS mei,
					SUM(((((((sub_output_realisasi.juni * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS jun,
					SUM(((((((sub_output_realisasi.juli * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS jul,
					SUM(((((((sub_output_realisasi.agustus * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS agu,
					SUM(((((((sub_output_realisasi.september * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS sep,
					SUM(((((((sub_output_realisasi.oktober * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS okt,
					SUM(((((((sub_output_realisasi.november * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS nov,
					SUM(((((((sub_output_realisasi.desember * sub_output.kinerja)/100) * output.kinerja)/100) * kegiatan.alokasi_kinerja)/100) * (100/(SELECT COUNT(*) FROM program))/100) AS des
				FROM
					program LEFT JOIN kegiatan
						ON program.id = kegiatan.program_id
					LEFT JOIN output
						ON kegiatan.id = output.kegiatan_id
					LEFT JOIN sub_output
						ON output.id = sub_output.output_id
					LEFT JOIN sub_output_realisasi
						ON sub_output.realisasi_id = sub_output_realisasi.id
				GROUP BY program.id") 
		);

		return $list;
	}

	public static function anggaranPerDeputi()
	{
		$list = DB::select( DB::raw(
				"SELECT
					group_id AS id,
					SUM(alokasi_anggaran) AS anggaran
				FROM
					program
				GROUP BY group_id") 
		);

		return $list;
	}

	public static function realisasiAnggaranPerDeputi()
	{
		$list = DB::select( DB::raw(
				"SELECT
					program.group_id AS id,
					(januari+februari+maret+april+mei+juni+juli+agustus+september+oktober+november+desember) AS realisasi_anggaran
				FROM
					program LEFT JOIN kegiatan 
						ON program.id = kegiatan.program_id
					LEFT JOIN output
						ON kegiatan.id = output.kegiatan_id
					LEFT JOIN sub_output
						ON output.id = sub_output.output_id
				GROUP BY group_id") 
		);

		return $list;
	}

	public static function realisasiKinerjaPerDeputi()
	{
		$list = DB::select( DB::raw(
				"SELECT
					program.group_id AS id,
					(((((sub_output_realisasi.januari+sub_output_realisasi.februari+sub_output_realisasi.maret+sub_output_realisasi.april+sub_output_realisasi.mei+sub_output_realisasi.juni+sub_output_realisasi.juli+sub_output_realisasi.agustus+sub_output_realisasi.september+sub_output_realisasi.oktober+sub_output_realisasi.november+sub_output_realisasi.desember)*sub_output.kinerja/100)*output.kinerja/100)*kegiatan.alokasi_kinerja/100)*(100/(SELECT COUNT(*) FROM program))/100) AS realisasi_kinerja
				FROM
					program LEFT JOIN kegiatan 
						ON program.id = kegiatan.program_id
					LEFT JOIN output
						ON kegiatan.id = output.kegiatan_id
					LEFT JOIN sub_output
						ON output.id = sub_output.output_id
					LEFT JOIN sub_output_realisasi
						ON sub_output.realisasi_id = sub_output_realisasi.id
				GROUP BY group_id") 
		);

		return $list;
	}

	public static function capaianOutputPerDeputi($id)
	{
		$list = DB::select( DB::raw(
				"SELECT
					capaian
				FROM
					program JOIN kegiatan 
						ON program.id = kegiatan.program_id
					JOIN output
						ON kegiatan.id = output.kegiatan_id
					JOIN sub_output
						ON output.id = sub_output.output_id
				WHERE
					program.group_id = ".$id) 
		);

		return $list;
	}

}
