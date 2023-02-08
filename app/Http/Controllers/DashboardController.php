<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\RentLogs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //display total at dashboard
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $userCount = User::count();

        $rentlogs = RentLogs::with(['user', 'book'])->get();
        
        return view('dashboard', ['bookCount' => $bookCount, 
                                'categoryCount' => $categoryCount,
                                'userCount' => $userCount, 
                                'rentlogs' => $rentlogs]);
    }
}
