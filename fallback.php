<?php

function destination($id)
{ 
    return "/home/libmanuk/public_html/catalog/$id.html";
}


function source($id)
{
    $trimmed_id = preg_replace('/-z$/', '', $id);
    $pt_path = preg_replace('/(..)/', '\1/', $trimmed_id);
    return "/home/libmanuk/public_html/pairtree_root/$pt_path$trimmed_id/$id.html";
} 


if (preg_match('/^\/?catalog\/([a-z0-9]{12}(-z)?)(.html)?\??$/' , $_SERVER['REQUEST_URI'], $matches)) {
    $wanted_id = $matches[1];
    copy(source($wanted_id), destination($wanted_id));
    print(file_get_contents(destination($wanted_id)));
    exit;
}

# Otherwise, do normal page
