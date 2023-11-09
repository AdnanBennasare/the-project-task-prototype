<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    
    private $userRepository;
    //

    public function __construct(UserRepository $UserRepository)
    {
        $this->userRepository = $UserRepository;
    }

    // public function store(Request $request)
    // {
    //     // dd($request);
    //     $input = $request->all();

    //     $this->userRepository->create($input);

    //     return redirect()->route('members.index')->with('success', 'User added successfully');

    // }
 
    

    public function store(Request $request): RedirectResponse
    {
        // Validate the request



        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'], // Changed to 'users' table
            'password' => ['required'],
            'role' => ['required', 'string']
        ]);

    
        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' =>  bcrypt($request->password),
        ]);

        dd($User::create());
    
        // Save the user
        $user->save();
    
        // Return a redirect response with a success message
        return redirect()->route('members.index')->with('success', 'User added successfully');
    }
    









    
    public function index(Request $request)
    {
        $query = $request->input('query');
        $members = $this->userRepository->paginate($query);
    
        if ($request->ajax()) {
            return view('members.membersTablePartial')->with('members', $members);
        } 
    
        return view('members.index')->with('members', $members);
    }

    public function destroy($id)
{
    User::find($id)->delete();
    return redirect()->route('members.index')->with('success', 'ce membre deleted successfully');

}
public function create()
{
    return view('members.create');
}


}
