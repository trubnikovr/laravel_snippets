<?php

namespace App\ValueObjects;

class FileUploadVO
{
    private $originalName;
    private $extension;
    private $storagePath;

    public function __construct(string $originalName, string $extension, string $pathPrefix = 'addresses')
    {
        $this->originalName = $originalName;
        $this->extension = $extension;
        $this->storagePath = $this->calculateStoragePath($pathPrefix);
    }

    private function calculateStoragePath($pathPrefix): string
    {
        $filename = uniqid() . "." . $this->extension;
        return $pathPrefix . "/" . uniqid() . "/" . $filename;
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }

    public function getStoragePath(): string
    {
        return $this->storagePath;
    }
}
