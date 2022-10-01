@extends('admin.layouts.admin')

@section('title', __('Edit "') . $barang->barangNama . '"')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['master.barang.update', $barang->barangId],'method' => 'put','class'=>'form-horizontal form-label-left']) }}

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="barangKode" >
                        {{ __('Kode Barang') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="barangKode" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('barangKode')) parsley-error @endif"
                               name="barangKode" value="{{ $barang->barangKode }}" required>
                        @if($errors->has('barangKode'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('barangKode') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="barangNama" >
                        {{ __('Nama Barang') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="barangNama" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('barangNama')) parsley-error @endif"
                               name="barangNama" value="{{ $barang->barangNama }}" required>
                        @if($errors->has('barangNama'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('barangNama') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="barangSatuan" >
                        {{ __('Satuan') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="barangSatuan" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('barangSatuan')) parsley-error @endif"
                               name="barangSatuan" value="{{ $barang->barangSatuan }}" required>
                        @if($errors->has('barangSatuan'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('barangSatuan') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="barangHarga" >
                        {{ __('Harga') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="barangHarga" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('barangHarga')) parsley-error @endif"
                               name="barangHarga" value="{{ $barang->barangHarga }}" required>
                        @if($errors->has('barangHarga'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('barangHarga') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
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