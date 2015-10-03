@extends('layouts.master')

<!-- add the CKEditor js script file link for rich text editor use-->
<script src="//cdn.ckeditor.com/4.5.3/full/ckeditor.js"></script>

@section('pagetitle')
    Cagers Basketball - Add/Edit Articles
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
        <h3><b>Cagers Basketball - Add/Edit Article</b></h3>
        <hr />
        <form method="post" action="{{url('article/update/'.$article->id)}}" >
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="title"><b>Title</b></label>
                <input name="title" type="text" class="form-control" value="{{$article->title}}">
                <p class="help-block">This value is used for the page title.</p>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="menu_text"><b>Menu Text</b></label>
                        <input name="menu_text" type="text" class="form-control" value="{{$article->menu_text}}">
                        <p class="help-block">This value is used for the top menu.</p>
                    </div>
                    <div class="col-md-6">
                        <label for="rank"><b>Menu Rank</b></label>
                        <input name="rank" type="text" class="form-control" value="{{$article->rank}}" style="width:75px;">
                        <p class="help-block">This value is used for the top menu ordering.</p>
                    </div>
                </div>


            </div>

            <div class="form-group">
                <label for="slug"><b>Slug</b></label>
                <input name="slug" type="text" class="form-control" value="{{$article->slug}}">
                <p class="help-block">
                    This value is used for the URL lookup.<br>
                    <b>Example:</b> Entering strengthshoe would result in a URL address of (/article/strengthshoe).
                </p>
            </div>
            <div class="form-group">
                <label for="content"><b>Content</b></label>
                <button type="button" class="btn btn-info" data-container="body" data-toggle="popover" data-placement="bottom" style="margin-left:15px;"
                data-content="@foreach($mediaFiles as $media)<img src='/img/{{$media}}' width='35' height='35'>&nbsp;/img/{{$media}}<br />@endforeach">
                  View Uploaded Media Files
                </button>
                <textarea name="content" class="form-control" id="content" rows="250"><?php echo html_entity_decode($article->content); ?></textarea>
                <p class="help-block">This value is used for the main content of the page.</p>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
                <div class="col-md-10">
                    <button type="button" class="btn btn-default" onclick="location.href='{{url('article/list')}}'">Cancel</button>
                </div>
            </div>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'content' );
            </script>
        </form>
    </div>
@stop
