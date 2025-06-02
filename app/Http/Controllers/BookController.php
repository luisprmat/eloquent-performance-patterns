<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Checkout;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::query()
            ->orderByDesc(Checkout::select('borrowed_date')
                ->whereColumn('book_id', 'books.id')
                ->latest('borrowed_date')
                ->take(1)
            )
            ->withLastCheckout()
            ->with('lastCheckout.user')
            ->paginate();

        return view('books.index', ['books' => $books]);
    }
}
