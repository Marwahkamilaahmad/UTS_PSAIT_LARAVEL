<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ConsumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = "http://localhost/sait_project2_uts/mahasiswa_api.php";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('pasien.tableMahasiswa', compact('data'));
    }



    public function store(Request $request)
    {
        // Ambil data dari form
        $nim  = $request->input('nim');
        $kode_mk = $request->input('kode_mk');
        $nilai = $request->input('nilai');

        // Buat array parameter untuk dikirim ke API
        $parameter = [
            'nim' => $nim,
            'kode_mk' => $kode_mk,
            'nilai' => $nilai,
        ];

        // Kirim permintaan POST ke API menggunakan GuzzleHttp Client
        $client = new Client();
        $url = "http://localhost/sait_project2_uts/mahasiswa_api.php";
        $response = $client->request('POST', $url, [
            'form_params' => $parameter,
        ]);
        // Ambil respons dari API
        $content = $response->getBody()->getContents();
        $contentArrays = json_decode($content, true);
        if($contentArrays['status'] != true){
        $error = $contentArrays['message'];
            return Redirect::back()->withErrors($error);
        }else{
            return Redirect::route('lihat-datamahasiswa');
        }
    }

    public function update(Request $request, string $nim)
    {

        // Ambil data dari form
        $nim  = $request->input('nim');
        $kode_mk = $request->input('kode_mk');
        $nilai = $request->input('nilai');

        // Buat array parameter untuk dikirim ke API
        $parameter = [
            'nim' => $nim,
            'kode_mk' => $kode_mk,
            'nilai' => $nilai,
        ];


        $client = new Client();
        $url = "http://localhost/sait_project2_uts/mahasiswa_api.php";

        $response = $client->request('PUT', $url, [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded', // Set tipe konten menjadi application/x-www-form-urlencoded
            ],
            'body' => http_build_query($parameter), // Gunakan http_build_query untuk mengonversi array parameter menjadi format x-www-form-urlencoded
        ]);

        $content = $response->getBody()->getContents();
        $contentArrays = json_decode($content, true);
        if($contentArrays['status'] != true){
            $error = $contentArrays['message'];
            return Redirect::back()->withErrors($error);
        }else{
            return Redirect::route('lihat-datamahasiswa');
        }


    }

    public function destroy(Request $request, string $nim)
{
    $client = new Client();
    $kode_mk = $request->kode_mk;
    $url = "http://localhost/sait_project2_uts/mahasiswa_api.php?nim=".$nim."&kode_mk=".$kode_mk;
    $response = $client->request('DELETE', $url);
    $content = $response->getBody()->getContents();
    $contentArrays = json_decode($content, true);

    return Redirect::back()->with('success', 'berhasil');
}

}

