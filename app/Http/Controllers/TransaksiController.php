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
        $trnsk = new History();
        $trnsk->id_user = $request->id_user;
        $trnsk->id_masuk = $request->id_masuk;
        $trnsk->id_keluar = $request->id_keluar;

        if ($trnsk->save()) {
            $res['message'] = "Data berhasil ditambah!";
            $res['values'] = $trnsk;
            return response($res);
        }
    }

    // updating data function

    public function update(Request $request, $id)
    {
        # code...
        $id_user = $request->id_user;
        $id_masuk = $request->id_masuk;
        $id_keluar = $request->id_keluar;

        $trnsk = History::find($id);
        $trnsk->id_user  = $id_user;
        $trnsk->id_masuk  = $id_masuk;
        $trnsk->id_keluar  = $id_keluar;

        if ($trnsk->save()) {
            $res['message'] = "Data berhasil diubah!";
            $res['values'] = $trnsk;
            return response($res);
        } else {
            $res['message'] = "GAGAL!";
            return response($res);
        }
    }

    public function delete($id)
    {
        $trnsk = History::where('id', $id);

        if ($trnsk->delete()) {
            $res['message'] = "Data berhasil dihapus!";
            return response($res);
        } else {
            $res['message'] = "Gagal";
            return response($res);
        }
    }
}
