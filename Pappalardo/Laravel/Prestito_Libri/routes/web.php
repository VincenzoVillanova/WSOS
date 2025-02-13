<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/book/api/{id}/filter', function ($id) {
    $loan = Loan::where('book_id', $id)->get();
    $book = Book::all();
    return view('loan.list', compact('loan', 'book'));
});

Route::post('/loan/api/seachByBook', function (Request $request) {
    $id = request('id');
    $book = Book::all();
    $loan = Loan::where('book_id', $id)->get();
    return view('loan.list', compact('loan', 'book'));
});

Route::post('/loan/api/seachByBook', function (Request $request) {
    $id = request('id');
    $loan = Loan::where('book_id', $id)->delete();
    return view('loan.list', compact('loan', 'book'));
});

Route::resource('/book', BookController::class);
Route::resource('/loan', LoanController::class);
