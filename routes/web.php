<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/* ========================
   Public Pages
======================== */
Route::get('/', function () {
    return view('home');
});

Route::get('/provinces', function () {
    return view('provinces.index');
});

Route::get('/provinces/{slug}', function ($slug) {
    return view('provinces.show', ['slug' => $slug]);
});

/* ========================
   Dynamic Content per Provinsi
======================== */
Route::get('/provinces/{slug}/{category}', function ($slug, $category) {
    if (!in_array($category, ['adat', 'kuliner', 'wisata'])) {
        abort(404);
    }

    return view('contents.index', [
        'provinsi' => $slug,
        'category' => $category
    ]);
});

Route::get('/provinces/{slug}/{category}/{item}', function ($slug, $category, $item) {
    if (!in_array($category, ['adat', 'kuliner', 'wisata'])) {
        abort(404);
    }

    return view('contents.show', [
        'provinsi' => $slug,
        'category' => $category,
        'slug' => $item
    ]);
});

/* ========================
   Global Category (tanpa provinsi)
======================== */
Route::get('/{category}', function ($category) {
    if (!in_array($category, ['adat', 'kuliner', 'wisata'])) {
        abort(404);
    }

    return view('contents.index', [
        'provinsi' => null, // tanda ini global
        'category' => $category
    ]);
});

Route::get('/{category}/{slug}', function ($category, $slug) {
    if (!in_array($category, ['adat', 'kuliner', 'wisata'])) {
        abort(404);
    }

    return view('contents.show', [
        'provinsi' => null, // tanda ini global
        'category' => $category,
        'slug' => $slug
    ]);
});

/* ========================
   Admin Pages
======================== */
Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::post('/admin/login', function (Request $request) {
    if ($request->email === 'admin@provinsi.com' && $request->password === 'admin123') {
        session(['admin_logged_in' => true]);
        return redirect('/admin/dashboard');
    }
    return back()->with('error', 'Email atau password salah');
});

Route::get('/admin/dashboard', function () {
    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }
    return view('admin.dashboard');
});

/* ========================
   Admin CRUD (Dummy)
======================== */
Route::get('/admin/provinces', function () {
    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }
    return view('admin.provinces.index');
});

Route::get('/admin/contents', function () {
    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }
    return view('admin.contents.index');
});
