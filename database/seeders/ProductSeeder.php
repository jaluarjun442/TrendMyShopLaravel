<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Get existing category IDs (from CategorySeeder)
        $categories = Category::pluck('id')->toArray();

        if (empty($categories)) {
            $this->command->warn('No categories found. Run CategorySeeder first.');
            return;
        }

        // Simple list of dummy images you will upload later
        $imageFiles = [
            '20251122121346_250015.png',
            '20251122121102_889556.jpg',
            '20251122120934_366403.jpg'
        ];

        for ($i = 1; $i <= 100; $i++) {
            $categoryId = $categories[array_rand($categories)];
            $imageFile  = $imageFiles[array_rand($imageFiles)];

            Product::create([
                'aff_link'       => 'https://www.amazon.in/dp/B00000' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'name'           => 'Sample Product ' . $i,
                'description'    => 'This is a sample description for product ' . $i . '.',
                'sku'            => 'SKU' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'image'          => $imageFile,       // just file name, matches your Resource logic
                'price'          => rand(500, 2000),  // random price
                'discount_price' => rand(300, 1500),  // random discount
                'category_id'    => $categoryId,
                'status'         => 1,
                'is_trend'       => rand(0, 1),       // random trending
                'created_by'     => null,
                'updated_by'     => null,
            ]);
        }
    }
}
