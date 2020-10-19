<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\SubClass;
use App\Models\Materies;
use Illuminate\Support\Str;
use File;

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
        // return $request->all();
        $heads = $request->headmateri;
        for ($i=0; $i < count($heads); $i++) { 
            if (empty($heads[$i])) {
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

    public function addmateries(Classes $class, Request $request)
    {
        // validate required not null
        if (empty($request->name_materies)) {
            return redirect()->back()->with('status_error', 'name materies is required ');
        }
        // validate extension 
        for ($i=0; $i < count($request->video_480); $i++) {
            if($request->video_480[$i]->getClientOriginalExtension() != 'mp4'){
                return redirect()->back()->with('status_error', 'Video 480 Extension must MP4');
            }
            if($request->video_720[$i]->getClientOriginalExtension() != 'mp4'){
                return redirect()->back()->with('status_error', 'Video 720 Extension must MP4');
            }
            if (empty($request->video_480[$i]) || empty($request->video_720[$i])   ) {
                return redirect()->back()->with('status_error', 'Video 480 and 720 is required');
            }
        }

        for ($i=0; $i < count($request->name_materies) ; $i++) { 

            $name_480 = Str::random(20)."_".$request->file('video_480')[$i]->getClientOriginalName();
            $path_480 = env('CDN_PATH').'/class/video480/'; 
            $request->file('video_480')[$i]->move($path_480, $name_480);

            $name_720 = Str::random(20)."_".$request->file('video_720')[$i]->getClientOriginalName();
            $path_720 = env('CDN_PATH').'/class/video720/'; 
            $request->file('video_720')[$i]->move($path_720, $name_720);

            $save_materies = new Materies;
            $save_materies->idsubclass = $request->add_idsubclass;
            $save_materies->name_materi = $request->name_materies[$i];
            $save_materies->video480 = $name_480;
            $save_materies->video720 = $name_720;
            $save_materies->save();
        }

        return redirect('class/detail/'.$class->idclass)->with('status_success','Successfuly Add Materies');
    }

    public function viewmateries(Classes $class,SubClass $subcls)
    {   
        $subclass = SubClass::with([
                        'class_belong',
                        'materies'
                    ])
                    ->where('idsubclass',$subcls->idsubclass)
                    ->first();

        return response()->json(array('subclass'=> $subclass), 200);
    }

    public function delete_materies(Classes $class,Materies $materies)
    {
        $materies = Materies::find($materies->idmateries);

        if (!empty($materies->video480)) {
            $path_video480 = env('CDN_PATH').'class/video480/'.$materies->video480; 
            if(File::exists($path_video480)){
                File::delete($path_video480); 
            }
        }

        if (!empty($materies->video720)) {
            $path_video720 = env('CDN_PATH').'class/video720/'.$materies->video720; 
            if(File::exists($path_video720)){
                File::delete($path_video720); 
            }
        }

        $materies->delete();
        return response()->json(array('materies'=> $materies), 200);

    }
}
