<?php

use App\Http\Controllers\LinksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/users/{username}', function ($username) {
    $client = new \GuzzleHttp\Client();
    $res = $client->request('GET', "https://api.github.com/users/$username");

    $data =json_decode($res->getBody(), true);
    return $data;
});

Route::get('/starwars/{page}', function ($page) {
    $client = new \GuzzleHttp\Client();
    $res = $client->get('https://swapi.co/api/people/'.$page);
    $data = json_decode($res->getBody(), true);
    return view('starwars', compact('data'));
});


Route::get('/links', function () {
    $pinboard_auth_token = '?auth_token=' . env('PINBOARD_API_TOKEN');
    $client = new \GuzzleHttp\Client();
    $res = $client->get("https://api.pinboard.in/v1/posts/all$pinboard_auth_token");
    $rawContent = $res->getBody()->getContents();
    $data = new SimpleXMLElement($rawContent);

    return view('links', compact('data'));
});
