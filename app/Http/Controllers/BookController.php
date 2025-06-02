<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Query\Builder;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::query()
            ->orderByDesc(function (Builder $query) {
                $query->select('borrowed_date')
                    ->from('checkouts')
                    ->whereColumn('book_id', 'books.id')
                    ->latest('borrowed_date')
                    ->take(1);
            })
            ->withLastCheckout()
            ->with('lastCheckout.user')
            ->paginate();

        return view('books.index', ['books' => $books]);
    }
}
