<?php

namespace App\Http\Controllers;

use App\Models\Member;

class MembersController extends Controller
{
    public function index()
    {
        $member = Member::orderBy('surname')->get();

        return view('members.index', ['members' => $member]);
    }

    public function show(Member $member)
    {
        return view('members.show', ['member' => $member]);
    }
}
