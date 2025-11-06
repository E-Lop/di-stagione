<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // FRUTTA
            [
                'name' => 'Arance',
                'type' => 'frutta',
                'description' => 'Le arance sono agrumi ricchi di vitamina C, perfetti per la stagione invernale. Ottime da consumare fresche o spremute.',
                'months' => [1, 2, 3, 12], // Gen, Feb, Mar, Dic
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Orange-Fruit-Pieces.jpg/400px-Orange-Fruit-Pieces.jpg',
            ],
            [
                'name' => 'Mele',
                'type' => 'frutta',
                'description' => 'Le mele sono frutti versatili, ricchi di fibre e antiossidanti. Disponibili in molte varietà, sono perfette per dolci e spuntini.',
                'months' => [9, 10, 11, 12, 1, 2], // Set-Feb
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Red_Apple.jpg/400px-Red_Apple.jpg',
            ],
            [
                'name' => 'Fragole',
                'type' => 'frutta',
                'description' => 'Le fragole sono frutti primaverili dolci e profumati, ricchi di vitamina C e antiossidanti. Perfette per macedonie e dolci.',
                'months' => [4, 5, 6], // Apr, Mag, Giu
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/PerfectStrawberry.jpg/400px-PerfectStrawberry.jpg',
            ],
            [
                'name' => 'Ciliegie',
                'type' => 'frutta',
                'description' => 'Le ciliegie sono frutti estivi dolci e succosi, ricchi di antiossidanti. Ottime da consumare fresche o per preparare marmellate.',
                'months' => [5, 6, 7], // Mag, Giu, Lug
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Cherry_Stella444.jpg/400px-Cherry_Stella444.jpg',
            ],
            [
                'name' => 'Pesche',
                'type' => 'frutta',
                'description' => 'Le pesche sono frutti estivi succosi e profumati, ricchi di vitamine A e C. Perfette per macedonie e dolci.',
                'months' => [6, 7, 8], // Giu, Lug, Ago
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Autumn_Red_peaches.jpg/400px-Autumn_Red_peaches.jpg',
            ],
            [
                'name' => 'Albicocche',
                'type' => 'frutta',
                'description' => 'Le albicocche sono frutti estivi dolci e vellutati, ricchi di vitamina A e potassio. Ottime fresche o essiccate.',
                'months' => [6, 7, 8], // Giu, Lug, Ago
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Apricots.jpg/400px-Apricots.jpg',
            ],
            [
                'name' => 'Uva',
                'type' => 'frutta',
                'description' => "L'uva è un frutto autunnale dolce e succoso, ricco di antiossidanti. Perfetta da consumare fresca o per produrre vino.",
                'months' => [8, 9, 10], // Ago, Set, Ott
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Kyoho-grape.jpg/400px-Kyoho-grape.jpg',
            ],
            [
                'name' => 'Pere',
                'type' => 'frutta',
                'description' => 'Le pere sono frutti autunnali dolci e succosi, ricchi di fibre e vitamine. Ottime da consumare fresche o cotte.',
                'months' => [9, 10, 11, 12], // Set-Dic
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Pears.jpg/400px-Pears.jpg',
            ],
            [
                'name' => 'Mandarini',
                'type' => 'frutta',
                'description' => 'I mandarini sono agrumi invernali dolci e facili da sbucciare, ricchi di vitamina C. Perfetti per uno spuntino veloce.',
                'months' => [11, 12, 1, 2], // Nov-Feb
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/Mandarin_Oranges_%28Citrus_Reticulata%29.jpg/400px-Mandarin_Oranges_%28Citrus_Reticulata%29.jpg',
            ],
            [
                'name' => 'Melone',
                'type' => 'frutta',
                'description' => 'Il melone è un frutto estivo rinfrescante e dolce, ricco di acqua e vitamine. Perfetto per le giornate calde.',
                'months' => [6, 7, 8], // Giu, Lug, Ago
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Cantaloupes.jpg/400px-Cantaloupes.jpg',
            ],
            [
                'name' => 'Anguria',
                'type' => 'frutta',
                'description' => "L'anguria è un frutto estivo molto rinfrescante, composto per il 90% di acqua. Perfetta per idratarsi durante l'estate.",
                'months' => [6, 7, 8, 9], // Giu-Set
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/47/Taiwan_2009_Tainan_City_Organic_Farm_Watermelon_FRD_7962.jpg/400px-Taiwan_2009_Tainan_City_Organic_Farm_Watermelon_FRD_7962.jpg',
            ],
            [
                'name' => 'Fichi',
                'type' => 'frutta',
                'description' => 'I fichi sono frutti dolci e delicati della fine estate, ricchi di fibre e minerali. Ottimi freschi o secchi.',
                'months' => [8, 9], // Ago, Set
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Figs.jpg/400px-Figs.jpg',
            ],

            // VERDURA
            [
                'name' => 'Pomodori',
                'type' => 'verdura',
                'description' => 'I pomodori sono ortaggi estivi versatili, ricchi di licopene e vitamine. Essenziali per la cucina italiana.',
                'months' => [6, 7, 8, 9], // Giu-Set
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Tomato_je.jpg/400px-Tomato_je.jpg',
            ],
            [
                'name' => 'Zucchine',
                'type' => 'verdura',
                'description' => 'Le zucchine sono ortaggi estivi leggeri e versatili, ricchi di acqua e poveri di calorie. Ottime grigliate o in padella.',
                'months' => [5, 6, 7, 8, 9], // Mag-Set
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Courgette_J1.JPG/400px-Courgette_J1.JPG',
            ],
            [
                'name' => 'Melanzane',
                'type' => 'verdura',
                'description' => 'Le melanzane sono ortaggi estivi versatili, ideali per la parmigiana e molti altri piatti mediterranei.',
                'months' => [6, 7, 8, 9], // Giu-Set
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Solanum_melongena_24_08_2012_%281%29.JPG/400px-Solanum_melongena_24_08_2012_%281%29.JPG',
            ],
            [
                'name' => 'Peperoni',
                'type' => 'verdura',
                'description' => 'I peperoni sono ortaggi estivi colorati e croccanti, ricchi di vitamina C. Ottimi crudi o cotti.',
                'months' => [6, 7, 8, 9], // Giu-Set
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Green-Red-Orange-Bell-Pepper-Selection.jpg/400px-Green-Red-Orange-Bell-Pepper-Selection.jpg',
            ],
            [
                'name' => 'Insalata',
                'type' => 'verdura',
                'description' => "L'insalata è una verdura a foglia verde, leggera e rinfrescante, disponibile quasi tutto l'anno. Ricca di vitamine e minerali.",
                'months' => [4, 5, 6, 7, 8, 9], // Apr-Set
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Lactuca_sativa_-_butterhead_lettuce.jpg/400px-Lactuca_sativa_-_butterhead_lettuce.jpg',
            ],
            [
                'name' => 'Spinaci',
                'type' => 'verdura',
                'description' => 'Gli spinaci sono verdure a foglia verde ricche di ferro e vitamine. Ottimi cotti o crudi in insalata.',
                'months' => [10, 11, 12, 1, 2, 3], // Ott-Mar
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/Spinach_bunch.jpg/400px-Spinach_bunch.jpg',
            ],
            [
                'name' => 'Cavolfiore',
                'type' => 'verdura',
                'description' => 'Il cavolfiore è un ortaggio invernale versatile, ricco di vitamine C e K. Ottimo gratinato o in zuppe.',
                'months' => [10, 11, 12, 1, 2], // Ott-Feb
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Cauliflower.JPG/400px-Cauliflower.JPG',
            ],
            [
                'name' => 'Broccoli',
                'type' => 'verdura',
                'description' => 'I broccoli sono ortaggi invernali ricchi di vitamine e antiossidanti. Ottimi al vapore o saltati in padella.',
                'months' => [10, 11, 12, 1, 2], // Ott-Feb
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Broccoli_DSC00862.png/400px-Broccoli_DSC00862.png',
            ],
            [
                'name' => 'Carciofi',
                'type' => 'verdura',
                'description' => 'I carciofi sono ortaggi primaverili dal sapore delicato, ricchi di fibre e antiossidanti. Ottimi alla romana o fritti.',
                'months' => [3, 4, 5], // Mar, Apr, Mag
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Artichoke_J1.jpg/400px-Artichoke_J1.jpg',
            ],
            [
                'name' => 'Asparagi',
                'type' => 'verdura',
                'description' => 'Gli asparagi sono ortaggi primaverili dal sapore delicato, ricchi di vitamine e minerali. Ottimi al vapore o grigliati.',
                'months' => [3, 4, 5], // Mar, Apr, Mag
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Asparagus-Bundle.jpg/400px-Asparagus-Bundle.jpg',
            ],
            [
                'name' => 'Fagiolini',
                'type' => 'verdura',
                'description' => 'I fagiolini sono legumi estivi teneri e croccanti, ricchi di fibre e vitamine. Ottimi lessati o saltati.',
                'months' => [6, 7, 8, 9], // Giu-Set
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/ARS_lima_beans.jpg/400px-ARS_lima_beans.jpg',
            ],
            [
                'name' => 'Zucca',
                'type' => 'verdura',
                'description' => 'La zucca è un ortaggio autunnale dolce e versatile, ricco di betacarotene. Ottima per risotti, zuppe e dolci.',
                'months' => [9, 10, 11], // Set, Ott, Nov
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Calabaza_Butternut.jpg/400px-Calabaza_Butternut.jpg',
            ],
            [
                'name' => 'Radicchio',
                'type' => 'verdura',
                'description' => 'Il radicchio è una verdura invernale dal sapore amarognolo, ricca di antiossidanti. Ottimo crudo o grigliato.',
                'months' => [10, 11, 12, 1, 2], // Ott-Feb
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Radicchio_di_Treviso.jpg/400px-Radicchio_di_Treviso.jpg',
            ],
            [
                'name' => 'Finocchi',
                'type' => 'verdura',
                'description' => 'I finocchi sono ortaggi invernali croccanti e aromatici, ottimi per la digestione. Perfetti crudi in insalata o gratinati.',
                'months' => [10, 11, 12, 1, 2, 3], // Ott-Mar
                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7d/Foeniculum_vulgare_Florence_Fennel.jpg/400px-Foeniculum_vulgare_Florence_Fennel.jpg',
            ],
        ];

        foreach ($products as $productData) {
            $months = $productData['months'];
            unset($productData['months']);

            // Generate slug from product name
            $productData['slug'] = Str::slug($productData['name']);

            $product = Product::create($productData);

            // Associa i mesi al prodotto
            foreach ($months as $month) {
                DB::table('month_product')->insert([
                    'product_id' => $product->id,
                    'month' => $month,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
