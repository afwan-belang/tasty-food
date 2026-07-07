<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * 1. API ENDPOINT (AJAX FETCH)
     * Mengambil satu data makanan berdasarkan ID dan mengembalikannya dalam bentuk JSON.
     * Fungsi ini akan dipanggil oleh JavaScript (Fase 4) untuk menampilkan Pop-Up Modal.
     */
    public function getFoodDetail($id)
    {
        $food = Food::find($id);

        if (!$food) {
            return response()->json([
                'success' => false,
                'message' => 'Data kuliner tidak ditemukan.'
            ], 404);
        }

        return response()->json($food);
    }

    /**
     * 2. TAMPILKAN FORM TAMBAH DATA
     * Mengarahkan Admin ke halaman form tambah data makanan/konten baru.
     */
    public function create()
    {
        return view('admin.create-food');
    }

    /**
     * 3. SIMPAN DATA BARU (CREATE)
     * Memvalidasi input dari form admin, mengupload file gambar fisik, 
     * dan menyimpannya ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi input secara ketat untuk mencegah data corup/ilegal masuk ke database
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'in:card,news,gallery'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp,avif', 'max:2048'], // Maksimal 2MB
            'desc' => ['required', 'string'],
        ]);

        // Proses enkripsi dan upload gambar ke folder: storage/app/public/foods
        $imagePath = $request->file('image')->store('foods', 'public');

        // Insert data ke dalam tabel 'foods' melalui Model Eloquent
        Food::create([
            'title' => $request->title,
            'category' => $request->category,
            'image' => 'storage/' . $imagePath, // Path publik yang bisa diakses oleh fungsi asset() di Blade
            'desc' => $request->desc,
        ]);

        // Redirect kembali ke halaman home dengan membawa alert notifikasi sukses
        return redirect()->route('home')->with('success', 'Menu kuliner premium baru berhasil diterbitkan!');
    }

    /**
     * 4. HAPUS DATA PERMANEN (DELETE)
     * Menghapus file gambar fisik dari server penyimpanan lokal,
     * kemudian menghapus data barisnya di dalam database melalui request AJAX.
     */
    public function destroy($id)
    {
        $food = Food::findOrFail($id);

        // Membersihkan string path agar bisa dibaca oleh Disk Storage Laravel
        // Mengubah dari 'storage/foods/namafile.avif' menjadi 'foods/namafile.avif'
        $cleanStoragePath = str_replace('storage/', '', $food->image);

        // Hapus file gambar fisik dari folder storage
        if (Storage::disk('public')->exists($cleanStoragePath)) {
            Storage::disk('public')->delete($cleanStoragePath);
        }

        // Hapus data dari tabel database
        $food->delete();

        // Mengembalikan response sukses dalam format JSON untuk dibaca oleh script Fetch AJAX
        return response()->json([
            'success' => true,
            'message' => 'Data kuliner berhasil dihapus secara permanen dari server!'
        ]);
    }
}