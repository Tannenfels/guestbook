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


    public function storeComment(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'text' => 'required',
        ]);

        $homepage = '';

        $username = strip_tags((string)$request->only('username'));
        $email = strip_tags((string)$request->only('email'));
        $text = strip_tags((string)$request->only('text'));
        $homepage = strip_tags((string)$request->only('homepage'));
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

    public function createArticle()
    {
        return view('guestbook.create');
    }
}
