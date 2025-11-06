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
                'image_url' => 'https://images.unsplash.com/photo-1547514701-42782101795e?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Mele',
                'type' => 'frutta',
                'description' => 'Le mele sono frutti versatili, ricchi di fibre e antiossidanti. Disponibili in molte varietà, sono perfette per dolci e spuntini.',
                'months' => [9, 10, 11, 12, 1, 2], // Set-Feb
                'image_url' => 'https://images.unsplash.com/photo-1568702846914-96b305d2aaeb?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Fragole',
                'type' => 'frutta',
                'description' => 'Le fragole sono frutti primaverili dolci e profumati, ricchi di vitamina C e antiossidanti. Perfette per macedonie e dolci.',
                'months' => [4, 5, 6], // Apr, Mag, Giu
                'image_url' => 'https://images.unsplash.com/photo-1543528176-61b239494933?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Ciliegie',
                'type' => 'frutta',
                'description' => 'Le ciliegie sono frutti estivi dolci e succosi, ricchi di antiossidanti. Ottime da consumare fresche o per preparare marmellate.',
                'months' => [5, 6, 7], // Mag, Giu, Lug
                'image_url' => 'https://images.unsplash.com/photo-1519368358672-25b03afee3bf?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Pesche',
                'type' => 'frutta',
                'description' => 'Le pesche sono frutti estivi succosi e profumati, ricchi di vitamine A e C. Perfette per macedonie e dolci.',
                'months' => [6, 7, 8], // Giu, Lug, Ago
                'image_url' => 'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Albicocche',
                'type' => 'frutta',
                'description' => 'Le albicocche sono frutti estivi dolci e vellutati, ricchi di vitamina A e potassio. Ottime fresche o essiccate.',
                'months' => [6, 7, 8], // Giu, Lug, Ago
                'image_url' => 'https://images.unsplash.com/photo-1623065422902-30a2d299bbe4?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Uva',
                'type' => 'frutta',
                'description' => "L'uva è un frutto autunnale dolce e succoso, ricco di antiossidanti. Perfetta da consumare fresca o per produrre vino.",
                'months' => [8, 9, 10], // Ago, Set, Ott
                'image_url' => 'https://images.unsplash.com/photo-1599819177152-4bde91602f17?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Pere',
                'type' => 'frutta',
                'description' => 'Le pere sono frutti autunnali dolci e succosi, ricchi di fibre e vitamine. Ottime da consumare fresche o cotte.',
                'months' => [9, 10, 11, 12], // Set-Dic
                'image_url' => 'https://images.unsplash.com/photo-1551915796-c5e2c1628b73?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Mandarini',
                'type' => 'frutta',
                'description' => 'I mandarini sono agrumi invernali dolci e facili da sbucciare, ricchi di vitamina C. Perfetti per uno spuntino veloce.',
                'months' => [11, 12, 1, 2], // Nov-Feb
                'image_url' => 'https://images.unsplash.com/photo-1482012490529-1d9baa948fa7?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Melone',
                'type' => 'frutta',
                'description' => 'Il melone è un frutto estivo rinfrescante e dolce, ricco di acqua e vitamine. Perfetto per le giornate calde.',
                'months' => [6, 7, 8], // Giu, Lug, Ago
                'image_url' => 'https://images.unsplash.com/photo-1595475207225-428b62bda831?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Anguria',
                'type' => 'frutta',
                'description' => "L'anguria è un frutto estivo molto rinfrescante, composto per il 90% di acqua. Perfetta per idratarsi durante l'estate.",
                'months' => [6, 7, 8, 9], // Giu-Set
                'image_url' => 'https://images.unsplash.com/photo-1587049352846-4a222e784359?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Fichi',
                'type' => 'frutta',
                'description' => 'I fichi sono frutti dolci e delicati della fine estate, ricchi di fibre e minerali. Ottimi freschi o secchi.',
                'months' => [8, 9], // Ago, Set
                'image_url' => 'https://images.unsplash.com/photo-1579193558223-62aaa8f4c463?w=400&h=400&fit=crop',
            ],

            // VERDURA
            [
                'name' => 'Pomodori',
                'type' => 'verdura',
                'description' => 'I pomodori sono ortaggi estivi versatili, ricchi di licopene e vitamine. Essenziali per la cucina italiana.',
                'months' => [6, 7, 8, 9], // Giu-Set
                'image_url' => 'https://images.unsplash.com/photo-1546470427-227e9e2f2849?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Zucchine',
                'type' => 'verdura',
                'description' => 'Le zucchine sono ortaggi estivi leggeri e versatili, ricchi di acqua e poveri di calorie. Ottime grigliate o in padella.',
                'months' => [5, 6, 7, 8, 9], // Mag-Set
                'image_url' => 'https://images.unsplash.com/photo-1566385101042-1a0aa0c1268c?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Melanzane',
                'type' => 'verdura',
                'description' => 'Le melanzane sono ortaggi estivi versatili, ideali per la parmigiana e molti altri piatti mediterranei.',
                'months' => [6, 7, 8, 9], // Giu-Set
                'image_url' => 'https://images.unsplash.com/photo-1617478755490-e21232a5eeaf?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Peperoni',
                'type' => 'verdura',
                'description' => 'I peperoni sono ortaggi estivi colorati e croccanti, ricchi di vitamina C. Ottimi crudi o cotti.',
                'months' => [6, 7, 8, 9], // Giu-Set
                'image_url' => 'https://images.unsplash.com/photo-1525607551316-4a8e16d1f9ba?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Insalata',
                'type' => 'verdura',
                'description' => "L'insalata è una verdura a foglia verde, leggera e rinfrescante, disponibile quasi tutto l'anno. Ricca di vitamine e minerali.",
                'months' => [4, 5, 6, 7, 8, 9], // Apr-Set
                'image_url' => 'https://images.unsplash.com/photo-1540420773420-3366772f4999?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Spinaci',
                'type' => 'verdura',
                'description' => 'Gli spinaci sono verdure a foglia verde ricche di ferro e vitamine. Ottimi cotti o crudi in insalata.',
                'months' => [10, 11, 12, 1, 2, 3], // Ott-Mar
                'image_url' => 'https://images.unsplash.com/photo-1576045057995-568f588f82fb?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Cavolfiore',
                'type' => 'verdura',
                'description' => 'Il cavolfiore è un ortaggio invernale versatile, ricco di vitamine C e K. Ottimo gratinato o in zuppe.',
                'months' => [10, 11, 12, 1, 2], // Ott-Feb
                'image_url' => 'https://images.unsplash.com/photo-1510627489930-0c1b0bfb6785?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Broccoli',
                'type' => 'verdura',
                'description' => 'I broccoli sono ortaggi invernali ricchi di vitamine e antiossidanti. Ottimi al vapore o saltati in padella.',
                'months' => [10, 11, 12, 1, 2], // Ott-Feb
                'image_url' => 'https://images.unsplash.com/photo-1459411621453-7b03977f4bfc?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Carciofi',
                'type' => 'verdura',
                'description' => 'I carciofi sono ortaggi primaverili dal sapore delicato, ricchi di fibre e antiossidanti. Ottimi alla romana o fritti.',
                'months' => [3, 4, 5], // Mar, Apr, Mag
                'image_url' => 'https://images.unsplash.com/photo-1614961762590-c2e6e8c28b52?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Asparagi',
                'type' => 'verdura',
                'description' => 'Gli asparagi sono ortaggi primaverili dal sapore delicato, ricchi di vitamine e minerali. Ottimi al vapore o grigliati.',
                'months' => [3, 4, 5], // Mar, Apr, Mag
                'image_url' => 'https://images.unsplash.com/photo-1550689865-dd9e70a46a3c?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Fagiolini',
                'type' => 'verdura',
                'description' => 'I fagiolini sono legumi estivi teneri e croccanti, ricchi di fibre e vitamine. Ottimi lessati o saltati.',
                'months' => [6, 7, 8, 9], // Giu-Set
                'image_url' => 'https://images.unsplash.com/photo-1584738766473-61c083514bf4?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Zucca',
                'type' => 'verdura',
                'description' => 'La zucca è un ortaggio autunnale dolce e versatile, ricco di betacarotene. Ottima per risotti, zuppe e dolci.',
                'months' => [9, 10, 11], // Set, Ott, Nov
                'image_url' => 'https://images.unsplash.com/photo-1569976710208-b52636b52c09?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Radicchio',
                'type' => 'verdura',
                'description' => 'Il radicchio è una verdura invernale dal sapore amarognolo, ricca di antiossidanti. Ottimo crudo o grigliato.',
                'months' => [10, 11, 12, 1, 2], // Ott-Feb
                'image_url' => 'https://images.unsplash.com/photo-1594282486552-05b4d80fbb9f?w=400&h=400&fit=crop',
            ],
            [
                'name' => 'Finocchi',
                'type' => 'verdura',
                'description' => 'I finocchi sono ortaggi invernali croccanti e aromatici, ottimi per la digestione. Perfetti crudi in insalata o gratinati.',
                'months' => [10, 11, 12, 1, 2, 3], // Ott-Mar
                'image_url' => 'https://images.unsplash.com/photo-1574316071802-0d684efa7bf5?w=400&h=400&fit=crop',
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
