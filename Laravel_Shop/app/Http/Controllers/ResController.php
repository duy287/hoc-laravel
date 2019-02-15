<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class ResController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo 'index';
        $sanpham = product::all();
        return $sanpham;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo 'store';
        $sanpham = new product;
        $sanpham->name = $request->tensp;

        if($request->hasFile('hinh')){
            $file=$request->file('hinh');
        $file->move('source/image/product',$file->getClientOriginalName('hinh'));
        $sanpham->image=$file->getClientOriginalName('hinh');
        }
        
        $sanpham->id_type = 5;
        $sanpham->description = "";
        $sanpham->unit_price = 160000;
        $sanpham->promotion_price= 0;
        $sanpham->save();

        return response($sanpham,201);//trả về json
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo 'show';
        $sanpham = product::find($id);
        return $sanpham;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // echo 'update';
        $sanpham = product::find($id);
        $sanpham->name = $request->tensp; 
        $sanpham->save();

        return response($sanpham,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo 'destroy';
        $sanpham = product::find($id);
        $sanpham->delete();

        return response($sanpham, 201); //trả về sp vừa xoá
    }
}
