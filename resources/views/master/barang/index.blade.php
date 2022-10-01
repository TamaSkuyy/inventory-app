@extends('admin.layouts.admin')

@section('title', __('Barang'))

@section('content')
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>@sortablelink('barangKode', __('Kode Barang'),['page' => $barangs->currentPage()])</th>
                <th>@sortablelink('barangNama',  __('Nama Barang'),['page' => $barangs->currentPage()])</th>
                <th>{{ __('Barang Satuan') }}</th>
                <th>{{ __('Barang Harga') }}</th>
                <th>{{ __('Created At') }}</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($barangs as $barang)
                <tr>
                    <td>{{ $barang->barangKode }}</td>
                    <td>{{ $barang->barangNama }}</td>
                    <td>{{ $barang->barangSatuan }}</td>
                    <td>{{ $barang->barangHarga }}</td>
                    <td>{{ $barang->created_at }}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ $barangs->links() }}
        </div>
    </div>
@endsection