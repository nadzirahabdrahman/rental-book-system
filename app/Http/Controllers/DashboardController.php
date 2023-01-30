<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //display total at dashboard
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        
        return view('dashboard', ['bookCount' => $bookCount, 
                                'categoryCount' => $categoryCount,
                                'userCount' => $userCount]);
    }
}
