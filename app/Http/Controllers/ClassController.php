<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\SubClass;
class ClassController extends Controller
{
    public function index()
    {
        $content = [
            'classes' => Classes::all()
        ];
        
        $pagecontent = view('contents.class.index', $content);

    	//masterpage
        $pagemain = array(
            'title' => 'Class',
            'menu' => 'class',
            'submenu' => '',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function create_page()
    {
        $content = [
  
        ];
        
        $pagecontent = view('contents.class.create', $content);

    	//masterpage
        $pagemain = array(
            'title' => 'Class',
            'menu' => 'class',
            'submenu' => '',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function create_save(Request $request)
    {
        // return $request->all();

        $request->validate([
            'name' => 'required',
            'tutor' => 'required',
            'description' => 'required',
            'images' => 'required|file|mimes:jpg,jpeg,png|max:50000',
            'demo' => 'required|file|mimes:mp4|max:100000',
        ]);
        
        if($request->hasFile('images')){
            $file = $request->file('images');
            $filename = time()."_".$file->getClientOriginalName();
            $destinasi = env('CDN_PATH').'/class/image/'; 
            $file->move($destinasi, $filename);
        }

        if($request->hasFile('demo')){
            $demo = $request->file('demo');
            $demo_file = time()."_".$demo->getClientOriginalName();
            $destinasi = env('CDN_PATH').'/class/video/'; 
            $demo->move($destinasi, $demo_file);
        }

        $save_class = new Classes;
        $save_class->idcategories = 1;
        $save_class->name = $request->name;
        $save_class->name = $request->tutor;
        $save_class->description = $request->description;
        $save_class->images = $filename;
        $save_class->demo = $demo_file;
        $save_class->save();

        return redirect('class/detail/'.$save_class->idclass);

    }

    public function class_detail(Classes $class)
    {
        $classes = Classes::with([
                        'subclass'
                        ])
                        ->where('idclass',$class->idclass)
                        ->first();
        $content = [
            'classes' => $classes,
            'class' => $class
        ];
        
        $pagecontent = view('contents.class.detail', $content);

    	//masterpage
        $pagemain = array(
            'title' => 'Class',
            'menu' => 'class',
            'submenu' => '',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function addsubclass(Classes $class, Request $request)
    {
        $heads = $request->headmateri;
        for ($i=0; $i < count($heads); $i++) { 
            if ($heads[$i] == NULL) {
                return redirect()->back()->with('status_error', 'Add Sub Class Not Empty');
            }
        }

        for ($i=0; $i < count($heads); $i++) { 
            $save_subclass = new SubClass;
            $save_subclass->idclass = $class->idclass;
            $save_subclass->headmateri = $heads[$i];
            $save_subclass->save();
        }

        return redirect('class/detail/'.$class->idclass);
    }
}
