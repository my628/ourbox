<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\Tag as TagResource;

class TagController extends Controller
{
    //
    public function index()
    {
        return TagResource::collection(Tag::all());
    }
}
