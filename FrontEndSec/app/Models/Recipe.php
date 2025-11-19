<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class Recipe extends Model
{
    use HasFactory;

    // Jika nama tabel di database kamu bukan 'recipes', hapus tanda komentar di bawah dan sesuaikan:
    // protected $table = 'tabel_resep_saya';

    protected $guarded = [];

    /**
     * Logika Rekomendasi Mingguan
     * Fungsi ini bisa dipanggil dengan: Recipe::getWeeklyRecommendations();
     */
    public static function getWeeklyRecommendations($limit = 2)
    {
        // 1. Tentukan waktu kadaluarsa (Senin depan jam 00:00)
        $expiresAt = Carbon::now()->next(Carbon::MONDAY)->startOfDay();
        
        // 2. Buat nama kunci unik untuk cache (misal: weekly_picks_2023_45)
        $week = Carbon::now()->weekOfYear;
        $year = Carbon::now()->year;
        $key = "weekly_picks_{$year}_{$week}";

        // 3. Ambil data (Cek Cache dulu, kalau kosong baru ambil dari Database)
        return Cache::remember($key, $expiresAt, function () use ($limit) {
            
            // LOGIKA PENGAMBILAN DATA DARI DATABASE
            return self::query()
                // ->where('is_active', true) // Aktifkan baris ini jika tabelmu punya kolom 'is_active'
                ->inRandomOrder()          // Mengambil secara acak
                ->limit($limit)            // Batasi jumlah (misal 2)
                ->get();
                
        });
    }
}