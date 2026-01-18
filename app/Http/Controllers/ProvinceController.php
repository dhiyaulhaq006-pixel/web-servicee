<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    // Daftar semua provinsi
    public function index()
    {
        $provinces = Province::all();
        return view('provinces.index', compact('provinces'));
    }

    // Detail provinsi
    public function show($slug)
    {
        $province = Province::where('slug', $slug)->firstOrFail();
        return view('provinces.show', compact('province'));
    }

    // Tampilkan daftar konten berdasarkan kategori dalam provinsi
    public function showCategory($slug, $category)
    {
        $province = Province::where('slug', $slug)->firstOrFail();

        $items = match ($category) {
            'kuliner' => $province->kuliner,
            'wisata'  => $province->wisata,
            'adat'    => $province->adatIstiadat,
        };

        return view('contents.index', [
            'category' => $category,
            'provinsi' => $province->slug,
            'items' => $items,
        ]);
    }
}
