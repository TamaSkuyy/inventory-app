@extends('admin.layouts.admin')

@section('title', __('Edit "') . $pelanggan->pelNama . '"')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['master.pelanggan.update', $pelanggan->pelId],'method' => 'put','class'=>'form-horizontal form-label-left']) }}

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pelKode" >
                        {{ __('Kode Pelanggan') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="pelKode" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('pelKode')) parsley-error @endif"
                               name="pelKode" value="{{ $pelanggan->pelKode }}" required>
                        @if($errors->has('pelKode'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('pelKode') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pelNama" >
                        {{ __('Nama Pelanggan') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="pelNama" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('pelNama')) parsley-error @endif"
                               name="pelNama" value="{{ $pelanggan->pelNama }}" required>
                        @if($errors->has('pelNama'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('pelNama') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pelAlamat" >
                        {{ __('Alamat') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="pelAlamat" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('pelAlamat')) parsley-error @endif"
                               name="pelAlamat" required>
                               {{ $pelanggan->pelAlamat }}
                        </textarea>
                        @if($errors->has('pelAlamat'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('pelAlamat') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pelNoTelpon" >
                        {{ __('No. Telpon') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="pelNoTelpon" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('pelNoTelpon')) parsley-error @endif"
                               name="pelNoTelpon" value="{{ $pelanggan->pelNoTelpon }}" required>
                        @if($errors->has('pelNoTelpon'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('pelNoTelpon') as $error)
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