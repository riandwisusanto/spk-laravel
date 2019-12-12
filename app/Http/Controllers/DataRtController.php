<?php
namespace App\Http\Controllers;
use App\PesertaModel;
use App\UserModel;
use Illuminate\Http\Request;
use App\ComboModel;
use DB;

class DataRtController extends Controller
{
    public function view($id)
    {   
        $combo = ComboModel::all();
        $pendaftar = PesertaModel::where(['id_rt' => $id])->get();
        $nama = UserModel::find($id)->nama;
        return view('Data_rt', compact('combo', 'pendaftar', 'id', 'nama'));
    }

    public function kirimdata($id)
    {
        $combo = ComboModel::all();
        $pendaftar = PesertaModel::where(['id_rt' => $id])->get();
        $nama = UserModel::find($id)->nama;

        $pendapat1 = array();
        $pekerjaan = array();
        $jumlah_tanggungan = array();
        $kondisi_rumah = array();
        $pendidikan = array();
        $alternatif = array();
        for ($i=0; $i < count($pendaftar) ; $i++) { //asumsi ke bobot tertentu
            $pendapat = $pendaftar[$i]->pendapatan;
            if ($pendapat === '> 4.000.000') {
                $pendapat1[$i] = 1;
            }
            else if ($pendapat === '3.000.000 - 4.000.000') {
                $pendapat1[$i] = 2;
            }
            else if ($pendapat === '2.000.000 - 3.000.000') {
                $pendapat1[$i] = 3;
            }
            else if ($pendapat === '1.000.000 - 2.000.000') {
                $pendapat1[$i] = 4;
            }
            else{
                $pendapat1[$i] = 5;
            }

            $pekerja = $pendaftar[$i]->pekerjaan;
            if ($pekerja === 'PNS') {
                $pekerjaan[$i] = 1;
            }
            else if ($pekerja === 'Pegawai Swasta') {
                $pekerjaan[$i] = 2;
            }
            else if ($pekerja === 'Wirausaha') {
                $pekerjaan[$i] = 3;
            }
            else if ($pekerja === 'Petani') {
                $pekerjaan[$i] = 4;
            }
            else{
                $pekerjaan[$i] = 5;
            }

            $tang = $pendaftar[$i]->jumlah_tanggungan;
            if ($tang === '1') {
                $jumlah_tanggungan[$i] = 1;
            }
            else if ($tang === '2') {
                $jumlah_tanggungan[$i] = 2;
            }
            else if ($tang === '3') {
                $jumlah_tanggungan[$i] = 3;
            }
            else if ($tang === '4') {
                $jumlah_tanggungan[$i] = 4;
            }
            else{
                $jumlah_tanggungan[$i] = 5;
            }

            $rmh = $pendaftar[$i]->rumah;
            if ($rmh === 'Layak') {
                $kondisi_rumah[$i] = 2;
            }
            else if ($rmh === 'Cukup Layak') {
                $kondisi_rumah[$i] = 3;
            }
            else if ($rmh === 'Kurang Layak') {
                $kondisi_rumah[$i] = 4;
            }
            else{
                $kondisi_rumah[$i] = 5;
            }

            $pendidik = $pendaftar[$i]->pendidikan;
            if ($pendidik == "S1") {
                $pendidikan[$i] = 1;
            }
            else if ($pendidik == "D3") {
                $pendidikan[$i] = 2;
            }
            else if ($pendidik == "SMA") {
                $pendidikan[$i] = 3;
            }
            else if ($pendidik == "SMP") {
                $pendidikan[$i] = 4;
            }
            else{
                $pendidikan[$i] = 5;
            }
        }

        $alt = $pendapat1[0];
        $alt1 = $pekerjaan[0];
        $alt2 = $jumlah_tanggungan[0];
        $alt3 = $kondisi_rumah[0];
        $alt4 = $pendidikan[0];
        for ($j=1; $j < count($pendaftar); $j++) { // mencari min dan max untuk setiap alternatif
            if($alt < $pendapat1[$j]){
                $alt = $alt;
            }
            else{
                $alt = $pendapat1[$j];
            }

            if($alt1 > $pekerjaan[$j]){
                $alt1 = $alt1;
            }
            else{
                $alt1 = $pekerjaan[$j];
            }

            if($alt2 > $jumlah_tanggungan[$j]){
                $alt2 = $alt2;
            }
            else{
                $alt2 = $jumlah_tanggungan[$j];
            }

            if($alt3 > $kondisi_rumah[$j]){
                $alt3 = $alt3;
            }
            else{
                $alt3 = $kondisi_rumah[$j];
            }

            if($alt4 > $pendidikan[$j]){
                $alt4 = $alt4;
            }
            else{
                $alt4 = $pendidikan[$j];
            }       
        }

        for ($i=0; $i < count($pendaftar); $i++) { // menghitung setiap alternatif
            $pendapat1[$i] = $alt / $pendapat1[$i];
            $pekerjaan[$i] = $pekerjaan[$i] / $alt1;
            $jumlah_tanggungan[$i] = $jumlah_tanggungan[$i] / $alt2;
            $kondisi_rumah[$i] = $kondisi_rumah[$i] / $alt3;
            $pendidikan[$i] = $pendidikan[$i] / $alt4;
        }

        for ($i=0; $i < count($pendaftar); $i++) { // menghitung hasil untuk rekomendasi
            
            $alternatif[$i] = ($pendapat1[$i] * 5) + ($pekerjaan[$i] * 4) + ($jumlah_tanggungan[$i] * 4) + ($kondisi_rumah[$i] * 4) + ($pendidikan[$i] * 3);
            $pendaftar[$i]->nilai = $alternatif[$i];
            $limit = floor(count($pendaftar) * 70 / 100);
            $pendaftar[$i]->kirim = 'ya';
            $pendaftar[$i]->save();
        }

        $set_status = PesertaModel::where(['id_rt' => $id])->orderBy('nilai', 'desc')->get();
        for ($i=0; $i < $limit; $i++) { 
            $set_status[$i]->status = 'Direkomendasikan';
            $set_status[$i]->save();
        }

        
        echo "<script>alert('Data Berhasil Dikirim')</script>";
        return view('Data_rt', compact('combo', 'pendaftar', 'id', 'nama'));
    }
}
