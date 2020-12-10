<?php

namespace App\Http\Controllers;

use App\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    //
    public function index()
    {
        $data = Operator::all();
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
        $data = Operator::where('id', $id)->get();
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
        $opt = new Operator();
        $opt->nama = $request->nama;
        $opt->password = $request->password;
        $opt->level = $request->level;
        $opt->foto = $request->foto;

        if ($opt->save()) {
            $res['message'] = "Data berhasil ditambah!";
            $res['values'] = $opt;
            return response($res);
        }
    }

    // updating data function

    public function update(Request $request, $id)
    {
        # code...
        $nama = $request->nama;
        $password = $request->password;
        $level = $request->level;
        $foto = $request->foto;

        $opt = Operator::find($id);
        $opt->nama = $nama;
        $opt->password = $password;
        $opt->level = $level;
        $opt->foto = $foto;

        if ($opt->save()) {
            $res['message'] = "Data berhasil diubah!";
            $res['values'] = $opt;
            return response($res);
        } else {
            $res['message'] = "GAGAL!";
            return response($res);
        }
    }

    public function delete($id)
    {
        $opt = Operator::where('id', $id);

        if ($opt->delete()) {
            $res['message'] = "Data berhasil dihapus!";
            return response($res);
        } else {
            $res['message'] = "Gagal";
            return response($res);
        }
    }
}
