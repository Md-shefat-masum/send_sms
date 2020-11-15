<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('status', 1)->latest()->paginate(10);
        return view('admin.user_management.user.all_user', compact('users'));
    }

    public function profile(Request $request, $id)
    {
        $user = User::where('slug', $id)->firstOrFail();
        return view('admin.user_management.profile', compact('user'));
    }

    public function add(Request $request)
    {
        return view('admin.user_management.user.add');
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return view('admin.user_management.user.edit', compact('user'));
    }

    public function store(Request $request)
    {
        if (
            $request->name == '' ||
            $request->last_name == '' ||
            $request->email == '' ||
            $request->password == '' ||
            $request->confirm_password == '' ||
            $request->phone == ''
        ) {
            return response()->json([
                'error' => 'fill the required area',
                'name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'required',
                'confirm_password' => 'required',
            ]);
        }

        if (User::where('email', $request->email)->exists()) {
            return response()->json([
                'error' => 'This email already has been taken',
                'email' => 'This email already has been taken',
            ]);
        }

        if (User::where('phone', $request->phone)->exists()) {
            return response()->json([
                'error' => 'This phone number already has been taken',
                'phone' => 'This phone number already has been taken',
            ]);
        }

        if ($request->password !== $request->confirm_password) {
            return response()->json([
                'error' => 'Password dosen\'t matched try again',
            ]);
        }

        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->created_at = Carbon::now()->toDateTimeString();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $image = Image::make($file);

            $imageName = $user->slug . '_' . uniqid(12) . '.' . $file->getClientOriginalExtension();
            $user->photo = 'uploads/user/' . $imageName;

            $image->fit(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img_canvas = Image::canvas(200, 200);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(public_path('uploads/user/' . $imageName));
        }

        $user->save();
        $user->slug = Str::slug($request->name).$user->id;
        $user->save();

        $users = User::where('status', 1)->latest()->paginate(10);
        $table_view = View('admin.user_management.user.table_data', ['users' => $users])->render();

        return response()->json([
            'data' => $user,
            'table' => $table_view,
            'error' => null,
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);

        if ( $user->email != $request->email && User::where('email', $request->email)->exists()) {
            return response()->json([
                'error' => 'This email already has been taken',
                'email' => 'This email already has been taken',
            ]);
        }

        if ( $user->phone != $request->phone && User::where('phone', $request->phone)->exists()) {
            return response()->json([
                'error' => 'This phone number already has been taken',
                'phone' => 'This phone number already has been taken',
            ]);
        }

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->save();

        $users = User::where('status', 1)->latest()->paginate(10);
        $table_view = View('admin.user_management.user.table_data', ['users' => $users])->render();

        return response()->json([
            'data' => $user,
            'table' => $table_view,
            'error' => null,
        ]);
    }

    public function profile_update(Request $request)
    {
        if (
            $request->name == '' ||
            $request->last_name == '' ||
            $request->email == '' ||
            $request->phone == ''
        ) {
            return response()->json([
                'error' => 'fill the required area',
                'name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]);
        }

        $user = User::findOrFail($request->id);

        if ($user->name != $request->name) {
            $user->name = $request->name;
        }
        if ($user->last_name != $request->last_name) {
            $user->last_name = $request->last_name;
        }
        if ($user->email != $request->email) {
            if (User::where('email', $request->email)->exists()) {
                return response()->json([
                    'error' => 'this email has been already taken',
                ]);
            } else {
                $user->email = $request->email;
            }
        }
        if ($user->phone != $request->phone) {
            if (User::where('phone', $request->phone)->exists()) {
                return response()->json([
                    'error' => 'this phone number has been already taken',
                ]);
            } else {
                $user->phone = $request->phone;
            }
        }

        if (strlen($request->password) > 0 && strlen($request->confirm_password) > 0 ) {
            if (Hash::check($request->old_password, $user->password)) {
                if ($request->password == $request->confirm_password) {
                    $user->password = Hash::make($request->password);
                } else {
                    return response()->json([
                        'error' => 'Password does\'nt matched.',
                    ]);
                }

            }else{
                return response()->json([
                    'error' => 'Password incorrect.',
                ]);
            }
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $image = Image::make($file);

            $imageName = $user->slug . '_' . uniqid(12) . '.' . $file->getClientOriginalExtension();
            $user->photo = 'uploads/user/' . $imageName;

            $image->fit(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img_canvas = Image::canvas(200, 200);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(public_path('uploads/user/' . $imageName));
        }

        $user->save();

        return response()->json([
            'error' => null,
            'success' => 'information successfully updated.',
        ]);
    }

    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();
        return redirect()->back()->with('success', 'user deactivated successfully');
    }
}
