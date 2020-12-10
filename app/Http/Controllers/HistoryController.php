<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;

class HistoryController extends Controller
{
    public function index()
    {
        $data = History::all();
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
        $data = History::where('id', $id)->get();
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
        $histry = new History();
        $histry->id_user = $request->id_user;
        $histry->id_barang = $request->id_barang;
        $histry->jenis = $request->jenis;
        $histry->tanggal = $request->tanggal;

        if ($histry->save()) {
            $res['message'] = "Data berhasil ditambah!";
            $res['values'] = $histry;
            return response($res);
        }
    }

    // updating data function

    public function update(Request $request, $id)
    {
        # code...
        $id_user    = $request->id_user;
        $id_barang  = $request->id_barang;
        $jenis      = $request->jenis;
        $tanggal    = $request->tanggal;

        $histry = History::find($id);
        $histry->id_user    = $id_user;
        $histry->id_barang  = $id_barang;
        $histry->jenis      = $jenis;
        $histry->tanggal    = $tanggal;

        if ($histry->save()) {
            $res['message'] = "Data berhasil diubah!";
            $res['values'] = $histry;
            return response($res);
        } else {
            $res['message'] = "GAGAL!";
            return response($res);
        }
    }

    public function delete($id)
    {
        $histry = History::where('id', $id);

        if ($histry->delete()) {
            $res['message'] = "Data berhasil dihapus!";
            return response($res);
        } else {
            $res['message'] = "Gagal";
            return response($res);
        }
    }
}
