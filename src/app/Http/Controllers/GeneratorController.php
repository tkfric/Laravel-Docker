<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GenerateService;

class GeneratorController extends Controller
{
    protected $service;

    public function __construct(GenerateServise $service)
    {
        $this->service = $service;
    } 

    public function execute(Request $request)
    {
        $validatedKeywords = $request->validate([
            'person' => 'required|max:30',
            'place' => 'required|max:30',
            'time' => 'required|max:30',
        ]);
        $generatedData = $this->service->execute($request->all());

        return view('complete', $generatedData);
    }
}
