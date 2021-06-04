<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserFormRequest;
use App\UserForm;
use Exception;
use Illuminate\Http\Request;


class UserFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = UserForm::all();
        return view('user_form.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $userFormRequest, UserForm $userForm)
    {
        $user = $userForm::create($userFormRequest->all());
        return response()->json(['message' => 'User has been sucessfully saved', 'data' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserForm  $userForm
     * @return \Illuminate\Http\Response
     */
    public function show(UserForm $userForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserForm  $userForm
     * @return \Illuminate\Http\Response
     */
    public function edit(UserForm $userForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserForm  $userForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserForm $userForm)
    {
        try {
            $user = $userForm->update($userFormRequest->all());
            return response()->json(['message' => 'User has been sucessfully saved', 'data' => $user]);
        } catch(\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserForm  $userForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserForm $userForm)
    {
        $userForm->delete();
        return response()->json(['message' => 'User has been sucessfully deleted']);
    }
}
