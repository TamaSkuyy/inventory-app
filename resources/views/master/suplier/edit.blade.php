@extends('admin.layouts.admin')

@section('title', __('Edit "') . $suplier->supNama . '"')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{ Form::open(['route'=>['master.suplier.update', $suplier->supId],'method' => 'put','class'=>'form-horizontal form-label-left']) }}

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="supKode" >
                        {{ __('Kode Suplier') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="supKode" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('supKode')) parsley-error @endif"
                               name="supKode" value="{{ $suplier->supKode }}" required>
                        @if($errors->has('supKode'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('supKode') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="supNama" >
                        {{ __('Nama Suplier') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="supNama" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('supNama')) parsley-error @endif"
                               name="supNama" value="{{ $suplier->supNama }}" required>
                        @if($errors->has('supNama'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('supNama') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="supAlamat" >
                        {{ __('Alamat') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="supAlamat" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('supAlamat')) parsley-error @endif"
                               name="supAlamat" required>
                               {{ $suplier->supAlamat }}
                        </textarea>
                        @if($errors->has('supAlamat'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('supAlamat') as $error)
                                        <li class="parsley-required">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="supNoTelpon" >
                        {{ __('No. Telpon') }}
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="supNoTelpon" type="text" class="form-control col-md-7 col-xs-12 @if($errors->has('supNoTelpon')) parsley-error @endif"
                               name="supNoTelpon" value="{{ $suplier->supNoTelpon }}" required>
                        @if($errors->has('supNoTelpon'))
                            <ul class="parsley-errors-list filled">
                                @foreach($errors->get('supNoTelpon') as $error)
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