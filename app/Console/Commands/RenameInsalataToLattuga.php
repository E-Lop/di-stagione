<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class RenameInsalataToLattuga extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:rename-insalata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rename "Insalata" to "Lattuga" in the products table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Renaming "Insalata" to "Lattuga"...');

        $product = Product::where('name', 'Insalata')->first();

        if ($product) {
            $product->name = 'Lattuga';
            $product->slug = 'lattuga';
            $product->description = "La lattuga è una verdura a foglia verde, leggera e rinfrescante, disponibile quasi tutto l'anno. Ricca di vitamine e minerali, è la base perfetta per insalate fresche.";
            $product->save();

            $this->info('✓ Successfully renamed "Insalata" to "Lattuga"');
            $this->info('  - Updated name: Lattuga');
            $this->info('  - Updated slug: lattuga');
            $this->info('  - Updated description');
        } else {
            $this->warn('✗ Product "Insalata" not found in database');
            $this->info('This is normal if you already renamed it or if you\'re using a fresh database.');
        }

        $this->newLine();
        $this->info('Done!');

        return Command::SUCCESS;
    }
}
