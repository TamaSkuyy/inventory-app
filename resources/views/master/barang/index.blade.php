@extends('admin.layouts.admin')

@section('title', 'Barang')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
                Tambah Data
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
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
                        <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('master.barang.show', [$barang->barangId]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('Lihat') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('master.barang.edit', [$barang->barangId]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('Edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="{{ __('Hapus') }}">
                            <i class="fa fa-trash"></i>
                        </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pull-right">
            {{ $barangs->links() }}
        </div>
    </div>
@endsection