<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Company;


class AdminController extends Controller
{

    public function login(){
        return view('admin.login');
    }
    public function loginpost(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        return redirect()->intended(route('admin.index'));
    }

    return redirect()->route('admin.login')->with('error', 'Login failed');
}
    public function index()
    {
        if (Auth::guard('admin')->user()->role == 'admin'){
            return view('admin.admin');
        }
        else{
            return view('admin.super');
        }
 
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }


    public function UserIndex(){

        $users = User::orderBy('id', 'desc')->get(); // Ascending order
        return view('admin.user', ['users'=>$users]);
    }

    public function UserStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email', // Ensure the email is valid
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
            'gender' => 'required',
            'phone_number' => 'required',
            'cpassword' => 'required|same:password',
            'img' => 'nullable|image|mimes:jpg,png,jpeg|max:10240', // Validate the image file
            'bio' => 'nullable',
        ]);
    
        // Handle the image upload
        $filename = 'profile.png';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
    
            // Save the file in the 'public/uploads/user' directory
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/user'), $filename); // Save to the public folder
        }
      
    
        // Create and save the user
        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->img = $filename ? 'uploads/user/' . $filename : null; // Save the relative path
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->phone_number = $request->phone_number;
        
        $user->save();
    
        return redirect()->route('admin.user')->with('success', 'User created successfully!');
    }

   
    public function UserProfile(int $id){
        $users=User::findOrFail($id);
        return view('admin.userprofile', ['users'=>$users]);
    }
    
    public function UserUpdate(Request $request)
        {
            // Validate incoming data
            $validatedData = $request->validate([
                'id' => 'required|exists:users,id',
                'name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $request->id,
                'title' => 'nullable|string|max:255',
                'cv' => 'nullable|string|max:255',
                'education' => 'nullable',
                'experince' => 'nullable|string|max:255',
                'specalaization' => 'nullable|string|max:255',
                'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'phone_number' => 'nullable|string|max:20',
                'gender' => 'nullable|in:male,female',
                'bio' => 'nullable|string|max:1000',
            ]);


        
            // Retrieve the user
            $user = User::findOrFail($request->id);


           if ($request->hasFile('img')) {
        // Delete the old image if it exists and is not the default profile picture
            if ($user->img && $user->img !== 'profile.png' && file_exists(public_path('uploads/user/' . $user->img))) {
                unlink(public_path('uploads/user/' . $user->img));
            }

        // Upload the new image
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/user'), $filename);

        // Assign the new image filename to the user
        $user->img ='uploads/user/'.$filename;
        } elseif (!$user->img) {
            // If no image uploaded and no existing image, assign default profile picture
            $user->img = 'uploads/user/profile.png';
        }

        
        
            // Update other user details
            $user->name = $validatedData['name'];
            $user->last_name = $validatedData['last_name'];
            $user->email = $validatedData['email'];
            $user->title = $validatedData['title'];
            $user->cv = $validatedData['cv'];
            $user->education= $validatedData['education'];
            $user->experince = $validatedData['experince'];
            $user->specalaization = $validatedData['specalaization'];
            $user->phone_number = $validatedData['phone_number'];
            $user->gender = $validatedData['gender'];
            $user->bio = $validatedData['bio'];
        
        
            // Save updated data
            $user->save();
        
            // Redirect back with success message
            return redirect()->route('admin.userprofile', $user->id)
                ->with('success', 'User profile updated successfully.');
        }
            
        public function UserDelete(int $id){
            
                $user=User::where('id','=',$id)->first();
                 $user->delete();
                 return redirect()->route('admin.user', $user->id)
                ->with('success', 'User profile updated successfully.');
               
            }


            // ****************************8
            public function CompanyIndex(){
                $companies =Company::orderBy('id', 'desc')->get(); // Ascending order
                return view('admin.company', ['companies'=>$companies]);
                
            }
            public function CompanyStore(Request $request){
                $request->validate([
                    'name' => 'required|string|max:255',
                    'category'=>'required',
                    'email' => 'required|email|max:255|unique:users,email,' . $request->id,
                    'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
                    'cpassword' => 'required|same:password',
                    'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                    'address' => 'required|string|max:255',
                    'business_license' => 'required|string|max:255',
                ]);

                $filename = 'profile.png';
                if ($request->hasFile('img')) {
                    $file = $request->file('img');
            
                    // Save the file in the 'public/uploads/user' directory
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/company'), $filename); // Save to the public folder
                }
              



                $company = new Company();
                $company->name = $request->name;
                $company->category = $request->category;
                $company->email = $request->email;
                $company->password =bcrypt($request->password);
                $company->address = $request->address;
                $company->business_license = $request->business_license;
                $company->img = $filename ? 'uploads/company/' . $filename : null; // Save the relative path
                $company->save();
                return redirect()->route('admin.company')
                ->with('success', 'company added successfully.');
            }

            public function CompanyProfile(int $id){
                $company=Company::where('id','=',$id)->first();
                return view('admin.companyprofile',compact('company'));
            }


            
            
           
        






    public function company(){
        return view('admin.company');
    }
}
