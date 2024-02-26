<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SizeRequest;
use App\Models\Admin\Article;
use App\Models\Admin\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sizes.index', [
            'sizes' => Size::orderBY('name', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $size = new Size();

        return view('admin.sizes.form', [
            'size' => $size
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SizeRequest $request)
    {
        $size = Size::create($request->validated());
        return to_route('admin.sizes.index')->with('success', 'La taille a été créée avec succès');
    }

    /**
     * Display the specified resource.
     */
/*    public function show(string $id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('admin.sizes.form', [
            'size' => $size
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SizeRequest $request, Size $size)
    {
        $size->update($request->validated());
        return to_route('admin.sizes.index')->with('success', 'La taille a été modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return to_route('admin.sizes.index')->with('danger', 'La taille a été supprimée avec succès');
    }
}
