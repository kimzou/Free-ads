<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class AdController extends Controller
{
    public function myAds(Request $request)
    {
        $ads = Ad::all()->where('user_id', $request->user()->id);
        return view('ad.myAds', compact('ads'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ads = Ad::orderBy('title')->paginate(3);
        return view('ad.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:2|max:30|string',
            'desc' => 'required|min:2|max:255|string',
            'price' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $ad = new Ad;
        if (isset($request->user()->id)) {
            $ad->user_id = $request->user()->id;
        }
        $ad->title = $request->input('title');
        $ad->desc = $request->input('desc');
        $ad->price = $request->input('price');
        $image = $request->file('image');
        $name = time() .  '_' . $image->getClientOriginalName();
        $image->move(public_path() . '/images//', $name);
        $ad->image = $name;
        if ($request->has('category')) {
            $ad->category = $request->input('category');
        }
        $ad->save();

        return redirect()->route('ad.show', $ad->id)->with('success', 'Ad added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::find($id);

        return view('ad.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::find($id);
        return view('ad.edit', compact('ad'));
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
        $data = $request->validate([
            'title' => 'required|string|min:2|max:255',
            'desc' => 'required|string|min:2|max:255',
            'price' => 'required|integer',
            'image[]' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        foreach ($request->file('image') as $image) {
            $name = time() .  '_' . $image->getClientOriginalName();
            $image->move(public_path() . '/images//', $name);
            $data['image'] = $name;
        }
        Ad::find($id)->update($data);
        return redirect()->route('ad.show', $id)->with('success', 'Ad updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ad::find($id)->delete();
        return redirect('ad')->with('success', 'Ad deleted');
    }
}
