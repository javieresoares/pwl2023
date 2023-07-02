<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UserManagementController extends BaseController
{
    public function index()
{
    // Periksa apakah pengguna memiliki role admin
    if (session()->get('role') !== 'Admin') {
        return redirect()->back()->with('error', 'Unauthorized access');
    }

    // Logika untuk manajemen pengguna
    // ...

    // Tampilkan view manajemen pengguna
    return view('user_management_view');
}

}
