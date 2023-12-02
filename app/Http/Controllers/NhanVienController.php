<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    public function index()
    {
        return view('Page.NhanVien.index');
    }

    public function thongKe()
    {
        return view('Page.ThongKe.index');
    }

    public function store(Request $request)
    {

        $nhan_vien = NhanVien::create([
            'ma_nhan_vien'   => $request->ma_nhan_vien,
            'ho_va_ten'      => $request->ho_va_ten,
            'sdt'            => $request->sdt,
            'que_quan'       => $request->que_quan,
            'ma_chuc_vu'     => $request->ma_chuc_vu,
            'ma_phong_ban'   => $request->ma_phong_ban,
            'ma_bac_luong'      => $request->ma_bac_luong,
        ]);

        return response()->json([
            'status'    => true,
        ]);
    }

    public function getData()
    {
        $data = NhanVien::join('phong_bans', 'nhan_viens.ma_phong_ban', 'phong_bans.id')
            ->join('luongs', 'nhan_viens.ma_bac_luong', 'luongs.id')
            ->join('chuc_vus', 'nhan_viens.ma_chuc_vu', 'chuc_vus.id')
            ->select('nhan_viens.*', 'phong_bans.ten_phong_ban', 'luongs.bac_luong', 'chuc_vus.ten_chuc_vu')
            ->orderBy('nhan_viens.id')
            ->get();
        // dd($data->toArray());

        return response()->json([
            'data'  => $data,
        ]);
    }
    public function updateNhanVien(Request $request)
    {
        $data = $request->all();
        $nv = NhanVien::where('id', $request->id)->first();
        $nv->update($data);
        return response()->json([
            'status'    => true,
        ]);
    }
    public function deleteNhanVien(Request $request)
    {
        NhanVien::where('id', $request->id)->first()->delete();

        return response()->json([
            'status'    => true,
        ]);
    }
}
