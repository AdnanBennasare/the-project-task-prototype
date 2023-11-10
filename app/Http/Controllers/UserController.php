<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;


class UserController extends Controller
{

    
    private $userRepository;
    //

    public function __construct(UserRepository $UserRepository)
    {
        $this->userRepository = $UserRepository;
    }


    public function store(Request $request): RedirectResponse
    {
        $authorization = Gate::inspect('viewMembers', User::class);
   
        if ($authorization->allowed()) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => "member", // Set the role column to 'member'
            'password' => Hash::make($request->password),
        ]);
    
        // Return a redirect response with a success message and the name of the user added
        return redirect()->route('members.index')->with('success', 'User <strong>' . htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') . '</strong> added successfully');
    } else {
        // User is not authorized, handle the unauthorized access
         abort(403, $authorization->message() ?: "Vous n'avez pas le droit de consulter cette page.");
     }
    }
    
    



    
    public function index(Request $request)
    {
        $authorization = Gate::inspect('viewMembers', User::class);
   
        if ($authorization->allowed()) {
            $query = $request->input('query');
            $members = $this->userRepository->paginate($query);
        
            if ($request->ajax()) {
                return view('members.membersTablePartial')->with('members', $members);
            } 
            return view('members.index')->with('members', $members);
        } else {
           // User is not authorized, handle the unauthorized access
            abort(403, $authorization->message() ?: "Vous n'avez pas le droit de consulter cette page.");
        }
    }

    public function destroy($id)
{
    $authorization = Gate::inspect('viewMembers', User::class);
   
    if ($authorization->allowed()) {
    User::find($id)->delete();
    return redirect()->route('members.index')->with('success', 'ce membre deleted successfully');
} else {
    abort(403, $authorization->message() ?: "Vous n'avez pas le droit de consulter cette page.");
   }
}


public function create()
{
    $authorization = Gate::inspect('viewMembers', User::class);
   
    if ($authorization->allowed()) {
    return view('members.create');
   } else {
    abort(403, $authorization->message() ?: "Vous n'avez pas le droit de consulter cette page.");
   }
}



public function show($id){

    $authorization = Gate::inspect('viewMembers', User::class);
   
if ($authorization->allowed()) {
    $member = User::find($id); 
    if($member) {

        return view('members.view', compact('member'));
    } else {
        abort(404);
    }
   } else {
    abort(403, $authorization->message() ?: "Vous n'avez pas le droit de consulter cette page.");
   }

}

}
