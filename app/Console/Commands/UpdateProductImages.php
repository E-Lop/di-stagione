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
    protected $description = 'Update product images to use local asset paths';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Updating product images...');

        $imageMap = [
            // Frutta - Local Assets
            'Arance' => '/images/products/arance.jpg',
            'Mele' => '/images/products/mele.jpg',
            'Fragole' => '/images/products/fragole.jpg',
            'Ciliegie' => '/images/products/ciliegie.jpg',
            'Pesche' => '/images/products/pesche.jpg',
            'Albicocche' => '/images/products/albicocche.jpg',
            'Uva' => '/images/products/uva.jpg',
            'Pere' => '/images/products/pere.jpg',
            'Mandarini' => '/images/products/mandarini.jpg',
            'Melone' => '/images/products/melone.jpg',
            'Anguria' => '/images/products/anguria.jpg',
            'Fichi' => '/images/products/fichi.jpg',

            // Verdura - Local Assets
            'Pomodori' => '/images/products/pomodori.jpg',
            'Zucchine' => '/images/products/zucchine.jpg',
            'Melanzane' => '/images/products/melanzane.jpg',
            'Peperoni' => '/images/products/peperoni.jpg',
            'Lattuga' => '/images/products/lattuga.jpg',
            'Spinaci' => '/images/products/spinaci.jpg',
            'Cavolfiore' => '/images/products/cavolfiore.jpg',
            'Broccoli' => '/images/products/broccoli.jpg',
            'Carciofi' => '/images/products/carciofi.jpg',
            'Asparagi' => '/images/products/asparagi.jpg',
            'Fagiolini' => '/images/products/fagiolini.jpg',
            'Zucca' => '/images/products/zucca.jpg',
            'Radicchio' => '/images/products/radicchio.jpg',
            'Finocchi' => '/images/products/finocchi.jpg',
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
