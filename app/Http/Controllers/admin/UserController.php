<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ActivityLogHelper;
use App\Services\admin\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        $users = User::paginate(10);
        return view('pages.admin.users', compact('users')); // Mengirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.show', compact('users'));
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
        ActivityLogHelper::log('Menambahkan user baru');
        return $user ? redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!')
            : redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan user.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userService->getUserById($id);
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Users not found.');
        }
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $result = $this->userService->updateUser($id, $request->all());

        if (isset($result['errors'])) {
            return redirect()->back()->withErrors($result['errors'])->withInput();
        }


        ActivityLogHelper::log('Mengubah data users');
        return redirect()->route('users.index')->with('success', 'Users updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        ActivityLogHelper::log('Menghapus data users');
        return redirect()->route('users.index')->with('success', 'Users deleted successfully.');
    }
}
