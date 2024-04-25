<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use GuzzleHttp\Client;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function create(){
        return view('createnilai');
    }

    public function put(string $nim){
        $client = new Client();
        $url = "http://localhost/sait_project2_uts/mahasiswa_api.php?nim=".$nim;
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('editMahasiswa',['data'=>$data]);
    }

}
