<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Services\UserServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = UserServices::findAll();

        return view('funcionarios.index')->with(['users' => $funcionarios]);
    }

    public function create()
    {
        return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $service = UserServices::store($request);

        Session::flash('message', $service->getContent());

        if($service->getStatusCode() !== 200)
        {
            Session::flash('status', 'danger');
            return back()->withInput($request->only(['usuario', 'senha']));
        }

        Session::flash('status', 'success');

        return Response()->redirectToRoute('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logar(Request $request)
    {
        $service = UserServices::logar($request);

        if($service->getStatusCode() !== 200)
        {
            Session::flash('status', 'danger');
            Session::flash('message', $service->getContent());
            return back()->withInput($request->only(['usuario', 'senha']));
        }

        return Response()->redirectToRoute('home');
    }

    public function username()
    {
        return 'usuario';
    }

    public function logout()
    {
        Auth::logout();
        return Response()->redirectToRoute('login');
    }

    public function get(Request $request)
    {
        return UserServices::get($request);
    }
}
