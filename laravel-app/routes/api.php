<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KubernetesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test-api', function () {
    return response()->json(['message' => 'Hello from API']);
});
// get all users
Route::get('/get-users', [UserController::class, 'index']);
// get pod by name
Route::get('/pod/{name}', [KubernetesController::class, 'getPodByName']);
// get all pods
Route::get('/pods', [KubernetesController::class, 'getAllPod']);
// get all namespace
Route::get('/namespace', [KubernetesController::class, 'getAllNamespace']);
Route::get('/pod-logs/{podName}', [KubernetesController::class, 'getPodLogs']);
Route::get('/pod-detail/{podName}', [KubernetesController::class, 'getPodDetail']);
Route::get('/services', [KubernetesController::class, 'getAllService']);
Route::get('/deployments', [KubernetesController::class, 'getAllDeployment']);