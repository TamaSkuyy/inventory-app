@extends('admin.layouts.admin')

@section('title', 'Penerimaan')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-primary" href="{{ route('transaksi.penerimaan.create') }}" data-toggle="tooltip" data-placement="top"">
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
                    <th>@sortablelink('terimaNomor', __('Nomor'),['page' => $penerimaans->currentPage()])</th>
                    <th>@sortablelink('terimaTgl',  __('Tanggal'),['page' => $penerimaans->currentPage()])</th>
                    <th>{{ __('Suplier') }}</th>
                    <th>{{ __('Total') }}</th>
                    <th>{{ __('Created At') }}</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($penerimaans as $penerimaan)
                    <tr>
                        <td>{{ $penerimaan->terimaNomor }}</td>
                        <td>{{ $penerimaan->terimaTgl }}</td>
                        <td>{{ $penerimaan->supNama }}</td>
                        <td>{{ "Rp " . number_format($penerimaan->terimaTotal,2) }}</td>
                        <td>{{ $penerimaan->created_at }}</td>
                        <td>
                            <a href="{{ route('transaksi.penerimaan.destroy', [$penerimaan->terimaId]) }}" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="{{ __('Hapus') }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pull-right">
            {{ $penerimaans->links() }}
        </div>
    </div>
@endsection