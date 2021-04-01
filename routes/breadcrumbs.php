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


Breadcrumbs::for('proyect.view', function ($trail, $nameProyect) {
$trail->push($nameProyect, route('group.view', ['name' => $nameProyect]));
});
