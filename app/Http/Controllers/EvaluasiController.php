<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tim;
use App\Posko;
use App\Relawan;

class EvaluasiController extends Controller
{
    function fuzzifikasi($relawan, $bencana){
        if($relawan < 20){
            $bb_rel = 1;
            $ba_rel = 0;
        }
        elseif($relawan >= 20 && $relawan <= 50){
            $bb_rel = (50 - $relawan) / (50 - 20);
            $ba_rel = ($relawan - 20) / (50 - 20);
        }
        else{
            $bb_rel = 0;
            $ba_rel = 1;
        }

        if($bencana < 2){
            $bb_ben = 1;
            $ba_ben = 0;
        }
        elseif($bencana >= 2 && $bencana <= 5){
            $bb_ben = (5 - $bencana) / (5 - 2);
            $ba_ben = ($bencana - 2) / (5 - 2);
        }
        else{
            $bb_ben = 0;
            $ba_ben = 1;
        }

        return array($bb_rel, $ba_rel, $bb_ben, $ba_ben);
    }
    function inferensi($bb_rel, $ba_rel, $bb_ben, $ba_ben){
        $a1 = min($bb_rel, $bb_ben);
        $x1 = 15 - ($a1 * (15 -5));
        $a2 = min($bb_rel, $ba_ben);
        $x2 = ($a2 * (15 - 5)) + 5;
        $a3 = min($ba_rel, $bb_ben);
        $x3 = 15 - ($a3 * (15 -5));
        $a4 = min($ba_rel, $ba_ben);
        $x4 = 15 - ($a4 * (15 -5));

        return array($a1,$a2,$a3,$a4,$x1,$x2,$x3,$x4);
    }
    function defuzzifikasi($a1,$a2,$a3,$a4,$x1,$x2,$x3,$x4){
        return ((($x1 * $a1) + ($x2 * $a2) + ($x3 * $a3) + ($x4 * $a4)) / ($a1 + $a2 + $a3 + $a4));
    }
    function fuzzy($a, $b){
        $output = $this->fuzzifikasi($a, $b);
        $bb_rel = $output[0];
        $ba_rel = $output[1];
        $bb_ben = $output[2];
        $ba_ben = $output[3];

        $output = $this->inferensi($bb_rel, $ba_rel, $bb_ben, $ba_ben);
        $a1 = $output[0];
        $a2 = $output[1];
        $a3 = $output[2];
        $a4 = $output[3];
        $x1 = $output[4];
        $x2 = $output[5];
        $x3 = $output[6];
        $x4 = $output[7];

        return ((int)$this->defuzzifikasi($a1,$a2,$a3,$a4,$x1,$x2,$x3,$x4));
    }
    public function index(){
        $tim = new Tim;
        $posko = new Posko;
        $relawan = new Relawan;

        $tim = Tim::orderBy('created_at', 'desc')->get();
        $posko = Posko::orderBy('created_at', 'desc')->get();
        $relawan = Relawan::orderBy('created_at', 'desc')->get();

        // pie chart
        if(json_encode($tim) == "[]"){
            dd(json_encode($tim));
        }
        else{
            $arr_tim = $tim->toArray();
            foreach($arr_tim as $tm){
                $all_tim[] = $tm['peran_tim'];
            }
            $unique_tim = array_unique($all_tim);
            foreach($unique_tim as $uq){
                $peran_tim[] = $uq;
            }
            $arr_jumlah_tim = array_count_values($all_tim);
            foreach($arr_jumlah_tim as $jt){
                $jumlah_tim[] = $jt;
            }
        }
        
        // line chart
        if(json_encode($posko) == "[]"){
            dd(json_encode($posko));
        }
        else{
            $arr_posko = $posko->toArray();
            foreach($arr_posko as $pk){
                $all_bencana[] = $pk['nama_bencana'];
                $waktu_bencana[] = $pk['waktu_bencana'];
                $all_posko[] = $pk['nama_posko'];
				$all_long[] = $pk['longitude_posko'];
				$all_lat[] = $pk['latitude_posko'];
				$all_kab[] = $pk['alamat_kabupaten_posko'];
            }
			$unique_posko = array_unique($all_posko);
			foreach($unique_posko as $up){
				$name_posko[] = $up;
			}	
			$unique_long = array_unique($all_long);
			foreach($unique_long as $ul){
				$longitude[] = $ul;
			}
			$unique_lat = array_unique($all_lat);
			foreach($unique_lat as $ula){
				$latitude[] = $ula;
			}
			$unique_kab = array_unique($all_kab);
			foreach($unique_kab as $uk){
				$kabupaten[] = $ula;
			}
            $unique_bencana = array_unique($all_bencana);
            foreach($unique_bencana as $uq){
                $bencana[] = $uq;
            }
            $arr_jumlah_bencana = array_count_values($all_bencana);
            foreach($arr_jumlah_bencana as $jb){
                $jumlah_bencana[] = $jb;
            }
            foreach ($waktu_bencana as $wb) {
                $month[] = date("n", strtotime($wb));
            }
            sort($month);
            $arr_jumlah_month = array_count_values($month);
            for ($i=1; $i <= 12; $i++) { 
                $check_month[$i] = array_key_exists($i, $arr_jumlah_month);
            }
            for ($i=0; $i < 12; $i++) { 
                if($check_month[$i + 1]){
                    $jumlah_month[$i] = $arr_jumlah_month[$i +1];
                }
                else{
                    $jumlah_month[$i] = 0;
                }
            }
        }

        // bar chart dan maps
        if(json_encode($relawan) == "[]"){
            dd(json_encode($relawan));
        }
        else{
            $arr_keahlian = $relawan->toArray();
            foreach($arr_keahlian as $kh){
                $all_keahlian[] = $kh['keahlian'];
                $all_relawan[] = $kh['nama_relawan'];
				$long_relawan[] = $kh['longitude_relawan'];
				$lat_relawan[] = $kh['latitude_relawan'];
            }
            $unique_keahlian = array_unique($all_keahlian);
            foreach($unique_keahlian as $uk){
                $keahlian[] = $uk;
            }
            $arr_jumlah_keahlian = array_count_values($all_keahlian);
            foreach($arr_jumlah_keahlian as $jk){
                $jumlah_keahlian[] = $jk;
            }
            $tmp = [];
            for ($i=0; $i < count($keahlian); $i++) {
                $tmp[0] = $keahlian[$i];
                $tmp[1] = $jumlah_keahlian[$i];
                $data_keahlian[] = $tmp;
                $tmp = null;
            }
            $unique_longrel = array_unique($long_relawan);
            foreach($unique_longrel as $rellon){
                $long_rel[] = $rellon;
            }
            $unique_latrel = array_unique($lat_relawan);
            foreach($unique_latrel as $rellat){
                $lat_rel[] = $rellat;
            }
        }

        $fuzzy = $this->fuzzy(count($all_relawan), count($all_bencana));

        // dd($test);
        // dd(json_encode($data_keahlian));
        // dd(json_encode(count($all_bencana)));

        //return view('content_dinas.evaluasi.index', ['bencana' => $bencana, 'jumlah_bencana' => $jumlah_bencana, 'peran_tim' => $peran_tim, 'jumlah_tim' => $jumlah_tim, 'jumlah_month' => $jumlah_month, 'data_keahlian' => $data_keahlian]);

        return view('content_dinas.evaluasi.index', ['fuzzy' => $fuzzy, 'long_relawan' => $long_relawan, 'lat_relawan' => $lat_relawan, 'all_relawan' => $all_relawan, 'long_rel' => $long_rel, 'lat_rel' => $lat_rel,'keahlian' => $keahlian, 'data_keahlian' => $data_keahlian, 'name_posko' => $name_posko, 'longitude' => $longitude, 'latitude' => $latitude, 'kabupaten' => $kabupaten, 'all_posko' => $all_posko, 'all_long' => $all_long, 'all_lat' => $all_lat, 'all_kab' => $all_kab, 'bencana' => $bencana, 'jumlah_bencana' => $jumlah_bencana, 'peran_tim' => $peran_tim, 'jumlah_tim' => $jumlah_tim, 'jumlah_month' => $jumlah_month, 'all_bencana' => $all_bencana]);
      }

