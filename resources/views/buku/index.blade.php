<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Daftar Buku</h2>
                    <a href="{{ route('buku.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Buku
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($buku->count() > 0)
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-info">
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Penulis</th>
                                            <th>Harga</th>
                                            <th>Tanggal Terbit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($buku as $item)
                                            <tr>
                                                <td>{{ ($buku->currentPage() - 1) * $buku->perPage() + $loop->iteration }}</td>
                                                <td>{{ $item->judul }}</td>
                                                <td>{{ $item->penulis }}</td>
                                                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->tgl_terbit)->format('d/m/Y') }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <form action="{{ route('buku.show', $item->id) }}"
                                                              method="GET" class="d-inline p-1">
                                                            <button type="submit" class="btn btn-success btn-sm"
                                                                    title="Lihat Detail">
                                                                <i class="bi bi-eye"></i>
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('buku.edit', $item->id) }}"
                                                              method="GET" class="d-inline p-1">
                                                            <button type="submit" class="btn btn-warning btn-sm"
                                                                    title="Edit">
                                                                <i class="bi bi-pencil"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('buku.destroy', $item->id) }}"
                                                              method="POST"
                                                              class="d-inline p-1"
                                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="btn btn-danger btn-sm"
                                                                    title="Hapus">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination - HANYA untuk Paginator -->
                    @if($buku->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $buku->links() }}
                        </div>
                    @endif

                @else
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-book" style="font-size: 3rem; color: #6c757d;"></i>
                            <h5 class="mt-3">Belum ada data buku</h5>
                            <p class="text-muted">Silakan tambah buku pertama Anda</p>
                            <a href="{{ route('buku.create') }}" class="btn btn-primary mt-2">
                                <i class="bi bi-plus-circle"></i> Tambah Buku Pertama
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
