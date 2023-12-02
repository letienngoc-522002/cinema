<?php

namespace App\Http\Controllers;

use App\Models\PhongBan;
use Illuminate\Http\Request;

class PhongBanController extends Controller
{
    public function index()
    {
        return view('Page.PhongBan.index');
    }

    public function store(Request $request)
    {
        $data   = $request->all();
        PhongBan::create($data);
        return response()->json([
            'trang_thai_them_moi' => true,
        ]);
    }

    public function getData()
    {
        $data = PhongBan::get();
        return response()->json([
            'phong_ban'  => $data,
        ]);
    }
}
