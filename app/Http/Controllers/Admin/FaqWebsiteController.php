<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;   
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;
use File;
use Session;
use App\Faqs;
class FaqWebsiteController extends Controller
{


	public function Faqs_list()

	{
		$lang_id=DB::table('languages')->where('lang',\Lang::locale())->pluck('id')->first();

$all_faqs=Faqs::with('question')->where('lang_id',$lang_id)->first();

//dd($all_faqs);

  return view('pages.admin.faqs_website.index',compact('all_faqs'));


	}

	public function Faq_edit( Request $request)
	{
		
		$faqs_data=Faqs::with('question')->where('id',$request->faq_id)->first();

		  return view('pages.admin.faqs_website.edit',compact('faqs_data'));



	}

public function Faq_update( Request $request)
	{
	

		  $photo=$request->photo;


$name=preg_replace('![^a-z0-9]+!i', '-', strtolower($request->title));


 $faq =Faqs::where('id',$request->faq_id)
                              ->update([
										'title'=>$request->title,  
										'content'=>$request->content,
										'active'=>$request->active,  

										'image'=>(isset($photo)) ? $name.'-'.$request->faq_id.'.'.$photo->getClientOriginalExtension() : $request->imageinput,  ]);


                            if ($request->has('photo')) {
        

           $input['imagename'] = $name.'-'.$request->faq_id.'.'.$photo->getClientOriginalExtension();
      
   
        $destinationPath = public_path('images/en/faqs');
        $img = Image::make($photo->getRealPath());
        $img->resize(100, 100, function ($constraint) {
        $constraint->aspectRatio();
    })->save($destinationPath.'/'.$input['imagename']);


        $destinationPath = public_path('images/en/faqs/');
        $photo->move($destinationPath, $input['imagename']);

           
        }


          session::flash('Update_Sucess','Faq Updated Succeflly');
        return redirect()->route('Faqs_list');

	}


	public function Faq_delete( Request $request)
	{
	
	//dd($request->all());

	 	$Faq_delete = DB::table('faqs_questions')->where('id',$request->faq_iddelete)->delete();
        session::flash('deleted_success');
        return redirect()->back();

	}	


	public function QuestionFaq_add ( Request $request)
	{
		// dd($request->all());

$faqid=$request->faq_idadd;
$faqlang=$request->faq_idaddlang;

return view('pages.admin.faqs_website.addquestion',compact('faqid','faqlang'));


	}

	public function  QuestionFaq_store ( Request $request)
	{

		//dd($request->all());


		 $exhibitionadd = DB::table('faqs_questions')
                              ->insertGetId([
                      'faq_id'=>$request->faq_id,  
                      'title'=>$request->title,

                      'content'=>$request->content,
                      'lang_id'=>$request->faqlang,
                      'active'=>$request->active,
                     
                   




                      'created_by' =>auth()->guard('admin')->user()->id, 

                                            ]);

		  session::flash('questionadd_success','question added Succeflly');
        return redirect()->route('Faqs_list');

	}



	public function QuestionFaq_edit(Request $request)
	{
		//dd($request->all());

		//$faqid=$request->faq_idquestion;
	 	$Faq_question = DB::table('faqs_questions')->where('id',$request->faq_idquestion)->first();
	 	//dd($Faq_question);


return view('pages.admin.faqs_website.editquestion',compact('Faq_question'));
	}


	public function QuestionFaq_update(Request $request)
	{




		 $faq =DB::table('faqs_questions')->where('id',$request->faq_id)
                              ->update([
										'title'=>$request->title,  
										'content'=>$request->content,
										'active'=>$request->active ]);

		  session::flash('questionupdated_success','question updated Succeflly');
        return redirect()->route('Faqs_list');
	}

}
