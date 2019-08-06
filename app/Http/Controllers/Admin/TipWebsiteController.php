<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;   
use Intervention\Image\ImageManagerStatic as Image;

use File;
use Session;
use LaravelLocalization;


class TipWebsiteController extends Controller

{

 public function Tips_list()

 {

         
$lang_id=DB::table('languages')->where('lang',\Lang::locale())->pluck('id')->first();

 	$all_tips=DB::table('blogs')->join('blog_trans','blog_id','=','blogs.id')->where('blog_trans.lang_id',$lang_id)->get();



    return view('pages.admin.tips_website.index',compact('all_tips'));


	} 


	   public function   Tips_addpaage()
   {
return view('pages.admin.tips_website.add');
   }
 public function Tips_add(Request $request)
 {

$photo=$request->photo;
//$name=preg_replace('/\s+/', '-', strtolower($request->title));
$query=DB::table('blogs')->orderBy('created_at', 'desc')->first();

$name='blog_'.($query->id+1);


 $tipsadd = DB::table('blogs')
                              ->insertGetId([
										'active'=>$request->active, 
										'image'=>  $name.'.'.$photo->getClientOriginalExtension(), 
										'created_by' =>auth()->guard('admin')->user()->id, 

                                            ]);

 



                          if ($request->has('photo')) {
         



             $input['imagename'] = $name.'.'.$photo->getClientOriginalExtension();
      
   
        $destinationPath = public_path('website/images');
        $img = Image::make($photo->getRealPath());
        $img->resize(100, 100, function ($constraint) {
        $constraint->aspectRatio();
    })->save($destinationPath.'/'.$input['imagename']);


        $destinationPath = public_path('website/images/');
        $photo->move($destinationPath, $input['imagename']);

           
        }

        return \Redirect::route('Tips_trans',  $tipsadd );


}


public function Tips_trans( $id)

{



   $blog_data = DB::table('blogs')->where('id',$id)->first();
  

        


   return view('pages.admin.tips_website.addtranslation',compact('blog_data'));
}
public function  Tips_addtrnsaltion(Request $request)
{

$name=preg_replace('/\s+/', '-', strtolower($request->title));

	                         $tipslangadd = DB::table('blog_trans')
                              ->insert([
										'blog_id'=>$request->blog_id, 
										'title'=> $request->title,
										'content'=> $request->content,
										'lang_id'=>$request->language_id,
										'slug'=>$name,
										'active'=>$request->active, 

										'created_by' =>auth()->guard('admin')->user()->id, 

                                            ]);

                              return redirect()->back()->with('Update_Sucess', 'Language Added Succeflly');     


}



public function  Tip_delete(Request $request)


{

 


$BlogDelete = DB::table('blog_trans')->where('blog_id',$request->tip_iddelete)->where('lang_id',$request->langtip_iddelete)->delete();


    $countexp= DB::table('blog_trans')->where('blog_id',$request->tip_iddelete)->count();

if($countexp==0)


{
          $Blog = DB::table('blogs')->where('id',$request->tip_iddelete)->first();
          $pathToYourFile = public_path('website/images/'.$Blog->image);// get file path from table


          if(file_exists($pathToYourFile)) // make sure it exits inside the folder
          {
          \File::delete($pathToYourFile);
          }

   $BlogDelete =  DB::table('blogs')->where('id',$request->tip_iddelete)->delete();
}
         session::flash('deleted_success');
        return redirect()->back();
}
 

public function Tip_edit(Request $request)

{

    $blog_data=DB::table('blogs')->join('blog_trans','blog_id','=','blogs.id')->where('blog_trans.lang_id',$request->langtip_edit_id)->where('blog_id',$request->tip_edit_id)->select('*','blogs.active AS bactive','blog_trans.active AS tactive')->first();

// dd($blog_data);

    return view('pages.admin.tips_website.edit',compact('blog_data'));

}


public function Tip_editfirstform(Request $request)

{




  $photo=$request->photo;




$query=DB::table('blogs')->orderBy('created_at', 'desc')->first();

$name='blog_'.($query->id+1);


 $blog = DB::table('blogs')->where('id',$request->blog_id)
                              ->update([
                                    'active'=>$request->active,  
                                    
                                    'image'=> ($photo !='undefined') ?  $name.'.'.$photo->getClientOriginalExtension() : $request->photoinput,  ]);


                            if ($photo !='undefined') {
        

           $input['imagename'] = $name.'.'.$photo->getClientOriginalExtension();
      
   
        $destinationPath = public_path('website/images');
        $img = Image::make($photo->getRealPath());
        $img->resize(100, 100, function ($constraint) {
        $constraint->aspectRatio();
    })->save($destinationPath.'/'.$input['imagename']);


        $destinationPath = public_path('website/images/');
        $photo->move($destinationPath, $input['imagename']);

           
        }


        return \Response::json(array('success' => true));
}


public function Tip_editseconendform(Request $request)

{
  //dd($request->all());
  $name=preg_replace('/\s+/', '-', strtolower($request->title));

   $blog =DB::table('blog_trans')->where('blog_id',$request->blog_id)->where('lang_id',$request->language_id)
                              ->update([
                                    'active'=>$request->tactive, 
                                    'title'=>$request->title,  
                                    'content'=>$request->content, 
                                    'slug'   =>$name,
                                    
                                      ]);

                              return \Response::json(array('success' => true));
}
}
