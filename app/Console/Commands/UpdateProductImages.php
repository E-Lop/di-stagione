<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class UpdateProductImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:update-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update product images with corrected URLs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Updating product images...');

        $imageMap = [
            'Arance' => 'https://images.unsplash.com/photo-1547514701-42782101795e?w=400&h=400&fit=crop',
            'Mele' => 'https://images.unsplash.com/photo-1568702846914-96b305d2aaeb?w=400&h=400&fit=crop',
            'Fragole' => 'https://images.unsplash.com/photo-1543528176-61b239494933?w=400&h=400&fit=crop',
            'Ciliegie' => 'https://images.unsplash.com/photo-1519368358672-25b03afee3bf?w=400&h=400&fit=crop',
            'Pesche' => 'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?w=400&h=400&fit=crop',
            'Albicocche' => 'https://images.unsplash.com/photo-1623065422902-30a2d299bbe4?w=400&h=400&fit=crop',
            'Uva' => 'https://images.unsplash.com/photo-1599819177152-4bde91602f17?w=400&h=400&fit=crop',
            'Pere' => 'https://images.unsplash.com/photo-1551915796-c5e2c1628b73?w=400&h=400&fit=crop',
            'Mandarini' => 'https://images.unsplash.com/photo-1482012490529-1d9baa948fa7?w=400&h=400&fit=crop',
            'Melone' => 'https://images.unsplash.com/photo-1595475207225-428b62bda831?w=400&h=400&fit=crop',
            'Anguria' => 'https://images.unsplash.com/photo-1587049352846-4a222e784359?w=400&h=400&fit=crop',
            'Fichi' => 'https://images.unsplash.com/photo-1579193558223-62aaa8f4c463?w=400&h=400&fit=crop',
            'Pomodori' => 'https://images.unsplash.com/photo-1546470427-227e9e2f2849?w=400&h=400&fit=crop',
            'Zucchine' => 'https://images.unsplash.com/photo-1566385101042-1a0aa0c1268c?w=400&h=400&fit=crop',
            'Melanzane' => 'https://images.unsplash.com/photo-1617478755490-e21232a5eeaf?w=400&h=400&fit=crop',
            'Peperoni' => 'https://images.unsplash.com/photo-1525607551316-4a8e16d1f9ba?w=400&h=400&fit=crop',
            'Insalata' => 'https://images.unsplash.com/photo-1540420773420-3366772f4999?w=400&h=400&fit=crop',
            'Spinaci' => 'https://images.unsplash.com/photo-1576045057995-568f588f82fb?w=400&h=400&fit=crop',
            'Cavolfiore' => 'https://images.unsplash.com/photo-1510627489930-0c1b0bfb6785?w=400&h=400&fit=crop',
            'Broccoli' => 'https://images.unsplash.com/photo-1459411621453-7b03977f4bfc?w=400&h=400&fit=crop',
            'Carciofi' => 'https://images.unsplash.com/photo-1614961762590-c2e6e8c28b52?w=400&h=400&fit=crop',
            'Asparagi' => 'https://images.unsplash.com/photo-1550689865-dd9e70a46a3c?w=400&h=400&fit=crop',
            'Fagiolini' => 'https://images.unsplash.com/photo-1584738766473-61c083514bf4?w=400&h=400&fit=crop',
            'Zucca' => 'https://images.unsplash.com/photo-1569976710208-b52636b52c09?w=400&h=400&fit=crop',
            'Radicchio' => 'https://images.unsplash.com/photo-1594282486552-05b4d80fbb9f?w=400&h=400&fit=crop',
            'Finocchi' => 'https://images.unsplash.com/photo-1574316071802-0d684efa7bf5?w=400&h=400&fit=crop',
        ];

        $updated = 0;
        $notFound = 0;

        foreach ($imageMap as $productName => $imageUrl) {
            $product = Product::where('name', $productName)->first();

            if ($product) {
                $product->image_url = $imageUrl;
                $product->save();
                $this->info("✓ Updated: {$productName}");
                $updated++;
            } else {
                $this->warn("✗ Not found: {$productName}");
                $notFound++;
            }
        }

        $this->newLine();
        $this->info("Total updated: {$updated}");
        if ($notFound > 0) {
            $this->warn("Total not found: {$notFound}");
        }
        $this->info('Done!');

        return Command::SUCCESS;
    }
}
