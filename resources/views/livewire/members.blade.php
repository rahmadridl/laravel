<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Produk</h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <button wire:click="create()" class="btn btn-success btn-block">Tambah Produk</button>
            
            @if($isModal)
                @include('livewire.create')
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $row)
                        <tr>
                            <td class="border px-4 py-2">{{ $row->name }}</td>
                            <td class="border px-4 py-2">{{ $row->price }}</td>
                            @can('user_access')
                                <td class="border px-4 py-2">
                                    <button wire:click="edit({{ $row->id }})" class="btn btn-success btn-block">Edit</button>
                                    <button wire:click="delete({{ $row->id }})" class="btn btn-success btn-block">Hapus</button>
                                </td>
                            @endcan
                            @can('task_access')
                                <td class="border px-4 py-2">
                                    <button wire:click="addToCart({{ $row->id }})" class="btn btn-success btn-block">Add</button>
                                </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>