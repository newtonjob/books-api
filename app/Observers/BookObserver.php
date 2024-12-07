<?php

namespace App\Observers;

use App\Models\Book;
use App\Models\User;
use App\Notifications\BookCreated;
use App\Notifications\BookDeleted;
use App\Notifications\BookUpdated;
use Illuminate\Support\Facades\Notification;

class BookObserver
{
    /**
     * Handle the Book "created" event.
     */
    public function created(Book $book): void
    {
        $admins = User::where('role', 'admin')->get();

        Notification::send($admins, new BookCreated($book));
    }

    /**
     * Handle the Book "updated" event.
     */
    public function updated(Book $book): void
    {
        $admins = User::where('role', 'admin')->get();

        Notification::send($admins, new BookUpdated($book));
    }

    /**
     * Handle the Book "deleted" event.
     */
    public function deleted(Book $book): void
    {
        $admins = User::where('role', 'admin')->get();

        Notification::send($admins, new BookDeleted($book));
    }
}
