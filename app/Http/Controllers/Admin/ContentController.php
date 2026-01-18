<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Province;
use App\Models\Kuliner;
use App\Models\Wisata;
use App\Models\AdatIstiadat;

class ContentController extends Controller
{
    /**
     * Hapus method dashboard() karena tidak dipakai
     */

    /**
     * Daftar semua konten (semua kategori)
     */
    public function index()
    {
        $contents = [
            'kuliner' => Kuliner::all(),
            'wisata'  => Wisata::all(),
            'adat'    => AdatIstiadat::all(),
        ];

        return view('admin.contents.index', compact('contents'));
    }

    /**
     * Form tambah konten baru
     */
    public function create()
    {
        $provinces = Province::all();
        return view('admin.contents.create', compact('provinces'));
    }

    /**
     * Simpan konten baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required|in:kuliner,wisata,adat',
            'province' => 'required',
            'description' => 'required',
            'image' => 'nullable|image'
        ]);

        $model = match($request->category) {
            'kuliner' => Kuliner::class,
            'wisata'  => Wisata::class,
            'adat'    => AdatIstiadat::class,
        };

        $id_field = match($request->category) {
            'kuliner' => 'kuliner_id',
            'wisata'  => 'wisata_id',
            'adat'    => 'adat_id',
        };

        $data = [
            $id_field => strtoupper(substr($request->category,0,3)) . time(),
            'name' => $request->title,
            'slug' => Str::slug($request->title),
            'province_slug' => $request->province,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $model::create($data);

        return redirect()->route('admin.contents.index')->with('success', 'Konten berhasil ditambahkan');
    }

    /**
     * Form edit konten
     */
    public function edit($id)
    {
        $content = Kuliner::find($id) ?? Wisata::find($id) ?? AdatIstiadat::findOrFail($id);
        $type = $content instanceof Kuliner ? 'kuliner' : ($content instanceof Wisata ? 'wisata' : 'adat');
        $provinces = Province::all();

        return view('admin.contents.edit', compact('content','type','provinces'));
    }

    /**
     * Update konten
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required|in:kuliner,wisata,adat',
            'province' => 'required',
            'description' => 'required',
            'image' => 'nullable|image'
        ]);

        $oldContent = Kuliner::find($id) ?? Wisata::find($id) ?? AdatIstiadat::findOrFail($id);
        $oldType = $oldContent instanceof Kuliner ? 'kuliner' : ($oldContent instanceof Wisata ? 'wisata' : 'adat');

        $newModel = match($request->category) {
            'kuliner' => Kuliner::class,
            'wisata'  => Wisata::class,
            'adat'    => AdatIstiadat::class,
        };

        $data = [
            'name' => $request->title,
            'slug' => Str::slug($request->title),
            'province_slug' => $request->province,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        } else {
            $data['image'] = $oldContent->image;
        }

        if ($oldType !== $request->category) {
            $oldContent->delete();
            $id_field = match($request->category) {
                'kuliner' => 'kuliner_id',
                'wisata'  => 'wisata_id',
                'adat'    => 'adat_id',
            };
            $data[$id_field] = strtoupper(substr($request->category,0,3)) . time();
            $newModel::create($data);
        } else {
            $oldContent->update($data);
        }

        return redirect()->route('admin.contents.index')->with('success', 'Konten berhasil diupdate');
    }

    /**
     * Hapus konten
     */
    public function destroy($id)
    {
        $content = Kuliner::find($id) ?? Wisata::find($id) ?? AdatIstiadat::findOrFail($id);
        $content->delete();

        return redirect()->route('admin.contents.index')->with('success', 'Konten berhasil dihapus');
    }
}
