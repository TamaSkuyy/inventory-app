@extends('admin.layouts.admin')

@section('title', __('Pelanggan "') . $pelanggan->pelNama . '"')

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>

                <tr>
                    <th>{{ __('Kode Pelanggan') }}</th>
                    <td>{{ $pelanggan->pelKode }}</td>
                </tr>

                <tr>
                    <th>{{ __('Nama Pelanggan') }}</th>
                    <td>{{ $pelanggan->pelNama }}</td>
                </tr>

                <tr>
                    <th>{{ __('Alamat') }}</th>
                    <td>{{ $pelanggan->pelAlamat }}</td>
                </tr>

                <tr>
                    <th>{{ __('No. Telpon') }}</th>
                    <td>{{ $pelanggan->pelNoTelpon }}</td>
                </tr>

                <tr>
                    <th>{{ __('User') }}</th>
                    <td>{{ $pelanggan->created_user }}</td>
                </tr>

                <tr>
                    <th>{{ __('Created At') }}</th>
                    <td>{{ $pelanggan->created_at }}</td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection