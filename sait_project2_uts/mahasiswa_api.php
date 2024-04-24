<?php
require_once "config.php";
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
         if(!empty($_GET["nim"]))
         {
            $nim=$_GET["nim"];
            get_mhs($nim);
         }
         else
         {
            get_mhss();
         }
         break;
   case 'POST':
         {
            insert_mhs();
         }     
         break; 
   case 'DELETE':
            $nim = $_GET["nim"];
            $kode_mk = $_GET["kode_mk"];
            delete_mhs($nim, $kode_mk);
            break;
   
   case 'PUT':
            update_mhs();
            break;
   default:

         header("HTTP/1.0 405 Method Not Allowed");
         break;
      break;
 }
 
   function get_mhss()
   {
      global $mysqli;
      // $query="SELECT * FROM pasiens";
      $query = "SELECT m.nim, m.nama, p.nilai, mk.nama_mk, p.kode_mk
      FROM mahasiswa m
      JOIN perkuliahan p ON m.nim = p.nim
      JOIN matakuliah mk ON p.kode_mk = mk.kode_mk";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get List Mahasiswa Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }


   function get_mhs($nim)
{
    global $mysqli;
    $query = "SELECT m.nim, m.nama, p.nilai, mk.nama_mk, p.kode_mk
              FROM mahasiswa m
              JOIN perkuliahan p ON m.nim = p.nim
              JOIN matakuliah mk ON p.kode_mk = mk.kode_mk";
    if ($nim != 0) {
        $query .= " WHERE m.nim = '$nim'";
    }
    $data = array();
    $result = $mysqli->query($query);
    if ($result) {
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $response = array(
            'status' => 1,
            'message' => 'Get Mahasiswa Successfully.',
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Failed to get Mahasiswa.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

   
 
   function insert_mhs()
   {
       global $mysqli;
       // Mengecek apakah request berasal dari form atau API
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $data = $_POST;
       } else {
           // Menerima data dari body request untuk API
           $data = json_decode(file_get_contents('php://input'), true);
       }
   
       // Array untuk memeriksa ketersediaan semua parameter
       $arrcheckpost = array(
           'nim' => 'required',
           'kode_mk' => 'required',
           'nilai' => 'required',
       );
   
       // Menghitung jumlah parameter yang cocok dengan yang diharapkan
       $hitung = count(array_intersect_key($data, $arrcheckpost));
   
       // Jika jumlah parameter cocok dengan yang diharapkan
       if ($hitung == count($arrcheckpost)) {
           // Query untuk memasukkan data ke database
           $result = mysqli_query($mysqli, "INSERT INTO perkuliahan SET
                  nim = '$data[nim]',
                  kode_mk = '$data[kode_mk]', 
                  nilai = '$data[nilai]'
                  ");
           // Memeriksa keberhasilan operasi INSERT
           if ($result) {
               $response = array(
                   'status' => 1,
                   'message' => 'Nilai Mahasiswa Successfully.'
               );
           } else {
               $response = array(
                   'status' => 0,
                   'message' => 'Nilai Mahasiswa Addition Failed.'
               );
           }
       } else {
           // Jika parameter tnimak sesuai
           $response = array(
               'status' => 0,
               'message' => 'Parameter Do Not Match'
           );
       }
       // Mengatur tipe konten sebagai JSON dan mengirimkan respons
       header('Content-Type: application/json');
       echo json_encode($response);
   }



 
   function update_mhs()
   // function update_mhs($nim)
      {
         global $mysqli;
         if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            parse_str(file_get_contents('php://input'), $data);
            // $data = $_PUT;
         }else{
            $data = json_decode(file_get_contents('php://input'), true);
         }

         // echo json_decode($data);
         $arrcheckpost = array('nim' => '', 'kode_mk' => '', 'nilai' => '');
         $hitung = count(array_intersect_key($data, $arrcheckpost));

         $nim = $data['nim'];
         $kode_mk = $data['kode_mk'];
         $nilai = $data['nilai'];

         if($hitung == count($arrcheckpost)){
              $result = mysqli_query($mysqli, "UPDATE perkuliahan SET
              nilai = '$nilai'
              WHERE nim ='$nim' AND kode_mk = '$kode_mk'
              ");
          
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Nilai Mahasiswa Updated Successfully.'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Nilai Mahasiswa Updation Failed.'
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Nilai Mahasiswa Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }




   function delete_mhs($nim, $kode_mk)
{
    global $mysqli;
    $query = "DELETE FROM perkuliahan WHERE nim= '$nim' AND kode_mk = '$kode_mk'";
    if(mysqli_query($mysqli, $query))
    {
        $response = array(
            'status' => 1,
            'message' => 'Nilai Mahasiswa Deleted Successfully.'
        );
    }
    else
    {
        $response = array(
            'status' => 0,
            'message' => 'Nilai Mahasiswa Deletion Failed.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

?> 
