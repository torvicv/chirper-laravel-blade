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
        $permisos = Auth::user()->permisos->where('pizarra', 'members')->first();
        return view('members.index', [
            'members' => Member::all(),
            'permisos' => $permisos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
        $this->authorize('view', $member);
        return 'edit';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
        $this->authorize('view', $member);
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
