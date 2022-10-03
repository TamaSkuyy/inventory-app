@extends('admin.layouts.admin')

@section('title', 'Suplier')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-primary" href="{{ route('master.suplier.create') }}" data-toggle="tooltip" data-placement="top"">
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
                    <th>@sortablelink('supKode', __('Kode Suplier'),['page' => $supliers->currentPage()])</th>
                    <th>@sortablelink('supNama',  __('Nama Suplier'),['page' => $supliers->currentPage()])</th>
                    <th>{{ __('Alamat') }}</th>
                    <th>{{ __('No. Telpon') }}</th>
                    <th>{{ __('Created At') }}</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($supliers as $suplier)
                    <tr>
                        <td>{{ $suplier->supKode }}</td>
                        <td>{{ $suplier->supNama }}</td>
                        <td>{{ $suplier->supAlamat }}</td>
                        <td>{{ $suplier->supNoTelpon }}</td>
                        <td>{{ $suplier->created_at }}</td>
                        <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('master.suplier.show', [$suplier->supId]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('Lihat') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('master.suplier.edit', [$suplier->supId]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('Edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{ route('master.suplier.destroy', [$suplier->supId]) }}" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="{{ __('Hapus') }}">
                            <i class="fa fa-trash"></i>
                        </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pull-right">
            {{ $supliers->links() }}
        </div>
    </div>
@endsection