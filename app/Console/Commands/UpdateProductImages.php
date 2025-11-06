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
            // Frutta - Wikimedia Commons
            'Arance' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Orange-Fruit-Pieces.jpg/400px-Orange-Fruit-Pieces.jpg',
            'Mele' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Red_Apple.jpg/400px-Red_Apple.jpg',
            'Fragole' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/PerfectStrawberry.jpg/400px-PerfectStrawberry.jpg',
            'Ciliegie' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Cherry_Stella444.jpg/400px-Cherry_Stella444.jpg',
            'Pesche' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Autumn_Red_peaches.jpg/400px-Autumn_Red_peaches.jpg',
            'Albicocche' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Apricots.jpg/400px-Apricots.jpg',
            'Uva' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Kyoho-grape.jpg/400px-Kyoho-grape.jpg',
            'Pere' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Pears.jpg/400px-Pears.jpg',
            'Mandarini' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/Mandarin_Oranges_%28Citrus_Reticulata%29.jpg/400px-Mandarin_Oranges_%28Citrus_Reticulata%29.jpg',
            'Melone' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Cantaloupes.jpg/400px-Cantaloupes.jpg',
            'Anguria' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/47/Taiwan_2009_Tainan_City_Organic_Farm_Watermelon_FRD_7962.jpg/400px-Taiwan_2009_Tainan_City_Organic_Farm_Watermelon_FRD_7962.jpg',
            'Fichi' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Figs.jpg/400px-Figs.jpg',

            // Verdura - Wikimedia Commons
            'Pomodori' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Tomato_je.jpg/400px-Tomato_je.jpg',
            'Zucchine' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Courgette_J1.JPG/400px-Courgette_J1.JPG',
            'Melanzane' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Solanum_melongena_24_08_2012_%281%29.JPG/400px-Solanum_melongena_24_08_2012_%281%29.JPG',
            'Peperoni' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Green-Red-Orange-Bell-Pepper-Selection.jpg/400px-Green-Red-Orange-Bell-Pepper-Selection.jpg',
            'Insalata' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Lactuca_sativa_-_butterhead_lettuce.jpg/400px-Lactuca_sativa_-_butterhead_lettuce.jpg',
            'Spinaci' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/Spinach_bunch.jpg/400px-Spinach_bunch.jpg',
            'Cavolfiore' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Cauliflower.JPG/400px-Cauliflower.JPG',
            'Broccoli' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Broccoli_DSC00862.png/400px-Broccoli_DSC00862.png',
            'Carciofi' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Artichoke_J1.jpg/400px-Artichoke_J1.jpg',
            'Asparagi' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Asparagus-Bundle.jpg/400px-Asparagus-Bundle.jpg',
            'Fagiolini' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/ARS_lima_beans.jpg/400px-ARS_lima_beans.jpg',
            'Zucca' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Calabaza_Butternut.jpg/400px-Calabaza_Butternut.jpg',
            'Radicchio' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Radicchio_di_Treviso.jpg/400px-Radicchio_di_Treviso.jpg',
            'Finocchi' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7d/Foeniculum_vulgare_Florence_Fennel.jpg/400px-Foeniculum_vulgare_Florence_Fennel.jpg',
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
