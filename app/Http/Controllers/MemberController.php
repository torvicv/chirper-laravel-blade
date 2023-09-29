<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Member::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('members.index', [
            'members' => Member::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', Auth::user());
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->authorize('create', Auth::user());
        $member = new Member;
        $member->fill($request->all());
        $member->save();
        return to_route('member.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
        $this->authorize('view', $member);
        return view('members.show', [
            'member' => $member
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
        $this->authorize('update', $member);
        return view('members.edit', [
            'member' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
        $this->authorize('restore', $member);
        $member = Member::findOrFail($member->id);
        $member->fill($request->all());
        $member->update();
        return to_route('member.show', ['member' => $member->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
        $this->authorize('delete', $member);
        $member = Member::findOrFail($member);
        $member->delete();
        return to_route('member.index');
    }
}
