<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::query()
            ->with('user')
            ->orderByRaw('user_id is null')
            ->orderBy('name')
            ->paginate();

        return view('books.index', ['books' => $books]);
    }
}
