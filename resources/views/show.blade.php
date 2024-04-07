@extends('header')
@section('content')
<div class="tabel-1" style="padding: 10rem 35rem;">
    <table class="table" style="width: 70%;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Detail</th>
                <th scope="col">Data</th>
                <!-- <th scope="col">Nama KECAMATAN</th>
                <th scope="col">Nama Kelurahan</th>
                <th scope="col">Tahun Pajak</th>
                <th scope="col">Nilai SPPT</th> -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>No</td>
                <td>{{$data->nop_sppt }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>{{$data->nm_wp_sppt }}</td>
            </tr>
            <tr>
                <td>Jalan</td>
                <td>{{$data->jalan_op }}</td>
            </tr>
            <tr>
                <td>Kelurahan</td>
                <td>{{$data->nm_kelurahan }}</td>
            </tr>

            <tr>
                <td>Kecamatan</td>
                <td>{{$data->nm_kecamatan }}</td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>{{$data->thn_pajak_sppt }}</td>
            </tr>
            <tr>
                <td>Nilai</td>
                <td>{{$data->nilai_sppt }}</td>
            </tr>
            <a class="btn btn-default" href="{!! url('/pdf', $data->id) !!}" target="_blank"><i class="fa fa-print"></i> Cetak PDF</>
        </tbody>
    </table>
</div>
@endsection