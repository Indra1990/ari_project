<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Modules;
use App\Models\Privileges;


class UsersController extends Controller
{
    public function index()
    {
        if(!check_privileges('A00003')) return cres403();

        $content = [
            'users' => User::all()
        ];
        
        $pagecontent = view('contents.users.index', $content);

    	//masterpage
        $pagemain = array(
            'title' => 'User',
            'menu' => 'privileges',
            'submenu' => 'users',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function update_page(User $user)
    {
        if(!check_privileges('A00003')) return cres403();

        $content = [
            'users' => User::find($user->idusers),
            'access' => $this->module_sort($user->idusers)
        ];

        // return $content;
        
        $pagecontent = view('contents.users.update', $content);

    	//masterpage
        $pagemain = array(
            'title' => 'User',
            'menu' => 'privileges',
            'submenu' => 'users',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function update_save(User $user, Request $request)
    {
        if(!check_privileges('A00004')) return cres403();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        $user = User::find($user->idusers);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->save();

        return redirect('privileges/users');
    }

    public function save_privileges(User $user, Request $request)
    {
        // return $request->all();
         //get iduser
         $idusers = $user->idusers;

         //delete old privileges
         Privileges::where('idusers',$user->idusers)->delete();
 
         foreach ($request->all() as $key => $val) {
             if($key != '_token') {
                 $saveprv = new Privileges;
                 $saveprv->idusers = $idusers;
                 $saveprv->module_code = $key;
                 $saveprv->save();
             }
         }

        return redirect('privileges/users');

    }

   protected function module_sort($idusers)
   {
    $result = [];

    //privileges
    $datapvl = [];
    $privileges = Privileges::select('module_code')
    ->where('idusers',$idusers)
    ->get();
    foreach ($privileges as $pvl) {
        array_push($datapvl, $pvl->module_code);
    }

    //modules
    $modules = Modules::orderBy('code')->get();
    foreach ($modules as $mod) {
        //user access
        $access = FALSE;
        if(in_array($mod->code, $datapvl)) {
            $access = TRUE;
        }
        //collect module
        $result[$mod->application][$mod->module][$mod->action] = [
            'code' => $mod->code,
            'access' => $access
        ];
    }

    return $result;
   }
}
