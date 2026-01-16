<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CulinaryController extends Controller
{
    // GET /api/tours/{id}/culinary
    public function byTour($tourId)
    {
        if ($tourId != 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'Wisata tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data Kuliner berdasarkan tempat Wisata',
            'data' => [
                [
                    'id' => 1,
                    'tour_id' => 1,
                    'name' => 'Ikan Bakar Pangandaran',
                    'description' => 'Kuliner khas pantai pangandaran, Jawa Barat',
                    'image_url' => asset('storage/culinary/ikan-bakar.jpg')
                ]
            ]
        ]);
    }

    // POST /api/culinary
    public function store(Request $request)
    {
        $request->validate([
            'tour_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('culinary', 'public');
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Kuliner berhasil ditambahkan',
            'data' => [
                'tour_id' => $request->tour_id,
                'name' => $request->name,
                'description' => $request->description,
                'image_url' => $imagePath ? asset('storage/' . $imagePath) : null
            ]
        ], 201);
    }
}
