<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\V1\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            $categories = Category::latest()->get();
            return response()->json(["success" => true, "data" => $categories], 200);
        } catch(Exception $e)
        {
            Log::error("Get categories: ".$e->getMessage());
            return response()->json(["success" => false, "message" => "An error occured"], 500);
        }
    }
}
