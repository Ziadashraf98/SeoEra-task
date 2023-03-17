<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use App\Traits\imageTrait;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    use imageTrait;

    public function __construct()
    {
        $this->middleware('permission:language-sidebar');
    }

    public function create()
    {
        return view('admin.add_language');
    }

    public function store(LanguageRequest $request)
    {
        $validation = $request->validated();
        $validation['image'] = $this->addImage('languages');
        Language::create($validation);
        return back()->with('success' , 'Language Added Successfully');
    }
}
