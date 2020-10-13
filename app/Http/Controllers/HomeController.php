<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $content = [
  
        ];
        
        $pagecontent = view('contents.home.index', $content);

    	//masterpage
        $pagemain = array(
            'title' => 'Home',
            'menu' => 'home',
            'submenu' => '',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }
}
