<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

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
                'image_url' => 'https://images.unsplash.com/photo-1580052614034-c55d20bfee3b?w=400',
            ],
            [
                'name' => 'Mele',
                'type' => 'frutta',
                'description' => 'Le mele sono frutti versatili, ricchi di fibre e antiossidanti. Disponibili in molte varietà, sono perfette per dolci e spuntini.',
                'months' => [9, 10, 11, 12, 1, 2], // Set-Feb
                'image_url' => 'https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?w=400',
            ],
            [
                'name' => 'Fragole',
                'type' => 'frutta',
                'description' => 'Le fragole sono frutti primaverili dolci e profumati, ricchi di vitamina C e antiossidanti. Perfette per macedonie e dolci.',
                'months' => [4, 5, 6], // Apr, Mag, Giu
                'image_url' => 'https://images.unsplash.com/photo-1464965911861-746a04b4bca6?w=400',
            ],
            [
                'name' => 'Ciliegie',
                'type' => 'frutta',
                'description' => 'Le ciliegie sono frutti estivi dolci e succosi, ricchi di antiossidanti. Ottime da consumare fresche o per preparare marmellate.',
                'months' => [5, 6, 7], // Mag, Giu, Lug
                'image_url' => 'https://images.unsplash.com/photo-1528821128474-27f963b062bf?w=400',
            ],
            [
                'name' => 'Pesche',
                'type' => 'frutta',
                'description' => 'Le pesche sono frutti estivi succosi e profumati, ricchi di vitamine A e C. Perfette per macedonie e dolci.',
                'months' => [6, 7, 8], // Giu, Lug, Ago
                'image_url' => 'https://images.unsplash.com/photo-1629828874514-944a57180f7f?w=400',
            ],
            [
                'name' => 'Albicocche',
                'type' => 'frutta',
                'description' => 'Le albicocche sono frutti estivi dolci e vellutati, ricchi di vitamina A e potassio. Ottime fresche o essiccate.',
                'months' => [6, 7, 8], // Giu, Lug, Ago
                'image_url' => 'https://images.unsplash.com/photo-1600363304994-fc57e7d50c8e?w=400',
            ],
            [
                'name' => 'Uva',
                'type' => 'frutta',
                'description' => "L'uva è un frutto autunnale dolce e succoso, ricco di antiossidanti. Perfetta da consumare fresca o per produrre vino.",
                'months' => [8, 9, 10], // Ago, Set, Ott
                'image_url' => 'https://images.unsplash.com/photo-1537640538966-79f369143f8f?w=400',
            ],
            [
                'name' => 'Pere',
                'type' => 'frutta',
                'description' => 'Le pere sono frutti autunnali dolci e succosi, ricchi di fibre e vitamine. Ottime da consumare fresche o cotte.',
                'months' => [9, 10, 11, 12], // Set-Dic
                'image_url' => 'https://images.unsplash.com/photo-1568572933382-74d440642117?w=400',
            ],
            [
                'name' => 'Mandarini',
                'type' => 'frutta',
                'description' => 'I mandarini sono agrumi invernali dolci e facili da sbucciare, ricchi di vitamina C. Perfetti per uno spuntino veloce.',
                'months' => [11, 12, 1, 2], // Nov-Feb
                'image_url' => 'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?w=400',
            ],
            [
                'name' => 'Melone',
                'type' => 'frutta',
                'description' => 'Il melone è un frutto estivo rinfrescante e dolce, ricco di acqua e vitamine. Perfetto per le giornate calde.',
                'months' => [6, 7, 8], // Giu, Lug, Ago
                'image_url' => 'https://images.unsplash.com/photo-1621583441131-ec0f8f2e6e61?w=400',
            ],
            [
                'name' => 'Anguria',
                'type' => 'frutta',
                'description' => "L'anguria è un frutto estivo molto rinfrescante, composto per il 90% di acqua. Perfetta per idratarsi durante l'estate.",
                'months' => [6, 7, 8, 9], // Giu-Set
                'image_url' => 'https://images.unsplash.com/photo-1589984662646-e7b2e4962cp7?w=400',
            ],
            [
                'name' => 'Fichi',
                'type' => 'frutta',
                'description' => 'I fichi sono frutti dolci e delicati della fine estate, ricchi di fibre e minerali. Ottimi freschi o secchi.',
                'months' => [8, 9], // Ago, Set
                'image_url' => 'https://images.unsplash.com/photo-1596514605936-7a6b0ab6fc5a?w=400',
            ],

            // VERDURA
            [
                'name' => 'Pomodori',
                'type' => 'verdura',
                'description' => 'I pomodori sono ortaggi estivi versatili, ricchi di licopene e vitamine. Essenziali per la cucina italiana.',
                'months' => [6, 7, 8, 9], // Giu-Set
                'image_url' => 'https://images.unsplash.com/photo-1592924357228-91a4daadcfea?w=400',
            ],
            [
                'name' => 'Zucchine',
                'type' => 'verdura',
                'description' => 'Le zucchine sono ortaggi estivi leggeri e versatili, ricchi di acqua e poveri di calorie. Ottime grigliate o in padella.',
                'months' => [5, 6, 7, 8, 9], // Mag-Set
                'image_url' => 'https://images.unsplash.com/photo-1597362925123-77861d3fbac7?w=400',
            ],
            [
                'name' => 'Melanzane',
                'type' => 'verdura',
                'description' => 'Le melanzane sono ortaggi estivi versatili, ideali per la parmigiana e molti altri piatti mediterranei.',
                'months' => [6, 7, 8, 9], // Giu-Set
                'image_url' => 'https://images.unsplash.com/photo-1659261200833-ec8761558af7?w=400',
            ],
            [
                'name' => 'Peperoni',
                'type' => 'verdura',
                'description' => 'I peperoni sono ortaggi estivi colorati e croccanti, ricchi di vitamina C. Ottimi crudi o cotti.',
                'months' => [6, 7, 8, 9], // Giu-Set
                'image_url' => 'https://images.unsplash.com/photo-1563565375-f3fdfdbefa83?w=400',
            ],
            [
                'name' => 'Insalata',
                'type' => 'verdura',
                'description' => "L'insalata è una verdura a foglia verde, leggera e rinfrescante, disponibile quasi tutto l'anno. Ricca di vitamine e minerali.",
                'months' => [4, 5, 6, 7, 8, 9], // Apr-Set
                'image_url' => 'https://images.unsplash.com/photo-1622206151226-18ca2c9ab4a1?w=400',
            ],
            [
                'name' => 'Spinaci',
                'type' => 'verdura',
                'description' => 'Gli spinaci sono verdure a foglia verde ricche di ferro e vitamine. Ottimi cotti o crudi in insalata.',
                'months' => [10, 11, 12, 1, 2, 3], // Ott-Mar
                'image_url' => 'https://images.unsplash.com/photo-1576045057995-568f588f82fb?w=400',
            ],
            [
                'name' => 'Cavolfiore',
                'type' => 'verdura',
                'description' => 'Il cavolfiore è un ortaggio invernale versatile, ricco di vitamine C e K. Ottimo gratinato o in zuppe.',
                'months' => [10, 11, 12, 1, 2], // Ott-Feb
                'image_url' => 'https://images.unsplash.com/photo-1568584711274-9023e8e77e95?w=400',
            ],
            [
                'name' => 'Broccoli',
                'type' => 'verdura',
                'description' => 'I broccoli sono ortaggi invernali ricchi di vitamine e antiossidanti. Ottimi al vapore o saltati in padella.',
                'months' => [10, 11, 12, 1, 2], // Ott-Feb
                'image_url' => 'https://images.unsplash.com/photo-1587049352846-4a222e784359?w=400',
            ],
            [
                'name' => 'Carciofi',
                'type' => 'verdura',
                'description' => 'I carciofi sono ortaggi primaverili dal sapore delicato, ricchi di fibre e antiossidanti. Ottimi alla romana o fritti.',
                'months' => [3, 4, 5], // Mar, Apr, Mag
                'image_url' => 'https://images.unsplash.com/photo-1625686473880-e18113390f5a?w=400',
            ],
            [
                'name' => 'Asparagi',
                'type' => 'verdura',
                'description' => 'Gli asparagi sono ortaggi primaverili dal sapore delicato, ricchi di vitamine e minerali. Ottimi al vapore o grigliati.',
                'months' => [3, 4, 5], // Mar, Apr, Mag
                'image_url' => 'https://images.unsplash.com/photo-1565517233023-e638dc7beaa1?w=400',
            ],
            [
                'name' => 'Fagiolini',
                'type' => 'verdura',
                'description' => 'I fagiolini sono legumi estivi teneri e croccanti, ricchi di fibre e vitamine. Ottimi lessati o saltati.',
                'months' => [6, 7, 8, 9], // Giu-Set
                'image_url' => 'https://images.unsplash.com/photo-1589927986089-35812378d5a4?w=400',
            ],
            [
                'name' => 'Zucca',
                'type' => 'verdura',
                'description' => 'La zucca è un ortaggio autunnale dolce e versatile, ricco di betacarotene. Ottima per risotti, zuppe e dolci.',
                'months' => [9, 10, 11], // Set, Ott, Nov
                'image_url' => 'https://images.unsplash.com/photo-1570586437263-ab629fccc818?w=400',
            ],
            [
                'name' => 'Radicchio',
                'type' => 'verdura',
                'description' => 'Il radicchio è una verdura invernale dal sapore amarognolo, ricca di antiossidanti. Ottimo crudo o grigliato.',
                'months' => [10, 11, 12, 1, 2], // Ott-Feb
                'image_url' => 'https://images.unsplash.com/photo-1591634698410-d82c4a1de480?w=400',
            ],
            [
                'name' => 'Finocchi',
                'type' => 'verdura',
                'description' => 'I finocchi sono ortaggi invernali croccanti e aromatici, ottimi per la digestione. Perfetti crudi in insalata o gratinati.',
                'months' => [10, 11, 12, 1, 2, 3], // Ott-Mar
                'image_url' => 'https://images.unsplash.com/photo-1612165457942-818c44184f4e?w=400',
            ],
        ];

        foreach ($products as $productData) {
            $months = $productData['months'];
            unset($productData['months']);

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
