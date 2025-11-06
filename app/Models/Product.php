<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'type',
        'description',
        'image_url',
        'slug',
    ];

    /**
     * Ottiene i mesi in cui il prodotto è di stagione
     */
    public function seasonalMonths()
    {
        return $this->hasMany(\Illuminate\Database\Eloquent\Relations\Pivot::class, 'product_id')
            ->select('month')
            ->from('month_product');
    }

    /**
     * Ottiene i numeri dei mesi di stagione
     */
    public function getMonthsAttribute()
    {
        return \DB::table('month_product')
            ->where('product_id', $this->id)
            ->pluck('month')
            ->toArray();
    }

    /**
     * Verifica se il prodotto è di stagione in un determinato mese
     */
    public function isInSeasonForMonth($month)
    {
        return \DB::table('month_product')
            ->where('product_id', $this->id)
            ->where('month', $month)
            ->exists();
    }

    /**
     * Verifica se il prodotto è di stagione nella data corrente
     */
    public function isCurrentlyInSeason()
    {
        return $this->isInSeasonForMonth(now()->month);
    }

    /**
     * Scope per filtrare i prodotti di stagione per un determinato mese
     */
    public function scopeInSeason($query, $month)
    {
        return $query->whereExists(function ($q) use ($month) {
            $q->select(\DB::raw(1))
                ->from('month_product')
                ->whereColumn('month_product.product_id', 'products.id')
                ->where('month_product.month', $month);
        });
    }

    /**
     * Scope per filtrare i prodotti di stagione corrente
     */
    public function scopeCurrentSeason($query)
    {
        return $query->inSeason(now()->month);
    }

    /**
     * Genera automaticamente lo slug dal nome
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }
}
