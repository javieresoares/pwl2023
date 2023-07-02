<?php

		namespace App\Controllers;

		use App\Models\userModel;

		class AuthController extends BaseController
		{
		    protected $user;

		    function __construct()
		    {
		        helper('form');
		        $this->user = new userModel();
		    }

		    public function login()
		    {
		        if ($this->request->getPost()) {
		            $username = $this->request->getVar('username');
		            $password = $this->request->getVar('password');

		            $dataUser = $this->user->where(['username' => $username])->first();

		            if ($dataUser) {
		                if (md5($password) == $dataUser['password']) {
		                    session()->set([
		                        'username' => $dataUser['username'],
		                        'role' => $dataUser['role'],
		                        'isLoggedIn' => TRUE
		                    ]);

		                    return redirect()->to(base_url('/'));
		                } else {
		                    session()->setFlashdata('failed', 'Username & Password Salah');
		                    return redirect()->back();
		                }
		            } else {
		                session()->setFlashdata('failed', 'Username Tidak Ditemukan');
		                return redirect()->back();
		            }
		        } else {
		            return view('login_view');
		        }
		    }

			public function register()
			{
				if ($this->request->getMethod() === 'post') {
					// Mendapatkan data yang dikirimkan oleh pengguna
					$username = $this->request->getPost('username');
					$password = $this->request->getPost('password');

					// Melakukan validasi data pengguna (jika diperlukan)

					// Menyiapkan data pengguna untuk disimpan ke database
					$data = [
						'username' => $username,
						'password' => md5($password), // Menggunakan fungsi md5() untuk mengenkripsi password
						'role' => 'user',
						'is_aktif' => true
					];
					
					// Menyimpan data pengguna ke dalam database menggunakan model
					$userModel = new UserModel();
					$userModel->insert($data);

					// Setelah pengguna berhasil mendaftar, Anda dapat melakukan tindakan lanjutan,
					// seperti menampilkan pesan sukses atau mengarahkan pengguna ke halaman tertentu

					return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
				} else {
					return view('register_view');
				}
			}


		    public function logout()
		    {
		        session()->destroy();
		        return redirect()->to('login');
		    }
		}