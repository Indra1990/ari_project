<?php
use Illuminate\Support\Facades\Session;

function check_privileges($code)
{
    $pvls = Session::get('privileges');
    
	if(in_array($code, $pvls))
		return TRUE;
	else
		return FALSE;
}