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
        $this->middleware('auth', ['only' => 'editArticle', 'only' => 'getMedia']);
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
        $mediaFiles = array();

        //get list of available media files
        if ($handle = opendir("/home/forge/default/public/img/"))
        {

          /* This is the correct way to loop over the directory. */
          while (false !== ($entry = readdir($handle))) {
            if (strpos($entry,'.png') !== false||strpos($entry,'.jpg') !== false||strpos($entry,'.jpeg') !== false||strpos($entry,'.pdf') !== false)
            {
              $mediaFiles[] = $entry;
            }

          }

          closedir($handle);
        }

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
            return view('article/edit', ['menuItems' => $menuItems, 'article' => $article, 'mediaFiles' => $mediaFiles]);
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
      if (Auth::user()->name == 'Mike Wakeland')
      {
        $menuItems = $this->buildMenu();
        return view('article/media', ['menuItems' => $menuItems]);
      }
      else
      {
        echo "You do not have permission to upload files on this server!";
      }

    }
    public function uploadMedia()
    {
      if (Auth::user()->name == 'Mike Wakeland')
      {

        if(isset($_FILES['image'])){
          $errors= array();
          $file_name = $_FILES['image']['name'];
          $file_size =$_FILES['image']['size'];
          $file_tmp =$_FILES['image']['tmp_name'];
          $file_type=$_FILES['image']['type'];
          $file_ext = explode(".", $_FILES['image']['name']);

          if($file_ext[1] == 'jpg'||$file_ext[1] == 'jpeg'||$file_ext[1] == 'png'||$file_ext[1] == 'pdf')
          {
            if($file_size > 2097152)
            {
              $errors[]='File size must be excately 2 MB';
            }

            if(empty($errors)==true)
            {
              move_uploaded_file($file_tmp, "/home/forge/default/public/img/" . $file_name);
              echo 'Success.<br /><br />File URL: /img/'.$file_name.'<br /><br /><a href="/article/media">Back</a>';
            }
            else
            {
              print_r($errors);
            }
          }
          else
          {
            echo 'Invalid file type.<br /></br>Only jpg, jpeg, png and pdf files are allowed.<br /><br /><a href="/article/media">Back</a>';
          }
        }
      }
      else
      {
        echo "You do not have permission to upload files on this server!";
      }
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
