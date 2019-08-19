<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\News;
use App\Image;
use App\Project;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getIndex()
    {

        $projects= Project::take(8)
        ->join('users', 'projects.user_id', '=', 'users.id')
        ->join('image_projects', 'projects.id', '=', 'project_id')
        ->get();
        
        $news = News::take(8)->get();

        

        foreach($news as $post) {
            $post->image_path = str_replace('img', '', $post->image_path);
        }
    
    return view('welcome')->with(compact( 'news', 'projects'));
    }
}
