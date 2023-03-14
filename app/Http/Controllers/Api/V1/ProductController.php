<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreProductRequest;
use App\Models\V1\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $search = $request->get('search');

            $products = Product::with(["category" => function($query) {
                $query->select("id","name");
            }])->where(function($query) use ($search) {
                $query->whereHas("category", function($q) use ($search) {
                    $q->where("name", "like", "%{$search}%");
                })->orWhere("name", "like", "%{$search}%");
            })->latest()->paginate(25);

            $products->appends(["search" => $search]);

            return response()->json(["success" => true, "data" => $products], 200);
        } catch(Exception $e)
        {
            Log::error("Get products: ".$e->getMessage());
            return response()->json(["success" => false, "message" => "An error occured"], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $category_id = $request->category_id;
            $name = $request->name;
            $description = $request->description;
            $price = $request->price;

            $product = Product::create([
                'category_id' => $category_id,
                'name' => $name,
                'description' => $description,
                'price' => $price
            ]);

            return response()->json(["status" => true, "message" => "Product with id ".$product->id." has been created successfully"], 201);
        } catch (Exception $e) {
            Log::error("Store Product: ".$e->getMessage());
            return response()->json(["success" => false, "message" => "An error occured"], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $product = Product::with(["category" => function($query) {
                $query->select("id","name");
            }])->where("id", $id)->first();

            if(!$product) {
                return response()->json(["status" => true, "message" => "Product with id ".$id." not found"], 404);
            }

            return response()->json(["success" => true, "data" => $product], 200);
        } catch (Exception $e) {
            Log::error("Get Product: ".$e->getMessage());
            return response()->json(["success" => false, "message" => "An error occured"], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        try {
            $category_id = $request->category_id;
            $name = $request->name;
            $description = $request->description;
            $price = $request->price;

            Product::where('id', $id)->update([
                'category_id' => $category_id,
                'name' => $name,
                'description' => $description,
                'price' => $price
            ]);

            return response()->json(["status" => true, "message" => "Product with id ".$id." has been updated successfully"], 200);
        } catch (Exception $e) {
            Log::error("Update Product: ".$e->getMessage());
            return response()->json(["success" => false, "message" => "An error occured"], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::where('id', $id)->first();
            if(!$product) {
                return response()->json(["status" => true, "message" => "Product with id ".$id." not found"], 404);
            }

            $product->delete();

            return response()->json(["status" => true, "message" => "Product with id ".$id." has been deleted successfully"], 200);
        } catch (Exception $e) {
            Log::error("Delete Product: ".$e->getMessage());
            return response()->json(["success" => false, "message" => "An error occured"], 500);
        }
    }
}
