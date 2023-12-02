<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use Illuminate\Http\Request;

class ChucVuController extends Controller
{
    public function index()
    {
        return view('Page.ChucVu.index');
    }

    public function store(Request $request)
    {
        $data   = $request->all();
        ChucVu::create($data);
        return response()->json([
            'trang_thai_them_moi' => true,
        ]);
    }

    public function getData()
    {
        $data = ChucVu::get();
        return response()->json([
            'chuc_vu'  => $data,
        ]);
    }
}
