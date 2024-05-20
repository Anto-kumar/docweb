<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Latestnews;


class LatestnewsController extends Controller
{
    public function updatenews(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
            'image' => 'nullable|image' 
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        Latestnews::create($formFields);

        $news = latestnews::all();

        return view('admin.latestnews',compact('news'));
    }

    public function latestnews()
    {
        return view('admin.latestnews');
    }

    public function deletenews($id)
    {
        $news = latestnews::find($id);

      if ($news) {
          $news->delete();
       }

        
        return view('admin.latestnews');
    }

}
