@extends('admin.layouts.admin')

@section('title', 'Pelanggan')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-primary" href="{{ route('master.pelanggan.create') }}" data-toggle="tooltip" data-placement="top"">
                Tambah Data
             </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                width="100%">
                <thead>
                <tr>
                    <th>@sortablelink('supKode', __('Kode Pelanggan'),['page' => $pelanggans->currentPage()])</th>
                    <th>@sortablelink('supNama',  __('Nama Pelanggan'),['page' => $pelanggans->currentPage()])</th>
                    <th>{{ __('Alamat') }}</th>
                    <th>{{ __('No. Telpon') }}</th>
                    <th>{{ __('Created At') }}</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pelanggans as $pelanggan)
                    <tr>
                        <td>{{ $pelanggan->pelKode }}</td>
                        <td>{{ $pelanggan->pelNama }}</td>
                        <td>{{ $pelanggan->pelAlamat }}</td>
                        <td>{{ $pelanggan->pelNoTelpon }}</td>
                        <td>{{ $pelanggan->created_at }}</td>
                        <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('master.pelanggan.show', [$pelanggan->pelId]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('Lihat') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('master.pelanggan.edit', [$pelanggan->pelId]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('Edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{ route('master.pelanggan.destroy', [$pelanggan->pelId]) }}" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="{{ __('Hapus') }}">
                            <i class="fa fa-trash"></i>
                        </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pull-right">
            {{ $pelanggans->links() }}
        </div>
    </div>
@endsection