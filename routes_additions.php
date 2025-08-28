<?php
$routes->get('/', 'Alumnos::index');

// ALUMNOS
$routes->get('alumnos', 'Alumnos::index');
$routes->get('alumnos/asignar/(:num)', 'Alumnos::asignar/$1');
$routes->post('alumnos/guardar-asignacion/(:num)', 'Alumnos::guardarAsignacion/$1');
$routes->get('alumnos/ver-cursos/(:num)', 'Alumnos::verCursos/$1');

// CURSOS
$routes->get('cursos', 'Cursos::index');
$routes->get('cursos/create', 'Cursos::create');
$routes->post('cursos/store', 'Cursos::store');
$routes->get('cursos/edit/(:num)', 'Cursos::edit/$1');
$routes->post('cursos/update/(:num)', 'Cursos::update/$1');
$routes->get('cursos/delete/(:num)', 'Cursos::delete/$1');
