<!-- <?php

// namespace App\Http\Controllers\Auth;

// use App\Models\User;
// use Illuminate\View\View;
// use Illuminate\Http\Request;
// use Illuminate\Validation\Rules;
// use App\Http\Controllers\Controller;
// use App\Repositories\UserRepository;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Auth\Events\Registered;
// use App\Providers\RouteServiceProvider;

// class RegisteredUserController extends Controller
// {
//     private $userRepository;
//     //

//     public function __construct(UserRepository $UserRepository)
//     {
//         $this->userRepository = $UserRepository;
//     }


/**
     * Display the registration view.
     */
    // public function create()
    // {
    //     // return 'eloo';
    //     return view('members.create');
    // }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
            
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'member' => ['required', 'string']
        
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'member' => $request->role,
    //         'password' => Hash::make($request->password),
            
    //     ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    // }
      
  
       /**
     * Display a listing of the Project.
     */



//     public function index(Request $request)
//     {
//         $query = $request->input('query');
//         $members = $this->userRepository->paginate($query);
    
//         if ($request->ajax()) {
//             return view('members.membersTablePartial')->with('members', $members);
//         } 
    
//         return view('members.index')->with('members', $members);
//     }

//     public function destroy($id)
// {
//     User::find($id)->delete();
//     return redirect()->route('members.index')->with('success', 'ce membre deleted successfully');

// }





// } 
