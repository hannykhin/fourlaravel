<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

use App\Post;
use App\Cat;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chart_options = [
            'chart_title' => 'Posts by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Post',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'pie',
        ];
        $chart1 = new LaravelChart($chart_options);

        $posts=Post::all();
        $cats=Cat::all();

        
        return view('home', compact('chart1','cats','posts'));
        
    }
}
