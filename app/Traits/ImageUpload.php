<?php

namespace App\Traits;

/**
 * Image upload trait
 */
trait ImageUpload
{
    public function upload($media, $path = 'images/', $width = 350, $height = 350, $is_binary = false)
    {

        $imageName = time() . '.' . $media->getClientOriginalExtension();
        $imageExtension = $media->getClientOriginalExtension();
        if ($imageExtension === 'pdf') {
            $path = $media->storeAs('public/documents', $imageName);
        } else {
            $path = $media->storeAs('public/images', $imageName);
        }
        $relativePath = str_replace('public/', '', $path);

        // This will store the image in the storage directory
        // You might want to save the image path or details in your database here
        return $relativePath;
    }
}
