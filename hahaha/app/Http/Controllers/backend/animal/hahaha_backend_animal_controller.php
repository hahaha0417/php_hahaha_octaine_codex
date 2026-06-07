<?php

namespace App\Http\Controllers\backend\animal;

use App\Http\Controllers\Controller;
use hahaha\config\hahaha_config_animal;
use Illuminate\Http\Request;
use Illuminate\View\View;

class hahaha_backend_animal_controller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function Index(Request $request): View
    {
        $type_ = (string) $request->query('type', '2');

        if (! in_array($type_, ['1', '2'], true)) {
            $type_ = '2';
        }

        $animal_config_ = hahaha_config_animal::Instance()->Initial($type_);

        return view('backend.animal', [
            'animal2_' => $animal_config_->Animal2_,
            'type_' => $type_,
        ]);
    }
}
