<?php

namespace App\Http\Controllers;

use App\GuestbookEntry;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GuestbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function list(){
        $entries = GuestbookEntry::whereRaw(1)->orderBy('id', 'DESC')->paginate(25);
        return view('guestbook.list', compact('entries'));
    }


    public function store(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'text' => 'required',
        ]);

        $homepage = '';

        $username = strip_tags((string)$request->input('username'));
        $email = strip_tags((string)$request->input('email'));
        $text = strip_tags((string)$request->input('text'));
        $homepage = strip_tags((string)$request->input('homepage'));
        $ip = request()->ip();
        $user_agent = $request->header('User-Agent');
        $created_at = Carbon::now();

        DB::table('guestbook_entries')->insert(
            array(
                'username' => $username,
                'email' => $email,
                'homepage' => $homepage,
                'text' => $text,
                'ip' => $ip,
                'user_agent' => $user_agent,
                'created_at' => $created_at
            )
        );

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create()
    {
        return view('guestbook.create');
    }
}
