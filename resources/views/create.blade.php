@extends('header')

@section('content')
<div class="tabel-data">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('dataset.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">NOP SPTT</label>
                                <input type="text" class="form-control @error('nop_sppt') is-invalid @enderror" name="nop_sppt" value="{{ old('nop_sppt') }}" placeholder="Masukkan Judul Post">

                                <!-- error message untuk nop_sppt -->
                                @error('nop_sppt')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">NM WP SPTT</label>
                                <input type="text" class="form-control @error('nm_wp_sppt') is-invalid @enderror" name="nm_wp_sppt" value="{{ old('nm_wp_sppt') }}" placeholder="Masukkan Judul Post">

                                <!-- error message untuk nop_sppt -->
                                @error('nm_wp_sppt')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">JALAN OP</label>
                                <input type="text" class="form-control @error('jalan_op') is-invalid @enderror" name="jalan_op" value="{{ old('jalan_op') }}" placeholder="Masukkan Judul Post">

                                <!-- error message untuk jalan_op -->
                                @error('jalan_op')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">JALAN WP SPT</label>
                                <input type="text" class="form-control @error('nop_sppt') is-invalid @enderror" name="jln_wp_sppt" value="{{ old('jln_wp_sppt') }}" placeholder="Masukkan Judul Post">

                                <!-- error message untuk JLN_WP_SPTT -->
                                @error('JLN_WP_SPTT')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <!-- <label class="font-weight-bold">NM KELURAHAN</label> -->
                                <input type="hidden" class="form-control @error('nm_kelurahan') is-invalid @enderror" name="nm_kelurahan" value="LABUAN">

                                <!-- error message untuk nop_sppt -->
                                @error('nm_kelurahan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <!-- <label class="font-weight-bold">NM KECAMATAN</label> -->
                                <input type="hidden" class="form-control @error('nm_kecamatan') is-invalid @enderror" name="nm_kecamatan" value="SRESEH">

                                <!-- error message untuk nop_sppt -->
                                @error('nm_kecamatan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">TAHUN</label>
                                <input type="number" class="form-control @error('thn_pajak_sppt') is-invalid @enderror" name="thn_pajak_sppt" value="{{ old('thn_pajak_sppt') }}" min="2000" max="2099">

                                <!-- error message untuk nop_sppt -->
                                @error('thn_pajak_sppt')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">NILAI SPPT</label>
                                <input type="text" class="form-control @error('nilai_sppt') is-invalid @enderror" name="nilai_sppt" value="{{ old('nilai_sppt') }}" placeholder="Masukkan Judul Post">

                                <!-- error message untuk nop_sppt -->
                                @error('nilai_sppt')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endsection