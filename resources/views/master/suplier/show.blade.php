@extends('admin.layouts.admin')

@section('title', __('Suplier "') . $suplier->supNama . '"')

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>

                <tr>
                    <th>{{ __('Kode Suplier') }}</th>
                    <td>{{ $suplier->supKode }}</td>
                </tr>

                <tr>
                    <th>{{ __('Nama Suplier') }}</th>
                    <td>{{ $suplier->supNama }}</td>
                </tr>

                <tr>
                    <th>{{ __('Alamat') }}</th>
                    <td>{{ $suplier->supAlamat }}</td>
                </tr>

                <tr>
                    <th>{{ __('No. Telpon') }}</th>
                    <td>{{ $suplier->supNoTelpon }}</td>
                </tr>

                <tr>
                    <th>{{ __('User') }}</th>
                    <td>{{ $suplier->created_user }}</td>
                </tr>

                <tr>
                    <th>{{ __('Created At') }}</th>
                    <td>{{ $suplier->created_at }}</td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection