<?php

namespace App\Http\Controllers;

use App\Models\Serial;
use App\Http\Requests\StoreSerialRequest;
use App\Http\Requests\UpdateSerialRequest;
use GuzzleHttp\Middleware;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class SerialController extends Controller
{

    public function __construct()
    {
        // Middleware only applied to these methods
        $this->middleware('auth', [
            'only' => [
                'update',
                'create',
                'watch'
            ]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Serial $data)
    {
        $datas = $data->all();
        return view('serials.serial' ,compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSerialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSerialRequest $request, Serial $serial)
    {
        $data = $request->validated();

        $imagepath = request('poster')->store('serialposter', 'public');
        $image = Image::make(public_path("storage/{$imagepath}"))->fit(600 , 800);
        $image->save();

        $imageArray = ['poster'=>$imagepath];

        $coverpath = request('cover')->store('serialcover', 'public');
        $cover = Image::make(public_path("storage/{$coverpath}"))->fit(960 , 540);
        $cover->save();

        $coverArray = ['cover'=>$coverpath];

        $serial->create(array_merge(
            $data,
            $imageArray ?? [],
            $coverArray ?? []
        ));
        
        return redirect()->route('serial.create')->with('success', 'New Serial Is Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function show(Serial $serial)
    {
        $serials = Serial::all();
        return view('serials.show', compact('serial','serials'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function edit(Serial $serial)
    {
        return view('serials.edit' , compact('serial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSerialRequest  $request
     * @param  \App\Models\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSerialRequest $request, Serial $serial)
    {
        $data = $request->validated();

        if(request('poster')){
            $imagepath = request('poster')->store('serialposter', 'public');
            $image = Image::make(public_path("storage/{$imagepath}"))->fit(600 , 800);
            $image->save();
            $imageArray = ['poster'=>$imagepath];
        }

        $serial->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return back()->with('success', 'Serials Is Updated!');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serial  $serial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serial $serial)
    {
        $serial->delete();

        return redirect()->route('serial.index')->with('success', 'Serial Is Deleted!');
    }

}
