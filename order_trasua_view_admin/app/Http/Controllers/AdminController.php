<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;

class AdminController extends Controller
{
    public function getallProduct()
    {
        $response = Http::get("http://127.0.0.1:8000/api/topping_list");
        dd($response);
    }
}
