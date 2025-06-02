<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::query()
            ->orderBy(User::select('name')
                ->join('checkouts', 'checkouts.user_id', '=', 'users.id')
                ->whereColumn('checkouts.book_id', 'books.id')
                ->latest('checkouts.borrowed_date')
                ->take(1)
            )
            ->withLastCheckout()
            ->with('lastCheckout.user')
            ->paginate();

        return view('books.index', ['books' => $books]);
    }
}
