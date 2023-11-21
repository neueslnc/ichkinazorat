<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superadmin\SuperVisorCreate;
use App\Http\Requests\Superadmin\UpdateSupervisorRequest;
use App\Models\SupervisorTypeModel;
use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('superadmin.supervisor.index', [
            'items' => User::query()
                ->where('level_id', '!=', 1)
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $supervisors = SupervisorTypeModel::query()->get();
        return view('superadmin.supervisor.create', [
            'supervisor_type' => $supervisors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SuperVisorCreate $request
     * @return RedirectResponse
     */
    public function store(SuperVisorCreate $request)
    {
        $data = $request->all();

        $data['password'] = Hash::make($data['password']);
        $data['password_confirmation'] = Hash::make($data['password_confirmation']);

        User::create($data);

        return redirect()->route('superadmin.supervisor.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param User $supervisor
     * @return Application|Factory|View
     */
    public function edit(User $supervisor)
    {
        $roles = UserLevel::query()
            ->get();
        $supervisor_types = SupervisorTypeModel::query()
            ->get();
        return view('superadmin.supervisor.edit', [
            'supervisor' => $supervisor,
            'supervisor_types' => $supervisor_types,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSupervisorRequest $request
     * @param User $supervisor
     * @return RedirectResponse
     */
    public function update(UpdateSupervisorRequest $request, User $supervisor)
    {
        $users = User::find($supervisor->id);

//        if (Hash::check($request->old_password, $users->password)) {
        $users->full_name = $request->full_name;
        $users->level_id = $request->level_id;
        $users->supervisor_type = $request->supervisor_type;
//            $users->login = $request->login;
//            $users->password = Hash::make($request->password);
        $users->update();
//        } else {
//            return back()->with('error', "Current Password is Invalid");
//        }

        return redirect()->route('superadmin.supervisor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $supervisor
     * @return RedirectResponse
     */
    public function destroy(User $supervisor)
    {
        $supervisor->delete();
        return redirect()->back()->with('success', 'Deleted successfully.');
    }

    /**
     * @return Application|Factory|View
     */
    public function getSupervisorMedicine()
    {
        $medicines = User::query()
            ->with('supervisor_types')
            ->where('level_id', '=', 2)
            ->where('supervisor_type', '=', 1)
            ->paginate(1);

        return view('superadmin.supervisor.medicine', ['medicines' => $medicines]);
    }

    /**
     * @return Application|Factory|View
     */
    public function getSupervisorSocial()
    {
        $socials = User::query()
            ->with('supervisor_types')
            ->where('level_id', '=', 2)
            ->where('supervisor_type', '=', 2)
            ->paginate(20);

        return view('superadmin.supervisor.social', ['socials' => $socials]);
    }
}
