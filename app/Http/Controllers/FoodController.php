<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function getFoodDetail($id)
    {
        $food = Food::find($id);
        if (!$food) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($food);
    }

    public function create()
    {
        return view('admin.create-food');
    }

    public function store(Request $request)
    {
        // 🔄 PERBAIKAN BULLETPROOF: Mengubah 'image' menjadi 'file' agar bersahabat dengan AVIF/WebP di PHP lokal
        $request->validate([
            'title'    => ['required', 'string', 'max:255'],
            'category' => ['required', 'in:card,news,gallery'],
            'image'    => ['required', 'file', 'mimes:jpeg,png,jpg,webp,avif', 'max:2048'], // Menggunakan 'file' + 'mimes'
            'desc'     => ['required', 'string'],
        ]);

        $imagePath = $request->file('image')->store('foods', 'public');

        Food::create([
            'title'    => $request->title,
            'category' => $request->category,
            'image'    => 'storage/' . $imagePath,
            'desc'     => $request->desc,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Artikel baru berhasil dipublikasikan ke web utama!');
    }

    public function edit($id)
    {
        $food = Food::findOrFail($id);
        return view('admin.edit-food', compact('food'));
    }

    public function update(Request $request, $id)
    {
        $food = Food::findOrFail($id);

        // 🔄 PERBAIKAN BULLETPROOF: Mengubah 'image' menjadi 'file' agar bersahabat dengan AVIF/WebP di PHP lokal
        $request->validate([
            'title'    => ['required', 'string', 'max:255'],
            'category' => ['required', 'in:card,news,gallery'],
            'image'    => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp,avif', 'max:2048'], // Menggunakan 'file' + 'mimes'
            'desc'     => ['required', 'string'],
        ]);

        $food->title = $request->title;
        $food->category = $request->category;
        $food->desc = $request->desc;

        if ($request->hasFile('image')) {
            $oldPath = str_replace('storage/', '', $food->image);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }

            $newImagePath = $request->file('image')->store('foods', 'public');
            $food->image = 'storage/' . $newImagePath;
        }

        $food->save();
        return redirect()->route('admin.dashboard')->with('success', 'Aset konten berhasil diperbarui dari ruang redaksi!');
    }

    public function destroy($id)
    {
        $food = Food::findOrFail($id);

        $cleanPath = str_replace('storage/', '', $food->image);
        if (Storage::disk('public')->exists($cleanPath)) {
            Storage::disk('public')->delete($cleanPath);
        }

        $food->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data kuliner berhasil dihapus secara permanen dari server!'
        ]);
    }
}