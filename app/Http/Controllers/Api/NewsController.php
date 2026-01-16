<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function byType($type)
    {
        return response()->json(
            News::where('type', $type)->get()
        );
    }

    public function show($id)
    {
        return response()->json(
            News::findOrFail($id)
        );
    }
}
