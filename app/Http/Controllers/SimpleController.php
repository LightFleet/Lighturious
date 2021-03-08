<?php


namespace App\Http\Controllers;


class SimpleController extends Controller {

    public function index()
    {
        return [
            'asdasdastest' => 'test',
            'test222'      => 'test',
            'test'         => 'test',
        ];
    }
}
