<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List Pelamar
        </h2>
    </x-slot>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        <table class="table-fixed w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Daftar Kerja</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lamar as $row)
                    <tr>
                        <td class="border px-4 py-2">{{ $row->nama }}</td>
                        <td class="border px-4 py-2">{{ $row->kerja->nama }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>