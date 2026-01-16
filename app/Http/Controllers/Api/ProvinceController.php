<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProvinceRequest;

class ProvinceController extends Controller
{
    // GET /api/provinces/{id}
    public function show($id)
    {
        // Dummy data / simulasi DB
        if ($id != 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data Provinsi',
            'data' => [
                'id' => 1,
                'name' => 'Jawa Barat',
                'description' => 'Provinsi di Pulau Jawa',
                'image_url' => asset('storage/provinces/jawa-barat.jpg')
            ]
        ]);
    }

    // POST /api/provinces
    public function store(StoreProvinceRequest $request)
    {
        $imagePath = null;

        // upload image jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('provinces', 'public');
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Provinsi berhasil ditambahkan',
            'data' => [
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imagePath,
                'image_url' => $imagePath
                    ? asset('storage/' . $imagePath)
                    : null
            ]
        ], 201);
    }
}
