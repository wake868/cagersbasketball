@extends('layouts.master')
@section('pagetitle')
    Cagers Basketball - Media Upload
@stop
@section('mainmenu')
    @foreach ($menuItems as $menuItem)
        <li>
            <a href="{{url('article/'.$menuItem->slug)}}">{{$menuItem->menu_text}}</a>
        </li>
    @endforeach
@stop

@section('content')
    <!--
    ***col-md-3 defined in master***
    <div class="col-md-3">
       <img src="{{url('img/logo.png')}}" class="img-responsive" alt="Cagers Logo">
    </div>
    -->
    <div class="col-md-9">
        <p><h3><b>Media Upload</b></h3></p>
        <br /><br />
        <form class="" action="{{url('article/uploadMedia')}}" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
              <label for="title"><b>Select File To Upload</b></label>
              <input type="file" name="image">
              <br/><br />
              <button type="submit" class="btn btn-success">Upload File</button>
          </div>

        </form>
    </div>
@stop
