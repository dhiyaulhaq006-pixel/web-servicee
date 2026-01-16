<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // ======================
    // CREATE
    // ======================
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string',
            'content'     => 'required',
            'type'        => 'required|in:province,custom,tour,culinary',
            'province_id' => 'nullable|integer',
        ]);

        $news = News::create($data);

        return response()->json([
            'status' => 'success',
            'data'   => $news,
        ], 201);
    }

    // ======================
    // UPDATE
    // ======================
    public function update(Request $request, $id)
    {
        $news = News::find($id);

        if (!$news) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Berita tidak ditemukan',
            ], 404);
        }

        News::where('id', $id)->update([
            'title'       => $request->title,
            'content'     => $request->content,
            'type'        => $request->type,
            'province_id' => $request->province_id,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Berita berhasil diperbarui',
        ]);
    }

    // ======================
    // DELETE
    // ======================
    public function destroy($id)
    {
        $news = News::find($id);

        if (!$news) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Berita tidak ditemukan',
            ], 404);
        }

        News::where('id', $id)->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Berita berhasil dihapus',
        ]);
    }
}
