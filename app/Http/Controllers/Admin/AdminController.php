<?php 


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Admin;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin',['only' => 'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function dashboard(){
        $user = auth()->guard('admin')->user();
        return view('pages.admin.dashboard');
        //dd($user);
    }




}