<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator  as Generator;

Breadcrumbs::register('admin.users', function (Generator $breadcrumbs) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('views.admin.users.index.title'));
});

Breadcrumbs::register('admin.users.show', function (Generator $breadcrumbs, \App\Models\Auth\User\User $user) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('views.admin.users.index.title'), route('admin.users'));
    $breadcrumbs->push(__('views.admin.users.show.title', ['name' => $user->name]));
});


Breadcrumbs::register('admin.users.edit', function (Generator $breadcrumbs, \App\Models\Auth\User\User $user) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('views.admin.users.index.title'), route('admin.users'));
    $breadcrumbs->push(__('views.admin.users.edit.title', ['name' => $user->name]));
});

//master
//-barang
Breadcrumbs::register('master.barang', function (Generator $breadcrumbs) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Barang'));
});

Breadcrumbs::register('master.barang.show', function (Generator $breadcrumbs, \App\Models\Master\Barang $barang) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Barang'), route('master.barang'));
    $breadcrumbs->push(__('Barang "') . $barang->barangNama . '"');
});

Breadcrumbs::register('master.barang.create', function (Generator $breadcrumbs) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Barang'), route('master.barang'));
    $breadcrumbs->push(__('Tambah Data'));
});

Breadcrumbs::register('master.barang.edit', function (Generator $breadcrumbs, \App\Models\Master\Barang $barang) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Barang'), route('master.barang'));
    $breadcrumbs->push(__('Edit "') . $barang->barangNama . '"');
});

//-suplier
Breadcrumbs::register('master.suplier', function (Generator $breadcrumbs) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Suplier'));
});

Breadcrumbs::register('master.suplier.show', function (Generator $breadcrumbs, \App\Models\Master\Suplier $suplier) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Suplier'), route('master.suplier'));
    $breadcrumbs->push(__('Suplier "') . $suplier->supNama . '"');
});

Breadcrumbs::register('master.suplier.create', function (Generator $breadcrumbs) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Suplier'), route('master.suplier'));
    $breadcrumbs->push(__('Tambah Data'));
});

Breadcrumbs::register('master.suplier.edit', function (Generator $breadcrumbs, \App\Models\Master\Suplier $suplier) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Suplier'), route('master.suplier'));
    $breadcrumbs->push(__('Edit "') . $suplier->supNama . '"');
});

//-pelangan
Breadcrumbs::register('master.pelanggan', function (Generator $breadcrumbs) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Pelanggan'));
});

Breadcrumbs::register('master.pelanggan.show', function (Generator $breadcrumbs, \App\Models\Master\Pelanggan $pelanggan) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Pelanggan'), route('master.pelanggan'));
    $breadcrumbs->push(__('Pelanggan "') . $pelanggan->pelNama . '"');
});

Breadcrumbs::register('master.pelanggan.create', function (Generator $breadcrumbs) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Pelanggan'), route('master.pelanggan'));
    $breadcrumbs->push(__('Tambah Data'));
});

Breadcrumbs::register('master.pelanggan.edit', function (Generator $breadcrumbs, \App\Models\Master\Pelanggan $pelanggan) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Pelanggan'), route('master.pelanggan'));
    $breadcrumbs->push(__('Edit "') . $pelanggan->pelNama . '"');
});
//

//transaksi
//-penerimaan
Breadcrumbs::register('transaksi.penerimaan', function (Generator $breadcrumbs) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Penerimaan'));
});

Breadcrumbs::register('transaksi.penerimaan.show', function (Generator $breadcrumbs, \App\Models\Transaksi\Penerimaan $penerimaan) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Penerimaan'), route('transaksi.penerimaan'));
    $breadcrumbs->push(__('Penerimaan "') . $penerimaan->terimaNomor . '"');
});

Breadcrumbs::register('transaksi.penerimaan.create', function (Generator $breadcrumbs) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Penerimaan'), route('transaksi.penerimaan'));
    $breadcrumbs->push(__('Tambah Data'));
});

Breadcrumbs::register('transaksi.penerimaan.edit', function (Generator $breadcrumbs, \App\Models\Transaksi\Penerimaan $penerimaan) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Penerimaan'), route('transaksi.penerimaan'));
    $breadcrumbs->push(__('Edit "') . $penerimaan->terimaNomor . '"');
});