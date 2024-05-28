<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Latestnews;


class LatestnewsController extends Controller
{

    public function updatenews(Request $request)
    {
         $news = new latestnews;
 
     if ($request->hasFile('image')) {
         $image = $request->file('image');
         
         $imageName = time() . '.' . $image->getClientOriginalExtension();
         
         $image->move('newsimage', $imageName);
         
         $news->image = $imageName;
     }
 
        $news->title = $request->title;
        $news->description = $request->description;
        $news->link = $request->link;

        $news->save();

        $news = latestnews::all();
        return view('admin.latestnews',compact('news'));

   }

    public function latestnews()
    {
        $news = latestnews::all();
        return view('admin.latestnews',compact('news'));
    }

    public function deletenews($id)
    {
        $news = latestnews::find($id);

       if ($news) {
          $news->delete();
         }

        $news = latestnews::all();
        return view('admin.latestnews',compact('news'));


    }

}
