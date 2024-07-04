<?php

// $file di kirim dari parameter di controller contoh $request->file('file');
// $path di kirim dari parameter di controller contoh 'public/upload/';
// $name di kirim dari parameter di controller yang akan menjadi nama baru file contoh gamar123.png';
if (!function_exists('uploadImage')) {
    function uploadImage($file, $path, $name = null)
    {
        $fileNamephp = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
        // $extension = $file->getClientOriginalExtension();
        // $fileNamephp = $name ? $name . '.' .  : $fileNamephp;
        $file->move($path, $fileNamephp);
        return $fileNamephp;
    }
}

// contoh untuk controllers uploadImage($request->file('file'), 'public/upload/', 'gambar123');

if (!function_exists('uploadImageSize')) {
    function uploadImageSize($file, $fileSize, $path, $name = null)
    {
        $fileName = $name . '.' . $file->extension();
        $fileSize->save($path . $fileName);
        return $fileName;
    }
}
