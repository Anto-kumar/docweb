@extends('layouts.app')
@section('contents')

<h2 style="color: #FF0000;">Update News</h2>
<form action="{{url('admin/update_news')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="description">News Link:</label>
        <textarea name="link" id="link" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" class="form-control" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    <br>
    <hr>
    <h2 style="color: #FF0000;"><u>All News :</u></h2>

    <div style="text-align: center;">
        <table style="border-collapse: collapse; width: 100%; background-color: #f2f2f2; border-radius: 5px;">
            <tr style="background-color: skyblue;">
                <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Title</th>
                <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Description</th>
                <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Link</th>
                <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Image</th>
                <th style="border: 2px solid black; padding: 8px; background-color: #333; color: white;">Delete</th>
            </tr>

            @foreach($news as $item)
            <tr>
                <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{ $item->title }}</td>
                <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$item->description}}</td>
                <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;">{{$item->link}}</td>
                <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;"><img src="/newsimage/{{$item->image}}" style="width: 100px; height: 100px; border-radius: 50%;"></td>
                <td style="border: 1px solid black; padding: 8px; background-color: #f9f9f9;"><a class="btn btn-danger" onclick="return confirm('Are you sure to delete the doctor from website database')" href="{{url('admin/delete_news',$item->id)}}">Delete</a></td> 

            </tr>
            @endforeach

        </table>
    </div>
<div style="height: 100px;"></div>
@endsection