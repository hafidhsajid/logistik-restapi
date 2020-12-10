<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    //
    public function index()
    {
        $data = Barang::all();
        if (count($data) > 0) {
            $res['message'] = "Sukses!";
            $res['values'] = $data;
            return response($res);
        } else {
            $res['message'] = "KOSONG";
            return response($res);
        }
    }
    public function getId($id)
    {
        # code...
        $data = Barang::where('id', $id)->get();
        if (count($data) > 0) {
            $res['message'] = "Sukses!";
            $res['values'] = $data;
            return response($res);
        } else {
            $res['message'] = "KOSONG";
            return response($res);
        }
    }
    // creating data function
    public function create(Request $request)
    {
        $brg = new Barang();
        $brg->nama      = $request->nama;
        $brg->total  = $request->total;
        $brg->foto      = $request->foto;

        if ($brg->save()) {
            $res['message'] = "Data berhasil ditambah!";
            $res['values'] = $brg;
            return response($res);
        }
    }

    // updating data function

    public function update(Request $request, $id)
    {
        # code...
        $nama = $request->nama;
        $total = $request->total;
        $foto = $request->foto;

        $brg = Barang::find($id);
        $brg->nama = $nama;
        $brg->total = $total;
        $brg->foto = $foto;

        if ($brg->save()) {
            $res['message'] = "Data berhasil diubah!";
            $res['values'] = $brg;
            return response($res);
        } else {
            $res['message'] = "GAGAL!";
            return response($res);
        }
    }

    public function delete($id)
    {
        $brg = Barang::where('id', $id);

        if ($brg->delete()) {
            $res['message'] = "Data berhasil dihapus!";
            return response($res);
        } else {
            $res['message'] = "Gagal";
            return response($res);
        }
    }
}
