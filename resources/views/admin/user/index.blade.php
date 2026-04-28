@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">Data User</h2>

    <table class="table table-bordered bg-white">

        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($users as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('admin.user.delete',$item->id) }}"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus user ini?')">
                        Hapus
                    </a>
                </td>
            </tr>
            @empty

            <tr>
                <td colspan="5" class="text-center">Belum ada user</td>
            </tr>

            @endforelse

        </tbody>
    </table>

</div>

@endsection