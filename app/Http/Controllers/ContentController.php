<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuliner;
use App\Models\Wisata;
use App\Models\AdatIstiadat;

class ContentController extends Controller
{
    /**
     * Tampilkan daftar konten berdasarkan kategori
     * URL: /kuliner | /wisata | /adat
     */
    public function index($category)
    {
        $items = match ($category) {
            'kuliner' => Kuliner::latest()->get(),
            'wisata'  => Wisata::latest()->get(),
            'adat'    => AdatIstiadat::latest()->get(),
            default   => collect(),
        };

        return view('contents.index', [
            'category' => $category,
            'items' => $items,
            'provinsi' => null, // aman untuk Blade
        ]);
    }

    /**
     * Tampilkan detail konten
     * URL: /kuliner/{slug} | /wisata/{slug} | /adat/{slug}
     */
    public function show($category, $slug)
    {
        $item = match ($category) {
            'kuliner' => Kuliner::where('slug', $slug)->firstOrFail(),
            'wisata'  => Wisata::where('slug', $slug)->firstOrFail(),
            'adat'    => AdatIstiadat::where('slug', $slug)->firstOrFail(),
            default   => abort(404),
        };

        return view('contents.show', [
            'category' => $category,
            'item' => $item,
            'provinsi' => null, // aman untuk Blade
        ]);
    }
}
