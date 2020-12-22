<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\Mime\MimeTypes;


class UploadManager
{
    protected $disk;

    public function __construct()
    {
        //
        $this->disk = Storage::disk(config('filesystems.default', 'public'));
    }
    //
    public function cleanFolder($folder)
    {
        return '/' . trim(str_replace('..', '', $folder), '/');
    }

    public function breadcrumbs($folder)
    {
        $folder = trim($folder, '/'); //eq: /post_img/2016/10/01/
        $crumbs = ['/' => 'root'];
        if (empty($folder)) return $crumbs;
        $folders = explode('/', $folder); // eq: ['post_img', '2016', '10', '01']
        $build = '';
        foreach ($folders as $folder)
        {
            $build .= '/' . $folder;
            $crumbs[$build] = $folder;
        }
        return $crumbs;
    }
    public function fileMimeType($path)
    {
        $mimeTypes = new MimeTypes();
        $exts = $mimeTypes->getExtensions($path);

        return $exts;
    }

    public function fileDetail($path)
    {
        $path = '/' . trim($path, '/');
        return [
            'name' => basename($path),
            'fullPath' => $path,
            'webPath'  => asset("storage/" . ltrim($path, '/')),
            'mimeType' => $this->fileMimeType($path),
            'size'     => $this->disk->size($path),
            'modified' => $this->disk->lastModified($path)
        ];
    }

    public function folderInfo($folder)
    {
        $folder = $this->cleanFolder($folder);
        $breadcrumbs = $this->breadcrumbs($folder);
        $slice = array_slice($breadcrumbs, -1);
        $folderName = current($slice);
        $breadcrumbs = array_slice($breadcrumbs, 0, -1);
        $subfolders = [];
        foreach (array_unique($this->disk->directories($folder)) as $subfolder) {

            $subfolders["/$subfolder"] = basename($subfolder);
            
        }
        $files = [];
        foreach ($this->disk->files($folder) as $path) {
            
            $files[] = $this->fileDetail($path);
            //echo $files;

        }

        return compact(
            'folder',
            'folderName',
            'breadcrumbs',
            'subfolders',
            'files'
        );
    }

    public function checkFile($path)
    {
        return $this->disk->exists($path);
    }
    /*

    //

    //
    public function checkFolder($folder)
    {
        return $this->disk->exists($folder);
    }
    //
    public function createFolder($folder)
    {
        $this->cleanFolder($folder);
        if ($this->checkFolder($folder)) {

            throw new UploadException("The Folder exists.");
        }
        return $this->disk->makeDirectory($folder);
    }
    //
    public function deleteFolder($folder)
    {
        $this->cleanFolder($folder);
        $filesFolders = array_merge(
            $this->disk->directories($folder),
            $this->disk->files($folder)
        );

        if (!empty($filesFolders)) {
            return false;
        }
        return $this->disk->deleteDirectory($folder);
    }
    //
    public function fileMimeType($path)
    {
        $mimeTypes = new MimeTypes();
        $exts = $mimeTypes->getExtensions($path);
        return 
    }
    //
    public function fileModified($path)
    {
        return Carbon::createFromTimestamp(
            substr($this->disk->lastModified($path), 0, 10)
        )->toDateTimeString();
    }
    //
    protected function fileDetails($path)
    {
        $path = '/' . ltrim($path, '/');
        return [

            'name' => basename($path),
            'fullPath' => $path,
            'webPath' => $this->fileWebpath($path),
            'mimeType' => $this->fileMimeType($path),
            'size' => $this->fileSize($path),
            'modified' => $this->fileModified($path),

        ];

    }
    //
    public function deleteFile($path)
    {
        $this->cleanFolder($path);
        return $this->disk->delete($path);
    }
    */
}