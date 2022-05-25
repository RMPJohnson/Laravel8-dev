<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Hash;


class UserController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display all users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('user.index', compact('users'));
    }

    /**
     * Show form for creating user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create',[
            'roles' => Role::pluck('name','id')->all()
        ]);
    }

    /**
     * Store a newly created user
     *
     * @param User $user
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(User $user,  StoreUserRequest $request)
    {
        $input = $request->except('_token');

        $input['password'] = \Hash::make($input['password']);

        $user = User::create($input);
        $input['user_id']=$user->id;
        $imageName = time().'.'.$request->picture->extension();
        $request->picture->move(public_path('images/user'), $imageName);
        $input['picture'] =$imageName;
        UserProfile::create($input);

        $user->assignRole($request->input('role'));

        return redirect()->route('users.index')
            ->withSuccess(__('User added successfully.'));
    }

    /**
     * Show user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', [
            'user' => $user
        ]);
    }

    /**
     * Edit user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        $input = $request->validated();
        $user->update($input);
        if($request->picture) {
            $imageName = time().'.'.$request->picture->extension();
            $request->picture->move(public_path('images/user'), $imageName);
            $input['picture'] =$imageName;
        }

        $user->profile->update($input);

        $user->syncRoles($request->get('role'));

        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully.'));
    }

    /**
     * Delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }

    public function changePassword(){
        return view('user.changepassword');
    }

    public function saveChangePassword(Request $request) {
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your old password does not matches.");
        }
        if(strcmp($request->get('password'), $request->get('old_password')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your old password.");
        }
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:2|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        //Change Password
        User::find(auth()->user()->id)->update(['password'=> $request->password]);
        return redirect()->back()->with("success","Password successfully changed!");

    }

    public function profile(){
        $user = User::find(1);
        return view('user.profile',[
            'user' => $user,
        ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect("/administrator/login")->withSuccess('You are not allowed to access');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/administrator/login');
    }
}
