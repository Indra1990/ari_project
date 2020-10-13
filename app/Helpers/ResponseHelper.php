<?php

function cres403()
{
    //content
    $pagecontent = view('contents.errors.403');

    //masterpage
    $pagemain = array(
        'title' => '403 - Permission Denied',
        'menu' => '',
        'submenu' => '',
        'pagecontent' => $pagecontent,
    );

    return view('contents.masterpage', $pagemain);
}