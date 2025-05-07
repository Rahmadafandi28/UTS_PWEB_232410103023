<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    // Data login statis
    private static $validCredentials = [
        'email' => 'pweb@gmail.com',
        'password' => '123',
        'name' => 'Afan'
    ];

    public static function getCredentials()
    {
        return self::$validCredentials;
    }

    public function login()
    {
        // Jika sudah login, redirect ke dashboard
        if (Session::get('authenticated')) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function dashboard()
    {
        // Cek session login
        if (!Session::get('authenticated')) {
            return redirect()->route('login')->with('error', 'Please login first');
        }
        return view('dashboard');
    }

    // Proses login
    public function authenticate(Request $request)
    {
        $credentials = self::$validCredentials;

        if ($request->email === $credentials['email'] &&
            $request->password === $credentials['password']) {

            // Simpan data user di session
            $request->session()->put([
                'authenticated' => true,
                'user_email' => $credentials['email'],
                'user_name' => $credentials['name']
            ]);

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ])->onlyInput('email');
    }

    // Proses logout
    public function logout(Request $request)
    {
        // Hapus semua data session
        $request->session()->flush();
        return redirect()->route('login')->with('success', 'berhasil log out');
    }

    public function pengelolaan()
    { 
        $dataSampah = [
            [
                'kategori' => 'Organik',
                'contoh' => 'Sisa makanan',
                'pemilahan' => [
                    'Pisahkan dari kemasan plastik',
                    'Keringkan sebelum dibuang'
                ],
                'tempat' => 'Komposter Rumah Tangga',
                'color' => 'success'
            ],
            [
                'kategori' => 'Anorganik',
                'contoh' => 'kaleng',
                'pemilahan' => [
                    'Cuci hingga bersih',
                    'Keringkan dan geprek'
                ],
                'tempat' => 'Bank Sampah Terdekat',
                'color' => 'primary'
            ],
            [
                'kategori' => 'B3',
                'contoh' => 'Baterai',
                'pemilahan' => [
                    'Jangan dibongkar',
                    'Simpan dalam wadah kedap'
                ],
                'tempat' => 'Dropbox B3 Khusus',
                'color' => 'danger'
            ],
            [
                'kategori' => 'Organik',
                'contoh' => 'ranting',
                'pemilahan' => [
                    'Campur dengan sekam',
                    'Hindari daging/belerang'
                ],
                'tempat' => 'TPST Organik',
                'color' => 'success'
            ]
        ];

        return view('pengelolaan', compact('dataSampah'));
    }

    public function profile()
    {
        // Data diri Anda
        $profile = [
            'alamat' => 'Jember, Indonesia',
            'tanggal_lahir' => '28-02-2004',
            'Fakultas' => 'Ilmu Komputer',
            'Jurusan' => 'Informatika',
            'Angkatan' => '2023',
            'Mata Kuliah' => 'Pemrograman Berbasis Website',
            'Kelas' => 'C',
            'motivasi' => 'Ingin berkontribusi untuk lingkungan yang lebih bersih',
        ];
        
        return view('profile', ['profile' => $profile]);
    }
}
