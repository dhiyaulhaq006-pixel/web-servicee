<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/* ========================
   ADMIN AUTH & ADMIN CRUD
======================== */

// ================= LOGIN =================
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

// ================= DASHBOARD =================
Route::get('/admin/dashboard', function () {
    if (!session('admin_logged_in')) {
        return redirect('/admin/login');
    }

    return view('admin.dashboard');
});

// ================= LOGOUT =================
Route::get('/admin/logout', function () {
    session()->flush();
    return redirect('/admin/login');
});

/* ========================
   ADMIN PROVINCES
======================== */

// List semua provinsi
Route::get('/admin/provinces', function () {
    if (!session('admin_logged_in')) return redirect('/admin/login');

    $provinces = session('provinces', []);
    return view('admin.provinces.index', compact('provinces'));
});

// Form tambah provinsi
Route::get('/admin/provinces/create', function () {
    if (!session('admin_logged_in')) return redirect('/admin/login');

    return view('admin.provinces.create');
});

// Simpan provinsi baru
Route::post('/admin/provinces', function (Request $request) {
    if (!session('admin_logged_in')) return redirect('/admin/login');

    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
    }

    $data = session('provinces', []);
    $data[] = [
        'id' => uniqid(),
        'name' => $request->name,
        'description' => $request->description,
        'image' => $imageName
    ];

    session(['provinces' => $data]);
    return redirect('/admin/provinces');
});

// Hapus provinsi
Route::get('/admin/provinces/delete/{id}', function ($id) {
    if (!session('admin_logged_in')) return redirect('/admin/login');

    $data = session('provinces', []);
    $data = array_filter($data, fn ($p) => $p['id'] != $id);

    session(['provinces' => $data]);
    return redirect('/admin/provinces');
});

// Form edit provinsi
Route::get('/admin/provinces/edit/{id}', function ($id) {
    if (!session('admin_logged_in')) return redirect('/admin/login');

    $provinces = session('provinces', []);
    $province = collect($provinces)->firstWhere('id', $id);

    if (!$province) {
        return redirect('/admin/provinces')->with('error', 'Provinsi tidak ditemukan.');
    }

    return view('admin.provinces.edit', compact('province'));
});

// Proses update provinsi
Route::post('/admin/provinces/update/{id}', function (Request $request, $id) {
    if (!session('admin_logged_in')) return redirect('/admin/login');

    $provinces = session('provinces', []);
    $updated = false;

    foreach ($provinces as &$p) {
        if ($p['id'] === $id) {
            $p['name'] = $request->name;
            $p['description'] = $request->description;

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $p['image'] = $imageName;
            }

            $updated = true;
            break;
        }
    }

    session(['provinces' => $provinces]);

    if (!$updated) {
        return redirect('/admin/provinces')->with('error', 'Provinsi tidak ditemukan.');
    }

    return redirect('/admin/provinces')->with('success', 'Provinsi berhasil diperbarui.');
});

/* ========================
   ADMIN CONTENTS
======================== */

// List semua konten
Route::get('/admin/contents', function () {
    if (!session('admin_logged_in')) return redirect('/admin/login');

    $contents = session('contents', []);
    return view('admin.contents.index', compact('contents'));
});

// Form tambah konten
Route::get('/admin/contents/create', function () {
    if (!session('admin_logged_in')) return redirect('/admin/login');

    return view('admin.contents.create');
});

// Simpan konten baru
Route::post('/admin/contents', function (Request $request) {
    if (!session('admin_logged_in')) return redirect('/admin/login');

    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
    }

    $data = session('contents', []);
    $data[] = [
        'id' => uniqid(),
        'title' => $request->title,
        'category' => $request->category,
        'image' => $imageName
    ];

    session(['contents' => $data]);
    return redirect('/admin/contents');
});

// Hapus konten
Route::get('/admin/contents/delete/{id}', function ($id) {
    if (!session('admin_logged_in')) return redirect('/admin/login');

    $data = session('contents', []);
    $data = array_filter($data, fn ($c) => $c['id'] != $id);

    session(['contents' => $data]);
    return redirect('/admin/contents');
});

// Form edit konten
Route::get('/admin/contents/edit/{id}', function ($id) {
    if (!session('admin_logged_in')) return redirect('/admin/login');

    $contents = session('contents', []);
    $content = collect($contents)->firstWhere('id', $id);

    if (!$content) {
        return redirect('/admin/contents')->with('error', 'Konten tidak ditemukan.');
    }

    return view('admin.contents.edit', compact('content'));
});

// Proses update konten
Route::post('/admin/contents/update/{id}', function (Request $request, $id) {
    if (!session('admin_logged_in')) return redirect('/admin/login');

    $contents = session('contents', []);
    $updated = false;

    foreach ($contents as &$c) {
        if ($c['id'] === $id) {
            $c['title'] = $request->title;
            $c['category'] = $request->category;

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $c['image'] = $imageName;
            }

            $updated = true;
            break;
        }
    }

    session(['contents' => $contents]);

    if (!$updated) {
        return redirect('/admin/contents')->with('error', 'Konten tidak ditemukan.');
    }

    return redirect('/admin/contents')->with('success', 'Konten berhasil diperbarui.');
});

/* ========================
   PUBLIC PAGES
======================== */

Route::get('/', function () {
    return view('home');
});

// Halaman Tentang Kami
Route::get('/about-us', function () {
    return view('about');
});

Route::get('/provinces', function () {
    return view('provinces.index');
});

Route::get('/provinces/{slug}', function ($slug) {
    return view('provinces.show', compact('slug'));
});

/* ========================
   DYNAMIC CONTENT PER PROVINSI
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
   GLOBAL CATEGORY
======================== */

Route::get('/{category}', function ($category) {
    if (!in_array($category, ['adat', 'kuliner', 'wisata'])) {
        abort(404);
    }

    return view('contents.index', [
        'provinsi' => null,
        'category' => $category
    ]);
});

Route::get('/{category}/{slug}', function ($category, $slug) {
    if (!in_array($category, ['adat', 'kuliner', 'wisata'])) {
        abort(404);
    }

    return view('contents.show', [
        'provinsi' => null,
        'category' => $category,
        'slug' => $slug
    ]);
});
