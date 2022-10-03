@extends('admin.layouts.admin')

@section('title', __('Tambah Data'))

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['master.barang.store'],'method' => 'post','files' => true,'class'=>'form-horizontal form-label-left']) }}

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="barangKode" > 
                        {{ __('Kode Barang') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="barangKode" type="text" class="form-control col-md-7 col-xs-12 "
                               name="barangKode" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="barangNama" >
                        {{ __('Nama Barang') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="barangNama" type="text" class="form-control col-md-7 col-xs-12"
                               name="barangNama" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="barangSatuan" >
                        {{ __('Satuan') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="barangSatuan" type="text" class="form-control col-md-7 col-xs-12"
                               name="barangSatuan" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="barangHarga" >
                        {{ __('Harga') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="barangHarga" type="text" class="form-control col-md-7 col-xs-12"
                               name="barangHarga" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="barangImg" >
                        {{ __('Gambar') }}
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="barangImg" placeholder="Pilih Gambar" id="barangImg">
                        @error('barangImg')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('Batal') }}</a>
                        <button type="submit" class="btn btn-success"> {{ __('Simpan') }}</button>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/users/edit.css')) }}
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/users/edit.js')) }}
@endsection