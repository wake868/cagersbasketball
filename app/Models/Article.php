<?php namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Article extends Model
{
    protected $fillable = ['rank','slug', 'title', 'menu_text','content'];
}
