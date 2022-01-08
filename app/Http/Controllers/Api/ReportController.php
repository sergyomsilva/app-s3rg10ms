<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductTransactionCollection;
use App\Http\Resources\ProductTransactionResource;
use App\Models\ProductTransaction;

class ReportController extends Controller
{

    public function index()
    {
       return ProductTransactionResource::collection(ProductTransaction::with('product')->get());
    }
}
