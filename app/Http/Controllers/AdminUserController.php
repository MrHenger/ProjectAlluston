<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Photo;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('dashboard.adminUser.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.adminUser.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = $request->all();

        if ($archivo = $request->file('route_photo')) {
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images/photo', $nombre);

            $foto = Photo::create(['route_photo' => $nombre]);

            $user['photo_id'] = $foto->id;
        } else {
            $user['photo_id'] = 1;
        }

        $user['password'] = bcrypt($request->password);

        $userRole = User::create($user);

        if (isset($user['role'])) {
            $userRole->syncRoles($user['role']);
        }

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.adminUser.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('dashboard.adminUser.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $userUpdate = $request->all();

        echo var_dump($userUpdate['role']);

        if ($archivo = $request->file('route_photo')) {
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images/photo', $nombre);

            $foto = Photo::create(['route_photo' => $nombre]);

            $userUpdate['photo_id'] = $foto->id;
        } else {
            $userUpdate['photo_id'] = 1;
        }

        $user->update($userUpdate);

        if (isset($userUpdate['role'])) {
            $user->syncRoles($userUpdate['role']);
        }

        return redirect()->route('user.index')->with('save', 'Cambios guardados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
