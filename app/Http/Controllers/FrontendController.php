<?php

namespace App\Http\Controllers;

use App\Models\Service;

class FrontendController extends Controller
{
    public function index()
    {
        $searchQuery = request('search');

        if ($searchQuery) {
            // ── MODE SEARCH: cari di semua data ──────────────────
            // Cari di kolom title dan description, tidak peduli kategori
            $searchResults = Service::where(function ($q) use ($searchQuery) {
                    $q->where('title', 'like', '%' . $searchQuery . '%')
                      ->orWhere('description', 'like', '%' . $searchQuery . '%');
                })
                ->latest()
                ->get();

            // Kirim ke view dalam mode search
            return view('welcome', [
                'searchQuery'   => $searchQuery,
                'searchResults' => $searchResults,
                'services'      => collect(), // kosong — tidak dipakai saat search
                'products'      => collect(), // kosong — tidak dipakai saat search
            ]);
        }

        // ── MODE NORMAL: tampilkan landing page penuh ────────────
        // Pisahkan services dan products berdasarkan kolom category
        $services = Service::where(function ($q) {
                // Kategori 'service' atau NULL (data lama sebelum ada kolom category)
                $q->where('category', 'service')
                  ->orWhereNull('category');
            })
            ->latest()
            ->get();

        $products = Service::where('category', 'product')
            ->latest()
            ->get();

        return view('welcome', compact('services', 'products'));
    }

    // ── Detail satu item (service atau product) ───────────────────
    public function showService(Service $service)
    {
        $related = Service::where('id', '!=', $service->id)
            ->where(function ($q) use ($service) {
                // Tampilkan related dengan kategori yang sama
                $q->where('category', $service->category ?? 'service');
            })
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.detail-service', compact('service', 'related'));
    }

    public function showProduct(Service $product) // Pakai model Service karena produk & jasa ada di tabel yang sama
{
    // Silakan sesuaikan nama file blade-nya di bawah ini
    return view('frontend.detail-product', compact('product')); 
}
}