<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
