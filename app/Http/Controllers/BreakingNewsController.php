<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BreckingNews;
class BreakingNewsController extends Controller
{
    public function BreakingNews(){
        $breckingNews= BreckingNews::first();
        return view('admin.Breaking_News.Breaking_news',compact('breckingNews'));
    }

    public function UpdaHeaderNews(Request $request)
    {
        $news_id = $request->id;

    $request->validate([
        'description' => ['required', 'max:1000000']
    ]);

    BreckingNews::updateOrCreate(
        ['id' => $news_id],
        [
            'description' => $request->description,
        ]
    );

    return redirect()->back();
    }
    

    
}
