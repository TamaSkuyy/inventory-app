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

Breadcrumbs::register('master.barang.edit', function (Generator $breadcrumbs, \App\Models\Master\Barang $barang) {
    $breadcrumbs->push(__('views.admin.dashboard.title'), route('admin.dashboard'));
    $breadcrumbs->push(__('Barang'), route('master.barang'));
    $breadcrumbs->push(__('Edit "') . $barang->barangNama . '"');
});