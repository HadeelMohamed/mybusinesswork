<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use LaravelLocalization;

class BlogsController extends Controller
{
    public function blogs(){
    	// list all blogs
    	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    	$blogs = DB::table('blog_trans')->where('active',1)->where('lang_id',$curr_lang->id)->get();
        $blogs = DB::select('
                              SELECT blog_trans.slug,
                              blog_trans.lang_id,
                              blog_trans.content,
                              blog_trans.title,
                              blog_trans.blog_id,
                              blogs.created_at,
                              blogs.image,
                              blog_trans.active
                              FROM blog_trans blog_trans
                              INNER JOIN blogs blogs
                              ON (blog_trans.blog_id = blogs.id)
                              WHERE (blog_trans.active = 1) AND (blog_trans.lang_id = '.$curr_lang->id.')
                              
            ');
    	return view('pages.website.blogs')
    	->with('blogs',$blogs);
    }

    public function blog($slug){
    	// list all blogs
    	$curr_lang = DB::table('languages')->where('lang',LaravelLocalization::getCurrentLocale())->first();
    	// $blog = DB::table('blog_trans')->where('slug',$slug)->where('lang_id',$curr_lang->id)->get();
        $blog = DB::select('
                                  SELECT blog_trans.slug,
                                  blog_trans.lang_id,
                                  blog_trans.content,
                                  blog_trans.title,
                                  blog_trans.blog_id,
                                  blogs.created_at,
                                  blogs.image,
                                  blog_trans.active
                                  FROM blog_trans blog_trans
                                  INNER JOIN blogs blogs
                                  ON (blog_trans.blog_id = blogs.id)
                                  WHERE (blog_trans.active = 1) AND (blog_trans.lang_id = '.$curr_lang->id.')
                                  AND(blog_trans.slug = "'.$slug.'")
                              ');
        if(count($blog) > 0){
            return view('pages.website.blog')->with('blog',$blog);
        }else{
            return view('pages.website.blog');
        }

    }
}
