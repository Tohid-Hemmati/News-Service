<?php


function ImageUploader($image)
{

    $imageName = time() . "-" . $image->getClientOriginalName();
    $path = 'assets/images/uploaded/';
    $image->move($path, $imageName);
    $image_path='/'.$path;
    return $image_path . $imageName;
}

function FileUploader($file)
{
    $fileName = time() . "-" . $file->getClientOriginalName();
    $path = 'assets/files/uploaded/';
    $file->move($path, $fileName);
    $file_path='/'.$path;
    return $file_path . $fileName;
}
