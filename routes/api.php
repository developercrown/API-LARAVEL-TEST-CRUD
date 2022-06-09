<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('test')->group(function(){

    Route::get("/", function(){
        return response()->json((object) array('status' => "Welcome to root"), 200);
    });

    //Crud routes
    Route::get("{pass}", function ($pass) {
        if($pass == '10650149'){
            return response()->json((object) array( "status" => "pong $pass" ), 200);
        }
        return response()->json((object) array( "status" => "no-pong" ), 401);
    })->name('root.ping');

    Route::post("", function (Request $request) {
        $message = "NO-DATA";
        if(isset($request['message'])){
            $message = $request->input('message');
        }
        return response()->json((object) array( "status" => "Welcome POST: $message" ), 200);
    })->name('root.ping');

    Route::put("{id}", function (Request $request, $id) {
        $message = "NO-DATA";
        if(isset($request['message'])){
            $message = $request->input('message');
        }
        return response()->json((object) array( "status" => "Welcome PUT TO $id: $message" ), 200);
    })->name('root.ping');

    Route::patch("{id}", function (Request $request, $id) {
        $message = "NO-DATA";
        if(isset($request['message'])){
            $message = $request->input('message');
        }
        return response()->json((object) array( "status" => "Welcome PATCH TO $id: $message" ), 200);
    })->name('root.ping');

    Route::delete("{id}", function ($id) {
        return response()->json((object) array( "status" => "Welcome DELETE TO $id" ), 200);
    })->name('root.ping');


});
