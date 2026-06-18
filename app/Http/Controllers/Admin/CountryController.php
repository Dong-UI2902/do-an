<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Exception;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $countries = Country::all();

        return view('admin.country.list', compact('countries'));
    }

    public function create()
    {
        return view('admin.country.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);

        try {
            Country::create($validatedData);

            return back()->with('success', 'Country created successfully');
        } catch (Exception $e) {
            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function destroy(int $id)
    {
        try {
            $country = Country::findOrFail($id);
            $country->delete();

            return back()->with('success', 'Country deleted');
        } catch (Exception $e) {
            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }
}
