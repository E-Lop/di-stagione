<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Mostra la pagina principale con i prodotti di stagione corrente
     */
    public function index(Request $request)
    {
        $month = $request->get('month', now()->month);
        $type = $request->get('type'); // 'frutta' o 'verdura'
        $search = $request->get('search');

        $query = Product::query();

        // Filtra per mese
        if ($month) {
            $query->inSeason($month);
        }

        // Filtra per tipo
        if ($type) {
            $query->where('type', $type);
        }

        // Ricerca per nome
        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $products = $query->orderBy('name')->get()->map(function ($product) {
            // Aggiungi i mesi di stagione ad ogni prodotto
            $product->seasonal_months = DB::table('month_product')
                ->where('product_id', $product->id)
                ->pluck('month')
                ->toArray();
            return $product;
        });

        return Inertia::render('Products/Index', [
            'products' => $products,
            'currentMonth' => $month,
            'filters' => [
                'month' => $month,
                'type' => $type,
                'search' => $search,
            ],
        ]);
    }

    /**
     * Mostra la pagina di dettaglio del prodotto
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        // Aggiungi i mesi di stagione
        $product->seasonal_months = DB::table('month_product')
            ->where('product_id', $product->id)
            ->pluck('month')
            ->toArray();

        return Inertia::render('Products/Show', [
            'product' => $product,
        ]);
    }

    /**
     * API endpoint per ottenere prodotti per mese
     */
    public function byMonth($month)
    {
        $products = Product::inSeason($month)
            ->orderBy('name')
            ->get()
            ->map(function ($product) {
                $product->seasonal_months = DB::table('month_product')
                    ->where('product_id', $product->id)
                    ->pluck('month')
                    ->toArray();
                return $product;
            });

        return response()->json($products);
    }

    /**
     * API endpoint per ottenere prodotti per stagione
     */
    public function bySeason($season)
    {
        // Definisce i mesi per ogni stagione
        $seasonMonths = [
            'primavera' => [3, 4, 5],
            'estate' => [6, 7, 8],
            'autunno' => [9, 10, 11],
            'inverno' => [12, 1, 2],
        ];

        if (!isset($seasonMonths[$season])) {
            return response()->json(['error' => 'Stagione non valida'], 400);
        }

        $months = $seasonMonths[$season];

        $products = Product::whereExists(function ($query) use ($months) {
            $query->select(DB::raw(1))
                ->from('month_product')
                ->whereColumn('month_product.product_id', 'products.id')
                ->whereIn('month_product.month', $months);
        })
        ->orderBy('name')
        ->get()
        ->map(function ($product) {
            $product->seasonal_months = DB::table('month_product')
                ->where('product_id', $product->id)
                ->pluck('month')
                ->toArray();
            return $product;
        });

        return response()->json($products);
    }

    /**
     * API endpoint per ricerca prodotti
     */
    public function search(Request $request)
    {
        $search = $request->get('q');

        if (!$search) {
            return response()->json([]);
        }

        $products = Product::where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orderBy('name')
            ->limit(20)
            ->get()
            ->map(function ($product) {
                $product->seasonal_months = DB::table('month_product')
                    ->where('product_id', $product->id)
                    ->pluck('month')
                    ->toArray();
                return $product;
            });

        return response()->json($products);
    }
}
