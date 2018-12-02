<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LinksController extends Controller
{
    public function getLinks($uri)
    {
        return $uri;
    }
}
