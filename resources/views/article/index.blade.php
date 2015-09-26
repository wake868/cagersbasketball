@extends('layouts.master')
@section('pagetitle')
    Cagers Basketball - {{$article->title}}
@stop
@section('mainmenu')
    @foreach ($menuItems as $menuItem)
        <li <?php if ($article->menu_text == $menuItem->menu_text){echo 'class="active" style="font-weight: bold;"';}?>>
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
        <p><h3><b>{{$article->title}}</b></h3></p>
        <hr />
        <p><?php echo html_entity_decode($article->content); ?></p>
    </div>
@stop