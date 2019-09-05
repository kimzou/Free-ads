<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class AdSearchController extends Controller
{
    public function search()
    {
        return view('ad.search');
    }

    public function results(Request $request)
    {
        $request->validate([
            'search-name' => 'required_without_all:search-category,search-price-min,seach-price-max'
        ]);
        if ($request->filled(['search-name', 'search-category'])) {
            $ads = Ad::where([
                ['title', 'LIKE', "%{$request->input('search-name')}%"],
                'category' => $request->input('search-category')
            ])->get();
        } else if ($request->filled('search-name')) {
            $ads = Ad::where("title", "LIKE", "%{$request->input('search-name')}%")->get();
        } else if ($request->filled('search-category')) {
            $ads = Ad::where('category', $request->input('search-category'))->get();
        }
        return view('ad.results', compact('ads'));
    }

    public function order()
    {
        $ads = Ad::orderBy('created_at', 'desc')->paginate(3);
        return view('ad.index', compact('ads'));
    }
}
