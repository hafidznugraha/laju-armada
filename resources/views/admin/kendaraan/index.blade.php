@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Data Kendaraan</h2>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            + Tambah Kendaraan
        </button>
    </div>

    <table class="table table-bordered bg-white">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Merk</th>
                <th>Foto</th>
                <th>Harga</th>
                <th>Status</th>
                <th width="170">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($vehicles as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->merk }}</td>

                <td>
                    @if($item->foto)
                    <img src="{{ asset('storage/'.$item->foto) }}" width="80" height="60" style="object-fit:cover;">
                    @else
                    Tidak ada foto
                    @endif
                </td>

                <td>Rp {{ number_format($item->harga,0,',','.') }}</td>
                <td>
                    @if($item->status == 'Tersedia')
                    <span class="badge bg-success">Tersedia</span>
                    @else
                    <span class="badge bg-danger">Disewa</span>
                    @endif
                </td>

                <td>
                    <button class="btn btn-warning btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#edit{{ $item->id }}">
                        Edit
                    </button>

                    <button class="btn btn-danger btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#hapus{{ $item->id }}">
                        Hapus
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data kendaraan</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>


<!-- ===================== MODAL TAMBAH ===================== -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('admin.kendaraan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kendaraan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Merk</label>
                        <input type="text" name="merk" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Disewa">Disewa</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Foto Kendaraan</label>
                        <input type="file" name="foto" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control"></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-success">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>


<!-- ===================== MODAL EDIT ===================== -->
@foreach($vehicles as $item)
<div class="modal fade" id="edit{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('admin.kendaraan.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">Edit Kendaraan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $item->nama }}">
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control" value="{{ $item->kategori }}">
                    </div>

                    <div class="mb-3">
                        <label>Merk</label>
                        <input type="text" name="merk" class="form-control" value="{{ $item->merk }}">
                    </div>

                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" value="{{ $item->harga }}">
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="Tersedia" {{ $item->status == 'Tersedia' ? 'selected' : '' }}>
                                Tersedia
                            </option>

                            <option value="Disewa" {{ $item->status == 'Disewa' ? 'selected' : '' }}>
                                Disewa
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Ganti Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control">{{ $item->deskripsi }}</textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-success">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endforeach

@foreach($vehicles as $item)
<div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Yakin ingin menghapus kendaraan:

                <b>{{ $item->nama }}</b> ?
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    Batal
                </button>

                <a href="{{ route('admin.kendaraan.delete', $item->id) }}"
                    class="btn btn-danger">
                    Ya, Hapus
                </a>
            </div>

        </div>
    </div>
</div>
@endforeach

@endsection