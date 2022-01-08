<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Http\Resources\ProductTransactionCollection;
use App\Http\Resources\ProductTransactionResource;
use App\Models\Product;
use App\Models\ProductTransaction;
use Illuminate\Http\Request;

class ProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Product $product)
    {
        $transactions = $product->transactions()
            ->with('product:sku,id')
            ->get();
        return ProductTransactionResource::collection($transactions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * ProductTransactionResource|\Illuminate\Http\JsonResponse
     */
    public function store(TransactionRequest $request, Product $product)
    {
        $validated = $request->validated();

        if($validated["type"] == "in"){
            $product->quantity = $product->quantity + $validated["quantity"];
        }elseif($product->quantity >= $validated["quantity"]){
            $product->quantity = $product->quantity - $validated["quantity"];

        }else{
            return response()->json(["error" => "Não há estoque disponível"]);
        }
        if($product->save()){
            $transaction = $product->transactions()->create($validated);
            return new ProductTransactionResource($transaction);
        }else{
            return response()->json(["error" => "Erro ao realizar a transação!"]);
        }
    }
}
