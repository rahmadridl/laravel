<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Kerja</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <table class="table-fixed w-full">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2" colspan="2">Pekerjaan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kerja as $row)
                <tr>
                    <td class="border px-4 py-2">{{ $row->nama }}</td>
                    <td class="border px-4 py-2"><a href="/daftar/{{ $row->id }}" class="text-xl font-bold text-blue-500">Daftar</a></td>
                </tr>
            @empty
                <tr>
                    <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>