<?php

Breadcrumbs::for('admin.administration.exercice.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.administration.exercices.management'), route('admin.administration.exercice.index'));
});

Breadcrumbs::for('admin.administration.exercice.create', function ($trail) {
    $trail->parent('admin.administration.exercice.index');
    $trail->push(__('menus.backend.administration.exercices.create'), route('admin.administration.exercice.create'));
});

Breadcrumbs::for('admin.administration.exercice.edit', function ($trail, $id) {
    $trail->parent('admin.administration.exercice.index');
    $trail->push(__('menus.backend.administration.exercices.edit'), route('admin.administration.exercice.edit', $id));
});