      public function index2(){
        $tim = new Tim;
        $posko = new Posko;
        $relawan = new Relawan;

        $tim = Tim::orderBy('created_at', 'desc')->get();
        $posko = Posko::orderBy('created_at', 'desc')->get();
        $relawan = Relawan::orderBy('created_at', 'desc')->get();

        // pie chart
        if(json_encode($tim) == "[]"){
            dd(json_encode($tim));
        }
        else{
            $arr_tim = $tim->toArray();
            foreach($arr_tim as $tm){
                $all_tim[] = $tm['peran_tim'];
            }
            $unique_tim = array_unique($all_tim);
            foreach($unique_tim as $uq){
                $peran_tim[] = $uq;
            }
            $arr_jumlah_tim = array_count_values($all_tim);
            foreach($arr_jumlah_tim as $jt){
                $jumlah_tim[] = $jt;
            }
        }
        
        // line chart
        if(json_encode($posko) == "[]"){
            dd(json_encode($posko));
        }
        else{
            $arr_posko = $posko->toArray();
            foreach($arr_posko as $pk){
                $all_bencana[] = $pk['nama_bencana'];
                $waktu_bencana[] = $pk['waktu_bencana'];
                $all_posko[] = $pk['nama_posko'];
				$all_long[] = $pk['longitude_posko'];
				$all_lat[] = $pk['latitude_posko'];
				$all_kab[] = $pk['alamat_kabupaten_posko'];
				$alamat_lengkap_posko[] = $pk['alamat_lengkap_posko'];
            }
			$unique_posko = array_unique($all_posko);
			foreach($unique_posko as $up){
				$name_posko[] = $up;
			}	
			$unique_long = array_unique($all_long);
			foreach($unique_long as $ul){
				$longitude[] = $ul;
			}
			$unique_lat = array_unique($all_lat);
			foreach($unique_lat as $ula){
				$latitude[] = $ula;
			}
			$unique_kab = array_unique($all_kab);
			foreach($unique_kab as $uk){
				$kabupaten[] = $ula;
			}
            $unique_bencana = array_unique($all_bencana);
            foreach($unique_bencana as $uq){
                $bencana[] = $uq;
            }
            $arr_jumlah_bencana = array_count_values($all_bencana);
            foreach($arr_jumlah_bencana as $jb){
                $jumlah_bencana[] = $jb;
            }
            foreach ($waktu_bencana as $wb) {
                $month[] = date("n", strtotime($wb));
            }
            sort($month);
            $arr_jumlah_month = array_count_values($month);
            for ($i=1; $i <= 12; $i++) { 
                $check_month[$i] = array_key_exists($i, $arr_jumlah_month);
            }
            for ($i=0; $i < 12; $i++) { 
                if($check_month[$i + 1]){
                    $jumlah_month[$i] = $arr_jumlah_month[$i +1];
                }
                else{
                    $jumlah_month[$i] = 0;
                }
            }
        }

        // bar chart dan maps
        if(json_encode($relawan) == "[]"){
            dd(json_encode($relawan));
        }
        else{
            $arr_keahlian = $relawan->toArray();
            foreach($arr_keahlian as $kh){
                $all_keahlian[] = $kh['keahlian'];
                $all_relawan[] = $kh['nama_relawan'];
				$lat_relawan[] = $kh['latitude_relawan'];
				$long_relawan[] = $kh['longitude_relawan'];
                $alamat_lengkap_relawan[] = $kh['alamat_lengkap_relawan'];
            }
            $unique_keahlian = array_unique($all_keahlian);
            foreach($unique_keahlian as $uk){
                $keahlian[] = $uk;
            }
            $arr_jumlah_keahlian = array_count_values($all_keahlian);
            foreach($arr_jumlah_keahlian as $jk){
                $jumlah_keahlian[] = $jk;
            }
            $tmp = [];
            for ($i=0; $i < count($keahlian); $i++) {
                $tmp[0] = $keahlian[$i];
                $tmp[1] = $jumlah_keahlian[$i];
                $data_keahlian[] = $tmp;
                $tmp = null;
            }
            $unique_longrel = array_unique($long_relawan);
            foreach($unique_longrel as $rellon){
                $long_rel[] = $rellon;
            }	
            $unique_latrel = array_unique($lat_relawan);
            foreach($unique_latrel as $rellat){
                $lat_rel[] = $rellat;
            }
        }

        // dd($arr_posko);
        // dd(json_encode($data_keahlian));
        // dd(json_encode(count($jumlah_keahlian)));

        //return view('content_dinas.evaluasi.index', ['bencana' => $bencana, 'jumlah_bencana' => $jumlah_bencana, 'peran_tim' => $peran_tim, 'jumlah_tim' => $jumlah_tim, 'jumlah_month' => $jumlah_month, 'data_keahlian' => $data_keahlian]);

        return view('content_dinas.evaluasi.index2', ['alamat_lengkap_posko' => $alamat_lengkap_posko,'alamat_lengkap_relawan' => $alamat_lengkap_relawan,  'long_relawan' => $long_relawan, 'lat_relawan' => $lat_relawan, 'all_relawan' => $all_relawan, 'long_rel' => $long_rel, 'lat_rel' => $lat_rel,'keahlian' => $keahlian, 'data_keahlian' => $data_keahlian, 'name_posko' => $name_posko, 'longitude' => $longitude, 'latitude' => $latitude, 'kabupaten' => $kabupaten, 'all_posko' => $all_posko, 'all_long' => $all_long, 'all_lat' => $all_lat, 'all_kab' => $all_kab, 'bencana' => $bencana, 'jumlah_bencana' => $jumlah_bencana, 'peran_tim' => $peran_tim, 'jumlah_tim' => $jumlah_tim, 'jumlah_month' => $jumlah_month]);
      }
}
