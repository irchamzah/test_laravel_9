<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $accounts = Account::all();
        return view('akun.index', compact('accounts'));
    }

    public function create()
    {
        return view('akun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:accounts|max:45',
            'password' => 'required|min:6',
            'name' => 'required|max:45',
            'role' => 'required|max:45',
        ]);

        Account::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'role' => $request->role,
        ]);

        return redirect('/akun')
            ->with('success', 'Account created successfully.');
    }

    public function show($username)
    {
        $account = Account::find($username);
        return view('akun.show', compact('account'));
    }

    public function edit($username)
    {
        $account = Account::find($username);
        return view('akun.edit', compact('account'));
    }

    public function update(Request $request, $username)
    {
        $request->validate([
            'password' => 'nullable|min:6',
            'name' => 'required|max:45',
            'role' => 'required|max:45',
        ]);

        $account = Account::find($username);

        if ($request->filled('password')) {
            $account->password = Hash::make($request->password);
        }

        $account->name = $request->name;
        $account->role = $request->role;
        $account->save();

        return redirect('/akun')
            ->with('success', 'Account updated successfully.');
    }

    public function destroy($username)
    {
        $account = Account::find($username);
        $account->delete();

        return redirect('/akun')
            ->with('success', 'Account deleted successfully.');
    }
}
