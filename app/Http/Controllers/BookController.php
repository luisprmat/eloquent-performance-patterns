<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::query()
            ->select('books.*')
            ->join('checkouts', 'checkouts.book_id', '=', 'books.id')
            ->groupBy('books.id')
            ->orderByRaw('max(checkouts.borrowed_date) desc')
            ->withLastCheckout()
            ->with('lastCheckout.user')
            ->paginate();

        return view('books.index', ['books' => $books]);
    }
}
