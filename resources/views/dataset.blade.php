@extends('header')
@section('content')
<div class="halaman">
    <div class="container mt-5">

        <form class="form" method="get" action="{{ route('search') }}" style="padding-left: 10rem;">
            <div class="form-group w-100 mb-3">
                <!-- <label for="search" class="d-block mr-2">Pencarian</label> -->
                <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
                <button type="submit" class="btn btn-primary mb-1">Cari</button>
            </div>
        </form>

        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NO SPTT</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tahun Pajak</th>
                                    <th scope="col">Nilai SPTT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($datas as $data)
                                <tr>
                                    <td>{{$data->nop_sppt}}</td>
                                    <td>{{$data->nm_wp_sppt }}</td>
                                    <td>{{$data->thn_pajak_sppt}}</td>
                                    <td>{{$data->nilai_sppt}}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dataset.destroy', $data->nop_sppt) }}" method="POST">
                                            <a href="{{ route('dataset.show', $data->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>

                                @empty
                                <div class="alert alert-danger">
                                    Data Post belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $datas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection