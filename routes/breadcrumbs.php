<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
// Inicio

Breadcrumbs::for('home', function ($trail) {
$trail->push('Home', route('home'));
});

Breadcrumbs::for('proyects', function ($trail) {
$trail->parent('home', 'Servicios');
$trail->push('Droyects', route('proyects'));
});


Breadcrumbs::for('proyect.view', function ($trail, $nameProyect) {
$trail->push($nameProyect, route('proyect.view', ['name' => $nameProyect]));
});
