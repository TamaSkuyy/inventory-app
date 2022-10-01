@extends('admin.layouts.admin')

@section('title', __('Barang "') . $barang->barangNama . '"')

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>

                <tr>
                    <th>{{ __('Kode Barang') }}</th>
                    <td>{{ $barang->barangKode }}</td>
                </tr>

                <tr>
                    <th>{{ __('Nama Barang') }}</th>
                    <td>{{ $barang->barangNama }}</td>
                </tr>

                <tr>
                    <th>{{ __('Satuan') }}</th>
                    <td>{{ $barang->barangSatuan }}</td>
                </tr>

                <tr>
                    <th>{{ __('Harga') }}</th>
                    <td>{{ $barang->barangHarga }}</td>
                </tr>

                <tr>
                    <th>{{ __('User') }}</th>
                    <td>{{ $barang->created_user }}</td>
                </tr>

                <tr>
                    <th>{{ __('Created At') }}</th>
                    <td>{{ $barang->created_at }}</td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection