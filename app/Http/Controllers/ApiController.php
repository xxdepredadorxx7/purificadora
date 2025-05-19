<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getData()
{
    $path = storage_path('app/ngrok.txt');
    $ngrokUrl = file_exists($path) ? trim(file_get_contents($path)) : null;

    return response()->json([
        'message' => 'Hola desde Laravel',
        'data' => [1, 2, 3, 4, 5],
        'ngrok_url' => $ngrokUrl
    ]);
}

}
