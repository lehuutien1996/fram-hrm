<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class HierarchyController extends Controller
{
    public function save(): JsonResponse
    {
        // TODO: Validate input data

        // TODO: Flatten data prepare for import

        // TODO: Import data

        return response()->json([
            'status' => 'OK',
        ]);
    }
}
