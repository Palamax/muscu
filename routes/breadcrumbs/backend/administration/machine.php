<?php

Breadcrumbs::for('admin.administration.machine.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.administration.machines.management'), route('admin.administration.machine.index'));
});

Breadcrumbs::for('admin.administration.machine.create', function ($trail) {
    $trail->parent('admin.administration.machine.index');
    $trail->push(__('menus.backend.administration.machines.create'), route('admin.administration.machine.create'));
});

Breadcrumbs::for('admin.administration.machine.edit', function ($trail, $id) {
    $trail->parent('admin.administration.machine.index');
    $trail->push(__('menus.backend.administration.machines.edit'), route('admin.administration.machine.edit', $id));
});
