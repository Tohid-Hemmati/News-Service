<?php


function ImageUploader($image)
{

    $imageName = time() . "-" . $image->getClientOriginalName();
    $path = 'assets/images/uploaded/';
    $image->move($path, $imageName);
    return $path . $imageName;
}

function FileUploader($file)
{
    $fileName = time() . "-" . $file->getClientOriginalName();
    $path = 'assets/files/uploaded/';
    $file->move($path, $fileName);
    return $path . $fileName;
}
