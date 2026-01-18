<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\SearchController;

use App\Models\Province;
use App\Models\Kuliner;
use App\Models\Wisata;
use App\Models\AdatIstiadat;

/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', fn () => view('admin.login'));

Route::post('/admin/login', function (Request $request) {
    if ($request->email === 'admin@provinsi.com' && $request->password === 'admin123') {
        session(['admin_logged_in' => true]);
        return redirect('/admin/dashboard');
    }
    return back()->with('error', 'Email atau password salah');
});

Route::get('/admin/dashboard', function () {
    if (!session('admin_logged_in')) return redirect('/admin/login');
    return view('admin.dashboard');
});

Route::get('/admin/logout', function () {
    session()->flush();
    return redirect('/admin/login');
});

/*
|--------------------------------------------------------------------------
| ADMIN CONTENTS
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('/contents', [ContentController::class, 'index'])->name('admin.contents.index');
    Route::get('/contents/create', [ContentController::class, 'create'])->name('admin.contents.create');
    Route::post('/contents', [ContentController::class, 'store'])->name('admin.contents.store');
    Route::get('/contents/edit/{id}', [ContentController::class, 'edit'])->name('admin.contents.edit');
    Route::put('/contents/update/{id}', [ContentController::class, 'update'])->name('admin.contents.update');
    Route::delete('/contents/delete/{id}', [ContentController::class, 'destroy'])->name('admin.contents.destroy');

    // PROVINCES ADMIN
    Route::get('/provinces', function () {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $provinces = Province::all();
        return view('admin.provinces.index', compact('provinces'));
    })->name('admin.provinces.index');

    Route::get('/provinces/create', function () {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        return view('admin.provinces.create');
    })->name('admin.provinces.create');

    Route::post('/provinces', function (Request $request) {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image'
        ]);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        Province::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'image' => $imageName
        ]);
        return redirect()->route('admin.provinces.index')->with('success', 'Provinsi berhasil ditambahkan');
    })->name('admin.provinces.store');

    Route::get('/provinces/edit/{id}', function ($id) {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $province = Province::findOrFail($id);
        return view('admin.provinces.edit', compact('province'));
    })->name('admin.provinces.edit');

    Route::put('/provinces/update/{id}', function (Request $request, $id) {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $province = Province::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image'
        ]);
        $province->name = $request->name;
        $province->slug = Str::slug($request->name);
        $province->description = $request->description;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $province->image = $imageName;
        }
        $province->save();
        return redirect()->route('admin.provinces.index')->with('success', 'Provinsi berhasil diupdate');
    })->name('admin.provinces.update');

    Route::delete('/provinces/delete/{id}', function ($id) {
        if (!session('admin_logged_in')) return redirect('/admin/login');
        $province = Province::findOrFail($id);
        $province->delete();
        return redirect()->route('admin.provinces.index')->with('success', 'Provinsi berhasil dihapus');
    })->name('admin.provinces.destroy');
});

/*
|--------------------------------------------------------------------------
| PUBLIC PAGES
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home', [
        'provinces' => Province::latest()->take(6)->get(),
        'kuliner'   => Kuliner::latest()->take(6)->get(),
        'wisata'    => Wisata::latest()->take(6)->get(),
        'adat'      => AdatIstiadat::latest()->take(6)->get(),
    ]);
});

Route::get('/about-us', fn () => view('about'));

/*
|--------------------------------------------------------------------------
| PROVINCES (USER)
|--------------------------------------------------------------------------
*/
Route::get('/provinces', [ProvinceController::class, 'index']);
Route::get('/provinces/{slug}', [ProvinceController::class, 'show']);
Route::get('/provinces/{slug}/{category}', [ProvinceController::class, 'showCategory'])
    ->whereIn('category', ['kuliner','wisata','adat']);

/*
|--------------------------------------------------------------------------
| SEARCH
|--------------------------------------------------------------------------
*/
Route::get('/search', [SearchController::class, 'search'])->name('search');

/*
|--------------------------------------------------------------------------
| USER CONTENT (PALING BAWAH – JANGAN DIPINDAH)
|--------------------------------------------------------------------------
*/
Route::get('/{category}', [\App\Http\Controllers\ContentController::class, 'index'])
    ->whereIn('category', ['kuliner','wisata','adat']);

Route::get('/{category}/{slug}', [\App\Http\Controllers\ContentController::class, 'show'])
    ->whereIn('category', ['kuliner','wisata','adat']);
