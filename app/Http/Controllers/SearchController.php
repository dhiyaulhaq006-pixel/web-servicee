<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Kuliner;
use App\Models\Wisata;
use App\Models\AdatIstiadat;

class SearchController extends Controller
{
    /**
     * Search untuk semua kategori
     * URL: /search?q=keyword
     */
    public function search(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return redirect('/')->with('error', 'Masukkan kata kunci pencarian');
        }

        // Cari di masing-masing tabel dengan closure untuk keamanan orWhere
        $provinces = Province::where(function($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%")
              ->orWhere('description', 'LIKE', "%{$query}%");
        })->get();

        $kuliner = Kuliner::where(function($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%")
              ->orWhere('description', 'LIKE', "%{$query}%");
        })->get();

        $wisata = Wisata::where(function($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%")
              ->orWhere('description', 'LIKE', "%{$query}%");
        })->get();

        $adat = AdatIstiadat::where(function($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%")
              ->orWhere('description', 'LIKE', "%{$query}%")
              ->orWhere('province_slug', 'LIKE', "%{$query}%"); // optional, biar search bisa juga by provinsi
        })->get();

        return view('search.results', [
            'query' => $query,
            'provinces' => $provinces,
            'kuliner' => $kuliner,
            'wisata' => $wisata,
            'adat' => $adat,
        ]);
    }
}
