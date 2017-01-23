<?php

namespace App\Http\Controllers;

use Log;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if ($_REQUEST['password2'] != $_REQUEST['password1']) {
                throw new \Exception('Bad Request: Passwords do not match', 1);
            }
            $users = new User;
            $users->full_name = $_REQUEST['full_name'];
            $users->email = $_REQUEST['email'];
            $users->password = app('hash')->make($_REQUEST['password1']);
            $users->is_active = 1;
            $users->save();
            Log::info('Completed', [
                'response' => 'success',
                'response_code' => '200',
                'message' => 'inserted into DB with id: ' . $users->id,
                'uri' => trim($_SERVER['REQUEST_URI'], '/')
            ]);
            return redirect('/cities');
        } catch (\Exception $e) {
            Log::error('Bad Request POSTing', [
                'response' => 'error',
                'response_code' => '400',
                'message' => $e->getMessage(),
                'uri' => trim($_SERVER['REQUEST_URI'], '/')
            ]);
            return redirect('/users/create')
                ->withInput($_REQUEST)
                ->with([
                'response' => 'error',
                'response_code' => '400',
                'message' => $e->getMessage(),
                'uri' => trim($_SERVER['REQUEST_URI'], '/')
                ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('users.show')->with('user', $user);
        } catch (\Exception $e) {
            Log::error('403 - Forbidden', [
                'response' => 'error',
                'response_code' => '403',
                'message' => $e->getMessage(),
                'uri' => trim($_SERVER['REQUEST_URI'], '/')
            ]);
            return json_encode([
                'response' => 'error',
                'response_code' => '403',
                'message' => $e->getMessage(),
                'uri' => trim($_SERVER['REQUEST_URI'], '/')
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    public function login()
    {
        return view('users.login');
    }

    public function resetPassword()
    {
        return view('users.resetPassword');
    }

    public function resetPasswordEmail()
    {
        return view('users.resetPasswordEmail');
        //$this->validate($request, ['email' => 'required|email']);
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        //$response = $this->broker()->sendResetLink(
        //    $request->only('email')
        //);
        //return $response == Password::RESET_LINK_SENT
        //    ? $this->sendResetLinkResponse($response)
        //    : $this->sendResetLinkFailedResponse($request, $response);
    }

}
