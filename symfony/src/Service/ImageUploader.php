<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploader
{
    private string $uploadDir;

    public function __construct(string $uploadDir)
    {
        $this->uploadDir = $uploadDir;
    }

    public function uploadCover(UploadedFile $file, string $prefix): string
    {
        $fileName = $prefix.'-'.uniqid().'.'.$file->guessExtension();
        $file->move($this->uploadDir, $fileName);
        return $fileName;
    }

    public function deleteFile(string $fileName): void
    {
        $path = $this->uploadDir.'/'.$fileName;
        if (file_exists($path)) {
            unlink($path);
        }
    }
}
