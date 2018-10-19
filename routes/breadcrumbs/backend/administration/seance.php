<?php

Breadcrumbs::for('admin.administration.seance.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.administration.seances.management'), route('admin.administration.seance.index'));
});

Breadcrumbs::for('admin.administration.seance.create', function ($trail) {
    $trail->parent('admin.administration.seance.index');
    $trail->push(__('menus.backend.administration.seances.create'), route('admin.administration.seance.create'));
});

Breadcrumbs::for('admin.administration.seance.edit', function ($trail, $id) {
    $trail->parent('admin.administration.seance.index');
    $trail->push(__('menus.backend.administration.seances.edit'), route('admin.administration.seance.edit', $id));
});

Breadcrumbs::for('admin.administration.seance.ajouterExercice', function ($trail, $id) {
    $trail->parent('admin.administration.seance.index');
    $trail->push(__('menus.backend.administration.seances.edit'), route('admin.administration.seance.edit', $id));
});