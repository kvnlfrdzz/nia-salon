<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-pink-600 leading-tight">
                {{ __('Kelola Showcase Produk') }}
            </h2>
            <a href="{{ route('admin.products.create') }}" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg text-sm transition">
                + Tambah Produk Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-pink-100">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-pink-100 text-pink-600">
                            <th class="py-3 px-4">Foto</th>
                            <th class="py-3 px-4">Nama Produk</th>
                            <th class="py-3 px-4">Harga</th>
                            <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr class="border-b border-gray-50 hover:bg-pink-50 transition">
                            <td class="py-3 px-4">
                                <img src="{{ asset('storage/' . $product->image_path) }}" class="w-16 h-16 object-cover rounded-md shadow-sm">
                            </td>
                            <td class="py-3 px-4 font-medium text-gray-700">{{ $product->name }}</td>
                            <td class="py-3 px-4 text-gray-600">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-500 hover:underline mr-3">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>