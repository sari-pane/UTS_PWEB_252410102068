<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('login');
    }

    // Memproses Login
    public function authenticate(Request $request)
    {
        $nama = $request->input('username');
        $username = $request->input('username');

        return redirect()->route('dashboard', [
            'nama' => $nama,
            'username' => $username
        ]);
    }

    // Menyediakan data seluruh makanan
    private function getFoods()
    {
        $foods = [
            [
                'nama' => 'Susu UHT',
                'kategori' => 'Minuman',
                'jumlah' => 2,
                'satuan' => 'Kotak',
                'tanggal_kedaluwarsa' => '2026-11-15',
                'status' => 'Tersedia',
                'gambar' => 'susu.jpg'
            ],
            [
                'nama' => 'Roti Tawar',
                'kategori' => 'Roti',
                'jumlah' => 1,
                'satuan' => 'Bungkus',
                'tanggal_kedaluwarsa' => '2026-11-10',
                'status' => 'Segera Habis',
                'gambar' => 'roti tawar.jpg'
            ],
            [
                'nama' => 'Telur',
                'kategori' => 'Bahan Pokok',
                'jumlah' => 6,
                'satuan' => 'Butir',
                'tanggal_kedaluwarsa' => '2026-11-20',
                'status' => 'Tersedia',
                'gambar' => 'telur.jpg'
            ],
            [
                'nama' => 'Yoghurt',
                'kategori' => 'Olahan Susu',
                'jumlah' => 0,
                'satuan' => 'Cup',
                'tanggal_kedaluwarsa' => '2026-11-06',
                'status' => 'Habis',
                'gambar' => 'yogurt.jpg'
            ]
        ];

        // Memeriksa tanggal kedaluwarsa makanan
        $today = date('Y-m-d');
        $limitDate = date('Y-m-d', strtotime('+7 days'));

        foreach ($foods as $key => $food) {

            if ($food['tanggal_kedaluwarsa'] < $today) {
                $foods[$key]['status_kedaluwarsa'] = 'Sudah Kedaluwarsa';
            } elseif ($food['tanggal_kedaluwarsa'] <= $limitDate) {
                $foods[$key]['status_kedaluwarsa'] = 'Segera Kedaluwarsa';
            } else {
                $foods[$key]['status_kedaluwarsa'] = 'Masih Aman';
            }

        }

        return $foods;
    }

    // Menampilkan halaman Beranda
    public function dashboard(Request $request)
    {
        $nama = $request->input('nama');
        $username = $request->input('username');

        // Mengambil data makanan
        $foods = $this->getFoods();

        // Menghitung ringkasan persediaan
        $totalFoods = count($foods);
        $availableFoods = 0;
        $needAttention = 0;

        foreach ($foods as $food) {

            if ($food['status'] == 'Tersedia') {
                $availableFoods++;
            }

            if (
                $food['status'] != 'Tersedia' ||
                $food['status_kedaluwarsa'] != 'Masih Aman'
            ) {
                $needAttention++;
            }

        }

        $overview = [
            [
                'title' => 'Jumlah Jenis Makanan',
                'total' => $totalFoods,
                'description' => 'Berbagai jenis makanan di penyimpanan'
            ],
            [
                'title' => 'Stok Tersedia',
                'total' => $availableFoods,
                'description' => 'Makanan yang masih tersedia'
            ],
            [
                'title' => 'Perlu Diperhatikan',
                'total' => $needAttention,
                'description' => 'Makanan yang perlu segera diperiksa'
            ]
        ];

        // Mengumpulkan makanan yang perlu diperhatikan
        $attentionFoods = [];

        foreach ($foods as $food) {

            if (
                $food['status'] != 'Tersedia' ||
                $food['status_kedaluwarsa'] != 'Masih Aman'
            ) {
                $attentionFoods[] = $food;
            }

        }

        // Data tambahan untuk tampilan Dashboard
        $today = date('j');
        $month = date('F Y');

        $quote = 'Take care of what you have, one little thing at a time.';

        $reminder = 'Periksa persediaan makanan dan tanggal kedaluwarsanya hari ini.';

        return view('dashboard', compact(
            'nama',
            'username',
            'overview',
            'attentionFoods',
            'today',
            'month',
            'quote',
            'reminder'
        ));
    }

    // Menampilkan halaman Pengelolaan
    public function pengelolaan(Request $request)
    {
        $nama = $request->input('nama');
        $username = $request->input('username');

        // Mengambil data makanan
        $foods = $this->getFoods();

        return view('pengelolaan', compact(
            'nama',
            'username',
            'foods'
        ));
    }

    // Menampilkan halaman Profil
    public function profile(Request $request)
    {
        $nama = $request->input('nama');
        $username = $request->input('username');

        return view('profile', compact(
            'nama',
            'username'
        ));
    }
}
