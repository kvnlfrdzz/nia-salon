<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar semua produk di halaman admin.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = null;
        // GANTI KE S3 UNTUK SUPABASE STORAGE PERMANEN
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 's3');
        }

        Product::create([
            'name'        => $validated['name'],
            'description' => $validated['description'],
            'price'       => $validated['price'],
            'image_path'  => $imagePath,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit untuk produk yang sudah ada.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Memperbarui data produk di database.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = $product->image_path;

        if ($request->hasFile('image')) {
            // HAPUS GAMBAR LAMA DI S3 SEBELUM DI-REPLACE
            if ($product->image_path) {
                Storage::disk('s3')->delete($product->image_path);
            }
            // UPLOAD GAMBAR BARU KE S3
            $imagePath = $request->file('image')->store('products', 's3');
        }

        $product->update([
            'name'        => $validated['name'],
            'description' => $validated['description'],
            'price'       => $validated['price'],
            'image_path'  => $imagePath,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Menghapus produk dari database beserta gambarnya.
     */
    public function destroy(Product $product)
    {
        // HAPUS GAMBAR DI S3 SAAT DATA PRODUK DIHAPUS
        if ($product->image_path) {
            Storage::disk('s3')->delete($product->image_path);
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}