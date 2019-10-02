<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestbookEntry extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'homepage', 'text'
    ];

    /**
     * @var string
     */
    protected $table = 'guestbook_entries';
}
