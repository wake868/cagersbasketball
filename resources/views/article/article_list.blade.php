@extends('layouts.master')
@section('pagetitle')
    Cagers Basketball - Add/Edit Articles
@stop
@section('mainmenu')
    @foreach ($menuItems as $menuItem)
        <li>
            <a href="{{url('Article/'.$menuItem->slug)}}">{{$menuItem->menu_text}}</a>
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
        <h3><b>Cagers Basketball - Add/Edit Articles</b></h3>
        <hr />
        <ul class="list-group">
            @foreach($articles as $article)
                <a href="{{url('article/edit/'.$article->id)}}">
                    <li id="" class="list-group-item">
                        <span class="badge">Order: {{$article->rank}}</span>
                        {{$article->title}}
                    </li>
                </a>
            @endforeach
        </ul><br>
        <button type="button" class="btn btn-primary" onclick="location.href='{{url('article/edit/0')}}'">Add New</button>
    </div>
    
@stop