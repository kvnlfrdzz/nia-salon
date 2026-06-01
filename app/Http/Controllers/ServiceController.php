<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'category'    => 'required|in:service,product',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            // LOGIKA BARU: Tentukan folder berdasarkan kategori
            $folderName = $validated['category'] === 'product' ? 'products' : 'services';
            
            // Simpan ke Supabase S3 dengan nama folder yang dinamis
            $imagePath = $request->file('image')->store($folderName, 's3');
        }

        Service::create([
            'title'       => $validated['title'],
            'description' => $validated['description'],
            'price'       => $validated['price'],
            'image_path'  => $imagePath,
            'category'    => $validated['category'],
        ]);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'category'    => 'required|in:service,product',
        ]);

        $imagePath = $service->image_path;

        if ($request->hasFile('image')) {
            // Hapus gambar lama dari S3
            if ($service->image_path) {
                Storage::disk('s3')->delete($service->image_path);
            }
            
            // LOGIKA BARU: Tentukan folder berdasarkan kategori
            $folderName = $validated['category'] === 'product' ? 'products' : 'services';
            
            // Simpan gambar baru ke folder yang sesuai
            $imagePath = $request->file('image')->store($folderName, 's3');
        }

        $service->update([
            'title'       => $validated['title'],
            'description' => $validated['description'],
            'price'       => $validated['price'],
            'image_path'  => $imagePath,
            'category'    => $validated['category'],
        ]);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Service $service)
    {
        if ($service->image_path) {
            Storage::disk('s3')->delete($service->image_path);
        }
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}