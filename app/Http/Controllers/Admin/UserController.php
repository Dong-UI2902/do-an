<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Country;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        $countries = Country::orderBy('name', 'asc')->get();

        return view('admin.profile', compact('user', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request)
    {
        $data = $request->validated();

        $this->handlePasswordUpdate($data);

        unset($data['email']);

        $avatar = $this->prepareAvatar($request, $data);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        try {
            if (!$user->update($data)) {
                throw new Exception('Database update failed.');
            }

            if ($avatar) {
                $avatar['file']->move(public_path(User::PATH_AVATAR), $avatar['fileName']);
            }

            return redirect()->back()->with('success', 'Profile updated successfully!');
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function handlePasswordUpdate(array &$data): void
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
    }

    private function prepareAvatar(UpdateProfileRequest $request, array &$data): ?array
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
}
