<?php

namespace App\Http\Controllers;

use App\Models\kontribusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use ReturnTypeWillChange;

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
        // $dataSampah = [
        //     [
        //         'kategori' => 'Organik',
        //         'contoh' => 'Sisa makanan',
        //         'pemilahan' => [
        //             'Pisahkan dari kemasan plastik',
        //             'Keringkan sebelum dibuang'
        //         ],
        //         'tempat' => 'Komposter Rumah Tangga',
        //         'color' => 'success'
        //     ],
        //     [
        //         'kategori' => 'Anorganik',
        //         'contoh' => 'kaleng',
        //         'pemilahan' => [
        //             'Cuci hingga bersih',
        //             'Keringkan dan geprek'
        //         ],
        //         'tempat' => 'Bank Sampah Terdekat',
        //         'color' => 'primary'
        //     ],
        //     [
        //         'kategori' => 'B3',
        //         'contoh' => 'Baterai',
        //         'pemilahan' => [
        //             'Jangan dibongkar',
        //             'Simpan dalam wadah kedap'
        //         ],
        //         'tempat' => 'Dropbox B3 Khusus',
        //         'color' => 'danger'
        //     ],
        //     [
        //         'kategori' => 'Organik',
        //         'contoh' => 'ranting',
        //         'pemilahan' => [
        //             'Campur dengan sekam',
        //             'Hindari daging/belerang'
        //         ],
        //         'tempat' => 'TPST Organik',
        //         'color' => 'success'
        //     ]
        // ];

        $kontribusi = Kontribusi::get();
        return view('pengelolaan', compact('kontribusi'));
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

    public function tambah_data()
    {
        return view('tambah');
    }

    public function submit(Request $request)
    {
        $kontribusi = new Kontribusi();
        
        $kontribusi->Kategori = $request->Kategori;
        $kontribusi->Contoh_Barang = $request->Contoh_Barang;
        $kontribusi->Cara_Pemilahan = $request->Cara_Pemilahan;
        $kontribusi->Tempat_Pembuangan = $request->Tempat_Pembuangan;
        
        $kontribusi->save();
        
        return redirect()->route('pengelolaan')->with('success', 'Data berhasil disimpan!');
    }

    public function edit ($id)
    {
        $kontribusi = Kontribusi ::find($id);
        return view('edit', compact('kontribusi'));
    }

    public function update (Request $request, $id) {
        $kontribusi = kontribusi :: find($id);
        $kontribusi->Kategori = $request->Kategori;
        $kontribusi->Contoh_Barang = $request->Contoh_Barang;
        $kontribusi->Cara_Pemilahan = $request->Cara_Pemilahan;
        $kontribusi->Tempat_Pembuangan = $request->Tempat_Pembuangan;
        
        $kontribusi->update();
        
        return redirect()->route('pengelolaan');
    }

    public function delete($id) {
        $kontribusi = kontribusi::find($id);
        $kontribusi->delete();
        return redirect() -> route('pengelolaan');
    }
}
