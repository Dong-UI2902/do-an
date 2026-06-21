<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Country;
use App\Models\User;
use FFI\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function create()
    {
        $countries = Country::all();

        return view('frontend.register', compact('countries'));
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        $image = $this->prepareAvatar($request, $data);

        try {
            if (!User::create($data)) {
                throw new Exception('Register failed.');
            }

            if ($image) {
                $image['file']->move(public_path(User::PATH_AVATAR), $image['fileName']);
            };

            return back()->with('success', 'Register successfully');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    private function prepareAvatar(RegisterRequest $request, array &$data): ?array
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            $fileName = time() . '_' . Str::random(10) . '_' . $file->getClientOriginalName();
            $data['avatar'] = User::PATH_AVATAR . $fileName;

            return [
                'file' => $file,
                'fileName' => $fileName
            ];
        }

        return null;
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $remember = $request->has('remember');

        if (Auth::attempt($data, $remember)) {

            // $request->session()->regenerate();

            return redirect('/');
        }

        return back()->with('error', 'Email or password is not correct');
    }
}
