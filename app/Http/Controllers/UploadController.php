<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\UploadManager;

class UploadController extends Controller
{
    //
    protected $manager;

    public function __construct(UploadManager $manager)
    {
        $this->manager = $manager;
    }

    public function index(Request $request)
    {
        $data = $this->manager->folderInfo($request->get('folder'));
        return view('home.file.index', $data);
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $fileName = $request->get('name')

                    ? $request->get('name').'.'.explode('/', $file->getClientMimeType())[1]

                    : $file->getClientOriginalName();

        $path = Str::finish($request->get('folder'), '/');
         
        $file->storeAs($path, $fileName);
    }
}