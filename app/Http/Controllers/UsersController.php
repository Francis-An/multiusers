<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\UserType;
use App\Models\User;
use App\Models\Medicine;
use App\Models\OrderMedicine;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::where('role', '=','user')->get();
        $orders = OrderMedicine::all();
        
        // dd($pharmacies);
        return view('user.all_users',[
            'users' => $users,
            'orders' => $orders,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       if(Gate::allows('isAdmin') ? Response::allow() :abort(403)){
            return view('admin.resgister_pharmacy');
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'owner_name' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'string|min:10',
            'liscence' => 'required',
            'founded' => 'date',
            'phone' => 'required|numeric|min:10',
            'bio' => 'string|min:20',
            'region' => 'required',
            'city' => 'required',
            // 'postal_code' => 'required|string|min:8',
        
        ]);

        $pharmacy = User::create([
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
            'role' => 'pharma',
            'password' => Hash::make($request->input('password')),
            // Additional information
            'owner_name' => $request->input('owner_name'),
            // 'profile_image' => $request->input('profile_image'),
            // 'cover_image' => $request->input('cover_image'),
            // 'address' => $request->input('address'),
            'liscence' => $request->input('liscence'),
            // 'founded' => $request->input('founded'),
            'phone' => $request->input('phone'),
            // 'bio' => $request->input('bio'),
            'region' => $request->input('region'),
            'city' => $request->input('city'),
            // 'postal_code' => $request->input('postal_code'),
        ]);
        // dd($pharmacy);
        return redirect()->back()->with('success', 'Pharmacy is add sucessfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        // if(Auth::user()){
            // if(Gate::allows('isPharma') ){
                $pharmacy = User::find($id);
                return view('pharmacy.pharmacy_profile', [
                    'pharmacy' => $pharmacy,
                ]);
            // }elseif(Gate::allows('isAdmin')){
            
                // return 'Hello Admin';
            // }
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::allows('isPharma') ? Response::allow() :abort(403)){
            $pharmacy = User::find($id);
            // dd($pharmacy->name);
            return view('pharmacy.forms.update_pharma_profile_form', [
                'pharmacy' => $pharmacy,
            ]);
        }elseif(Gate::allows('isUser') ? Response::allow() :abort(403)){
            return view();
        }elseif(Gate::allows('isAdmin') ? Response::allow() :abort(403)){
            return view();
        }
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
        // $request->validate([
        //     // 'name' => 'string|max:255',
            // 'email' => 'unique:users',
        //     // 'password' => 'required|string|min:8|confirmed',
        //     // 'address' => 'string|min:10',
        //     // 'liscence' => 'required',
        //     // 'founded' => 'date',
        //     // 'phone' => 'numeric|min:10',
        //     // 'bio' => 'string|min:20',
        //     // 'region' => 'required',
        //     // 'city' => 'required',
        //     // 'postal_code' => 'string|min:8',
        //     // 'cover_image' => 'required',
            
        // ]);

        
        if ($request->has('profile_image')){
            //Profile image 
        $profile_image = time() . '-'. $request->input('profile_image') . '.'.
        $request->profile_image->extension();
        $request->profile_image->move(public_path('images'), $profile_image);

        $user = User::where('id',$id) 
            ->update([
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
            // Additional information
            'owner_name' => $request->input('owner_name'),
            'profile_image' => $profile_image,
            // 'cover_image' => $cover_image,
            'address' => $request->input('address'),
            'liscence' => $request->file('liscence'),
            'founded' => $request->input('founded'),
            'phone' => $request->input('phone'),
            'bio' => $request->input('bio'),
            'region' => $request->input('region'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
        ]);
        return redirect()->back()->with('success', 'Profile image is sucessfull updated');
        
        }
        elseif ($request->has('cover_image')){
            //Profile image 
            $cover_image = time() . '-'. $request->input('cover_image') . '.'.
            $request->cover_image->extension();
            $request->cover_image->move(public_path('images'), $cover_image);

        $user = User::where('id',$id) 
            ->update([
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
            // Additional information
            'owner_name' => $request->input('owner_name'),
            // 'profile_image' => $profile_image,
            'cover_image' => $cover_image,
            'address' => $request->input('address'),
            'liscence' => $request->file('liscence'),
            'founded' => $request->input('founded'),
            'phone' => $request->input('phone'),
            'bio' => $request->input('bio'),
            'region' => $request->input('region'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
        ]);
        return redirect()->back()->with('success', 'Cover image is sucessfull updated');
        
    }
    // elseif($request->has('cover_image') && $request->has('profile_image')) {

        
    //             //  Cover image
    //     $cover_image = time() . '-' . $request->input('cover_image') . '.'.
    //     $request->cover_image->extension();
    //     $request->cover_image->move(public_path('images'), $cover_image);
    //     // dd($cover_image);
        
    //     //Profile image 
    //     $profile_image = time() . '-'. $request->input('profile_image') . '.'.
    //     $request->profile_image->extension();
    //     $request->profile_image->move(public_path('images'), $profile_image);
    //     // dd($coverImage);


    //     $user = User::where('id',$id) 
    //         ->update([
    //         'name'  => $request->input('name'),
    //         'email' => $request->input('email'),
    //         // Additional information
    //         'owner_name' => $request->input('owner_name'),
    //         'profile_image' => $profile_image,
    //         'cover_image' => $cover_image,
    //         'address' => $request->input('address'),
    //         'liscence' => $request->file('liscence'),
    //         'founded' => $request->input('founded'),
    //         'phone' => $request->input('phone'),
    //         'bio' => $request->input('bio'),
    //         'region' => $request->input('region'),
    //         'city' => $request->input('city'),
    //         'postal_code' => $request->input('postal_code'),
    //     ]);
    //     // dd($pharmacy);
    //     return redirect()->back()->with('success', 'Pharmacy images sucessfull updated');
    // }

        $user = User::where('id',$id) 
            ->update([
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
            // Additional information
            'owner_name' => $request->input('owner_name'),
            // 'profile_image' => $profile_image,
            // 'cover_image' => $cover_image,
            'address' => $request->input('address'),
            'liscence' => $request->file('liscence'),
            'founded' => $request->input('founded'),
            'phone' => $request->input('phone'),
            'bio' => $request->input('bio'),
            'region' => $request->input('region'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
        ]);
        // dd($pharmacy);
        return redirect()->back()->with('success', 'Pharmacy information sucessfull updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
         if(Gate::allows('isAdmin') ? Response::allow() :abort(403)){
           $user->delete();
        }
        return redirect()->back()->with('success', 'user '.$user->name . ' has been deleted successfully');
    }

    public function createPharmacy(Request $request){
        
    }

    
}
