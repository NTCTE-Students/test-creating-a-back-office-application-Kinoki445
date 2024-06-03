<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;

class ViewsController extends Controller
{
    public function index()
    {
        return view("index", ['items' => Items::where('quantity', '>',0)->get()]);
    }

    public function register()
    {
        return view("register");
    }

    public function login()
    {
        return view("login");
    }

    public function create_item()
    {
        return view("item.create");
    }
}
