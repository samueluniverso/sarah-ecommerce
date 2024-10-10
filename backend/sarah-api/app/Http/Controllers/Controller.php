<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class Controller
{
    abstract public function softDelete(Request $request); // PATCH (verbo)
    abstract public function delete(Request $request);
    abstract public function store(Request $request);
    abstract public function update(Request $request);
    abstract public function get(Request $request);
    abstract public function list(Request $request);
}
