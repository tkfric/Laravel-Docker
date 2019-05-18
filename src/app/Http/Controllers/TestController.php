<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JsonDataService;

class TestController extends Controller
{
    protected $json;

    public function __construct(JsonDataService $data)
    {
        $this->json = $data;
    }

    public function index()
    {
        dd($this->json->getAll());
    }
}
