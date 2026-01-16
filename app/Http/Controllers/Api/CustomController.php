<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    // GET /api/provinces/{id}/customs
    public function byProvince($provinceId)
    {
        if ($provinceId != 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'Provinsi tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data Adat berdasarkan Provinsi',
            'data' => [
                [
                    'id' => 1,
                    'province_id' => 1,
                    'name' => 'Adat Sunda',
                    'description' => 'Budaya dan adat istiadat Sunda',
                    'image_url' => asset('storage/customs/sunda.jpg')
                ]
            ]
        ]);
    }

    // POST /api/customs
    public function store(Request $request)
    {
        $request->validate([
            'province_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('customs', 'public');
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Adat berhasil ditambahkan',
            'data' => [
                'province_id' => $request->province_id,
                'name' => $request->name,
                'description' => $request->description,
                'image_url' => $imagePath ? asset('storage/' . $imagePath) : null
            ]
        ], 201);
    }
}
