<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function store()
    {
        $author = Author::create($this->validateRequest());

        return redirect('/authors/' . $author->id);
    }

    public function validateRequest()
    {
        return request()->validate([
            'name'  => 'required',
            'dob'   => 'required'
        ]);
    }
}