<?php

function destination($id)
{
    return "/home/libmanuk/public_html/catalog/$id.html";
}

function source($id)
{
    $trimmed_id = preg_replace('/-z|-t|-m$/', '', $id);
    $pt_path = preg_replace('/(..)/', '\1/', $trimmed_id);
    return "/home/libmanuk/public_html/pairtree_root/$pt_path$trimmed_id/$id.html";
}

function uri($id, $terms)
{
    return "/catalog/$id?$terms";
}

#                             1            2     3       4  5
if (preg_match('/^\/?catalog\/([a-z0-9]{12}(-z)?)(.html)?(\?(.*))?$/', $_SERVER['REQUEST_URI'], $matches)) {
    $wanted_id = $matches[1];
    $search_terms = $matches[5];

    copy(source($wanted_id), destination($wanted_id));

    if (strlen($search_terms) > 0) {
        header('Location: ' . uri($wanted_id, $search_terms));
    }
    else {
        print(file_get_contents(destination($wanted_id)));
    }
    exit;
}

#                             1            2     3       4  5
if (preg_match('/^\/?catalog\/([a-z0-9]{12}(-t)?)(.html)?(\?(.*))?$/', $_SERVER['REQUEST_URI'], $matches)) {
    $wanted_id = $matches[1];
    $search_terms = $matches[5];

    copy(source($wanted_id), destination($wanted_id));

    if (strlen($search_terms) > 0) {
        header('Location: ' . uri($wanted_id, $search_terms));
    }
    else {
        print(file_get_contents(destination($wanted_id)));
    }
    exit;
}

#                             1            2     3       4  5
if (preg_match('/^\/?catalog\/([a-z0-9]{12}(-m)?)(.html)?(\?(.*))?$/', $_SERVER['REQUEST_URI'], $matches)) {
    $wanted_id = $matches[1];
    $search_terms = $matches[5];

    copy(source($wanted_id), destination($wanted_id));

    if (strlen($search_terms) > 0) {
        header('Location: ' . uri($wanted_id, $search_terms));
    }
    else {
        print(file_get_contents(destination($wanted_id)));
    }
    exit;
}

# Otherwise, do normal page
