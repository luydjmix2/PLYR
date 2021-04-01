<?php

use App\Models\User;

function setActiveRoute($name) {
    return request()->routeIs($name) ? 'active' : '';
}

function setOpenRoute($name) {
    if (request()->routeIs($name) == $name) {
        return request()->routeIs($name) ? 'open' : '';
    } else {
        return request()->routeIs($name) ? 'active' : '';
    }
}

function dataUser($id) {
    $user = User::where('id', $id)->get()->toArray();
    return $user;
}

function dataUserName($id) {
    $user = User::where('id', $id)->get()->toArray();
    return $user[0]['name'];
}
