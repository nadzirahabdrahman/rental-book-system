<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::all();
        return view('book', ['books' => $books]);
    }

    public function add()
    {
        //for Many to Many relationship with Books table: to display Category list 
        //at book-add page
        $categories = Category::all();
        return view('book-add', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        
        //display error if same book code
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:100',
            'title' => 'required|max:255',

        ]);


        //execute a command php artisan storage:link to make storage file accessed to public file
        //in .env file, change FILESYSTEM_DISK=local ---> FILESYSTEM_DISK=public 
        $newName = ''; //if user didn't upload book cover photo, variable will be NULL 

        //customize name of uploaded image ofr book cover
        if ($request->file('image')) {
            
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        //cover->must same with column name in DB
        $request['cover'] = $newName;

        $books = Book::create($request->all());
        $books->categories()->sync($request->categories);
        return redirect('book')->with('status', 'New book added successfully');

        
    }

    public function edit($slug)
    {
        $books = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('book-edit', ['categories' => $categories, 'books' => $books]);
    }

    public function update(Request $request, $slug)
    {

        if ($request->file('image')) {
            
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }

        $books = Book::where('slug', $slug)->first();
        $books->update($request->all());

        if ($request->categories) {
            $books->categories()->sync($request->categories);
        }

        return redirect('book')->with('status', 'Book updated successfully');
    }

    public function delete($slug)
    {
        $books = Book::where('slug', $slug)->first();
        return view('book-delete', ['books' => $books]);
    }

    public function destroy($slug)
    {
        $books = Book::where('slug', $slug)->first();
        $books->delete();
        return redirect('book')->with('status', 'Book deleted successfully');
    }

    public function deleted()
    {
        $deletedBooks = Book::onlyTrashed()->get();
        return view('book-deleted-list', ['deletedBooks' => $deletedBooks]);
    }

    public function restore($slug)
    {
        $books = Book::withTrashed()->where('slug', $slug)->first();
        $books->restore();
        return redirect('book')->with('status', 'Book has been restored');
    }
    
}
