<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Permiso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permisos = Auth::user()->permisos->where('pizarra', 'users')->first();
        return view('users.index', [
            'users' => User::all(),
            'permisos' => $permisos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', Auth::user());
        $permisos = Permiso::where('user_id', 1)->get();
        return view('users.create', [
            'permisos' => $permisos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //
        $this->authorize('create', Auth::user());
        $user = new User;
        $user->fill($request->all());
        $user->save();
        $user->permisos()->createMany([
            [
                'pizarra' => 'users',
                'ver' => $request->input('users_ver', false),
                'editar' => $request->input('users_editar', false),
                'borrar' => $request->input('users_borrar', false),
                'user_id' => $user->id
            ],
            [
                'pizarra' => 'posts',
                'ver' => $request->input('posts_ver', false),
                'editar' => $request->input('posts_editar', false),
                'borrar' => $request->input('posts_borrar', false),
                'user_id' => $user->id
            ],
            [
                'pizarra' => 'members',
                'ver' => $request->input('members_ver', false),
                'editar' => $request->input('members_editar', false),
                'borrar' => $request->input('members_borrar', false),
                'user_id' => $user->id
            ]
        ]);
        return to_route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        $this->authorize('view', $user);
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $this->authorize('update', $user);
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        //
        $this->authorize('update', $user);
        $updateUser = User::findOrFail($user->id);
        $updateUser->fill($request->all());
        $updateUser->update();
        $permisos = Permiso::where('user_id', $updateUser->id)->get();
        $permisoUsers = null;
        $permisoPosts = null;
        $permisoMembers = null;
        foreach($permisos as $permiso) {
            if ($permiso->pizarra === 'users') {
                $permisoUsers = $permiso;
                $permisoUsers->ver = $request->input('users_ver') === 'on' ? true : false;
                $permisoUsers->editar = $request->input('users_editar') === 'on' ? true : false;
                $permisoUsers->borrar = $request->input('users_borrar') === 'on' ? true : false;
            }else if ($permiso->pizarra === 'posts') {
                $permisoPosts = $permiso;
                $permisoPosts->ver = $request->input('posts_ver') === 'on' ? true : false;
                $permisoPosts->editar = $request->input('posts_editar') === 'on' ? true : false;
                $permisoPosts->borrar = $request->input('posts_borrar') === 'on' ? true : false;
            }else if ($permiso->pizarra === 'members') {
                $permisoMembers = $permiso;
                $permisoMembers->ver = $request->input('members_ver') === 'on' ? true : false;
                $permisoMembers->editar = $request->input('members_editar') === 'on' ? true : false;
                $permisoMembers->borrar = $request->input('members_borrar') === 'on' ? true : false;
            }
        }
        $user->permisos()->saveMany([
            $permisoUsers,
            $permisoPosts,
            $permisoMembers,
        ]);

        return to_route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $this->authorize('delete', $user);
        $deleteUser = User::findOrFail($user->id);
        $deleteUser->delete();
        return to_route('user.index');
    }
}
