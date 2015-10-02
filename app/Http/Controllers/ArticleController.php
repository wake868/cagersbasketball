<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Redirect;


class ArticleController extends Controller{

    public function __construct()
    {
        $this->middleware('auth', ['only' => 'editArticle']);
    }

    public function index(Request $request)
    {
        /*
        $request->session()->put('key', 'test');
        $value = $request->session()->get('key');
        echo $value;
        */

        $menuItems = $this->buildMenu();
        //dd($menuItems);
        $article  = Article::where('slug', 'philosophy')->firstOrFail();
        return view('article/index', ['menuItems' => $menuItems, 'article' => $article]);
    }

    public function getArticle($id)
    {
        $menuItems = $this->buildMenu();
        $article  = Article::where('slug', $id)->firstOrFail();
        return view('article.index', ['menuItems' => $menuItems, 'article' => $article]);
    }

    public function listArticle()
    {
        $menuItems = $this->buildMenu();
        $articles  = Article::orderBy('rank', 'asc')->get();
        return view('article/article_list', ['menuItems' => $menuItems, 'articles' => $articles]);
    }

    public function editArticle(Request $request, $id)
    {
        $name = 'Mike Wakeland';
        $menuItems = $this->buildMenu();

        if ($id == 0)
        {
            $article =  new Article();
            $article->id = 0;
            $article->rank = 99;
            $article->slug = "";
            $article->title = "";
            $article->menu_text = "";
            $article->content = "";
        }
        else
        {
            $article  = Article::find($id);
        }



        if (Auth::user()->name == 'Mike Wakeland')
        {
            return view('article/edit', ['menuItems' => $menuItems, 'article' => $article]);

        }
        else
        {
            return Redirect::to('/article/'.$article->slug);
        }

    }

    public function updateArticle(Request $request, $id)
    {
        if ($id == 0)
        {
            $article = Article::create($request->all());
        }
        else
        {
            $article  = Article::find($id);
            $article->title = $request->input('title');
            $article->menu_text = $request->input('menu_text');
            $article->slug = $request->input('slug');
            $article->content = $request->input('content');
            $article->save();
        }

        return Redirect::to('/article/list');
    }
    public function getMedia()
    {
      $menuItems = $this->buildMenu();
      return view('article/media', ['menuItems' => $menuItems]);

    }
    public function uploadMedia(Request $request)
    {
      dd($request);


    }

    //*****************
    // helper functions
    //*****************
    public function buildMenu()
    {
        $menu = Article::orderBy('rank', 'asc')->get();
        return $menu;
    }

}
