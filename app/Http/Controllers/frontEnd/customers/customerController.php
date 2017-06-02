<?php
namespace App\Http\Controllers\frontEnd\customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\frontEnd\customers\Fn\main_function as fn;

class customerController extends Controller
{
    public function index()
    {
        return response()->json(fn::___FN_getDataLists());
    }

    public function store(Request $request)
    {
        $fn = new fn();
        return response()->json( $fn->___FN_store($request) );
    }

    public function show($id)
    {
        return response()->json(fn::___FN_getDataLists($id));
    }

    public function edit($id)
    {
        return response()->json(fn::___FN_getDataLists($id));
    }

    public function update(Request $request, $id)
    {
        $fn = new fn();
        return response()->json( $fn->___FN_store($request) );
    }

    public function destroy($id)
    {
        return response()->json( fn::___FN_delete($id));
    }
}
