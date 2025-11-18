database/seeders/DatabaseSeeder.php

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class, // Ini akan membuat role 'admin' dan 'user'
        ]);
        
        User::factory()->create([
            'name' => 'Admin Utama',
            'email' => 'admin@email.com',
            'password' => 'FoodBlogSec1',
        ])->assignRole('admin'); 
}