<?php


function ImageUploader($image)
{
    if ($image == null) {
        return '../uploads/images/noimage.jpg';
    }
    $imageName = time() . "-" . $image->getClientOriginalName();
    $path = '/assets/images/uploaded/';
    $image->move($path, $imageName);
    return $path . $imageName;
}

function FileUploader($file)
{
    $fileName = time() . "-" . $file->getClientOriginalName();
    $path = '/assets/files/uploaded/';
    $file->move($path, $fileName);
    return $path . $fileName;
}
