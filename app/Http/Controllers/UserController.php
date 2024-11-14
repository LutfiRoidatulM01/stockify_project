<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = User::all(); // Mengambil semua data user
        return view('pages.admin.users.index', compact('users')); // Mengirim data ke view
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|string|in:admin,manajer_gudang,staff_gudang',
        ]);

        $userData = $request->only(['name', 'email', 'password', 'role']);
        $user = $this->userService->createUser($userData);

        return $user ? redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!')
            : redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan user.');
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
    public function edit(string $id)
    {
        $user = $this->userService->getUserById($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string|in:admin,manajer_gudang,staff_gudang',
        ]);

        $userData = $request->only(['name', 'email', 'role']);
        $updated = $this->userService->updateUser($id, $userData);

        return $updated ? redirect()->route('users.index')->with('success', 'User berhasil diperbarui!')
            : redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui user.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = $this->userService->deleteUser($id);
        return $deleted ? redirect()->route('users.index')->with('success', 'User berhasil dihapus!')
            : redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus user.');
    }
}
