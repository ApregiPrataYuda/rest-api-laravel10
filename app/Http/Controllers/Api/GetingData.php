<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetingData extends Controller
{
    public function getDoa()
    {
        // Kirim permintaan GET ke API eksternal
        $response = Http::get('https://open-api.my.id/api/doa');

        // Memeriksa apakah respons berhasil
        if ($response->successful()) {
            // Mendapatkan data dalam bentuk array
            $data = $response->json();
          
           
           
            // Menampilkan data (atau bisa diproses sesuai kebutuhan)
            // return response()->json($data);
            $data = [
               'title' => 'mencoba ambil data dari API Eksternal',
               'dataDoa' => $data
            
            ];
            return view('viewData', $data);
        } else {
            // Menangani error jika permintaan gagal
            return response()->json([
                'error' => 'Tidak dapat mengakses API eksternal',
                'status' => $response->status(),
            ], $response->status());
        }
    }

}
