<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modules;

class ModuleController extends Controller
{
    public function index()
    {
        $content = [
            'modules' => Modules::all()
        ];
        
        $pagecontent = view('contents.module.index', $content);

    	//masterpage
        $pagemain = array(
            'title' => 'Module',
            'menu' => 'privileges',
            'submenu' => 'module',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function create_page()
    {
        $content = [
        ];
        $pagecontent = view('contents.module.create', $content);

    	//masterpage
        $pagemain = array(
            'title' => 'Module',
            'menu' => 'privileges',
            'submenu' => 'module',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function create_save(Request $request)
    {
        // return $request->all();

        $request->validate([
            'code' => 'required',
            'application' => 'required',
            'module' => 'required',
            'action' => 'required',
        ]);

        $module = new Modules;
        $module->code = $request->code;
        $module->application = $request->application;
        $module->module = $request->module;
        $module->action = $request->action;
        $module->save();
        return redirect('privileges/module');

    }
}
