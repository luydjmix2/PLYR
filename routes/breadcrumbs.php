<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
// Inicio

Breadcrumbs::for('dashboard', function ($trail) {
$trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for(__('proyects.name'), function ($trail) {
$trail->parent('dashboard', 'Service');
$trail->push(__('proyects.name'), route('groups'));
});

Breadcrumbs::for(__('proyects.name').'.create', function ($trail) {
$trail->parent(__('proyects.name'), 'Service');
$trail->push('Create', route('groups.create'));
});


Breadcrumbs::for('group.view', function ($trail, $nameProyect) {
$trail->push($nameProyect, route('group.view', ['namegroup' => $nameProyect]));
});

Breadcrumbs::for('group.user.edit', function ($trail, $id_group, $id, $slug) {
$trail->parent('group.view',$slug);
$trail->push('Edit', route('group.user.edit', ['id_group' => $id_group, 'id' => $id]));
});
