import { Head, Link, router } from '@inertiajs/react';
import { useState } from 'react';
import { Search, Apple, Carrot } from 'lucide-react';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Autocomplete } from '@/components/ui/autocomplete';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';

export default function Index({ products, currentMonth, filters }) {
    const [searchTerm, setSearchTerm] = useState(filters.search || '');
    const [selectedType, setSelectedType] = useState(filters.type || 'all');
    const [selectedMonth, setSelectedMonth] = useState(filters.month || currentMonth);

    const monthNames = [
        'Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno',
        'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'
    ];

    const seasonNames = {
        1: 'Inverno', 2: 'Inverno', 3: 'Primavera',
        4: 'Primavera', 5: 'Primavera', 6: 'Estate',
        7: 'Estate', 8: 'Estate', 9: 'Autunno',
        10: 'Autunno', 11: 'Autunno', 12: 'Inverno'
    };

    const handleSearch = (e) => {
        e.preventDefault();
        applyFilters({ search: searchTerm });
    };

    const handleSelectProduct = (product) => {
        // Navigate directly to the product page when selected from autocomplete
        router.visit(`/prodotti/${product.slug}`);
    };

    const applyFilters = (newFilters) => {
        router.get('/', {
            ...filters,
            ...newFilters,
        }, {
            preserveState: true,
            preserveScroll: true,
        });
    };

    const handleTypeFilter = (type) => {
        setSelectedType(type);
        applyFilters({ type: type === 'all' ? null : type });
    };

    const handleMonthChange = (month) => {
        setSelectedMonth(month);
        applyFilters({ month });
    };

    const getMonthBadges = (months) => {
        return months.map(m => monthNames[m - 1]).join(', ');
    };

    return (
        <>
            <Head title="Prodotti di Stagione in Italia" />

            <div className="min-h-screen bg-gradient-to-b from-green-50 to-white">
                {/* Header */}
                <header className="bg-white shadow-sm border-b">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                        <div className="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div>
                                <h1 className="text-3xl font-bold text-gray-900">
                                    🍃 Di Stagione
                                </h1>
                                <p className="text-gray-600 mt-1">
                                    Scopri frutta e verdura di stagione in Italia
                                </p>
                            </div>

                            {/* Search Bar */}
                            <form onSubmit={handleSearch} className="flex gap-2 w-full md:w-96">
                                <Autocomplete
                                    placeholder="Cerca un prodotto..."
                                    value={searchTerm}
                                    onChange={(e) => setSearchTerm(e.target.value)}
                                    onSelect={handleSelectProduct}
                                    className="flex-1"
                                />
                                <Button type="submit" size="icon">
                                    <Search className="h-4 w-4" />
                                </Button>
                            </form>
                        </div>
                    </div>
                </header>

                <main className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    {/* Current Season Banner */}
                    <div className="bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg p-6 mb-8">
                        <h2 className="text-2xl font-bold mb-2">
                            {seasonNames[selectedMonth]} - {monthNames[selectedMonth - 1]}
                        </h2>
                        <p className="text-green-100">
                            Scopri quali prodotti sono freschi e di stagione questo mese
                        </p>
                    </div>

                    {/* Filters */}
                    <div className="mb-8">
                        <div className="flex flex-wrap gap-4">
                            {/* Type Filter */}
                            <div className="flex gap-2">
                                <Button
                                    variant={selectedType === 'all' ? 'default' : 'outline'}
                                    onClick={() => handleTypeFilter('all')}
                                >
                                    Tutti
                                </Button>
                                <Button
                                    variant={selectedType === 'frutta' ? 'default' : 'outline'}
                                    onClick={() => handleTypeFilter('frutta')}
                                    className="gap-2"
                                >
                                    <Apple className="h-4 w-4" />
                                    Frutta
                                </Button>
                                <Button
                                    variant={selectedType === 'verdura' ? 'default' : 'outline'}
                                    onClick={() => handleTypeFilter('verdura')}
                                    className="gap-2"
                                >
                                    <Carrot className="h-4 w-4" />
                                    Verdura
                                </Button>
                            </div>

                            {/* Month Selector */}
                            <select
                                value={selectedMonth}
                                onChange={(e) => handleMonthChange(parseInt(e.target.value))}
                                className="min-w-[150px] rounded-md border border-gray-300 bg-white pl-4 pr-10 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 cursor-pointer"
                            >
                                {monthNames.map((month, index) => (
                                    <option key={index} value={index + 1}>
                                        {month}
                                    </option>
                                ))}
                            </select>
                        </div>
                    </div>

                    {/* Products Grid */}
                    {products.length > 0 ? (
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            {products.map((product) => (
                                <Link
                                    key={product.id}
                                    href={`/prodotti/${product.slug}`}
                                    className="group"
                                >
                                    <Card className="h-full hover:shadow-lg transition-shadow duration-200">
                                        {product.image_url && (
                                            <div className="relative h-48 overflow-hidden rounded-t-lg">
                                                <img
                                                    src={product.image_url}
                                                    alt={product.name}
                                                    className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200"
                                                />
                                                <Badge
                                                    className="absolute top-2 right-2"
                                                    variant={product.type === 'frutta' ? 'default' : 'secondary'}
                                                >
                                                    {product.type === 'frutta' ? '🍎 Frutta' : '🥕 Verdura'}
                                                </Badge>
                                            </div>
                                        )}
                                        <CardHeader>
                                            <CardTitle className="text-xl group-hover:text-green-600 transition-colors">
                                                {product.name}
                                            </CardTitle>
                                            <CardDescription className="text-sm">
                                                {product.description.substring(0, 100)}...
                                            </CardDescription>
                                        </CardHeader>
                                        <CardContent>
                                            <p className="text-sm text-gray-600">
                                                <span className="font-semibold">Di stagione:</span>{' '}
                                                {getMonthBadges(product.seasonal_months)}
                                            </p>
                                        </CardContent>
                                    </Card>
                                </Link>
                            ))}
                        </div>
                    ) : (
                        <div className="text-center py-16">
                            <p className="text-xl text-gray-600">
                                Nessun prodotto trovato per i filtri selezionati.
                            </p>
                        </div>
                    )}
                </main>

                {/* Footer */}
                <footer className="bg-white border-t mt-16">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                        <p className="text-center text-gray-600">
                            🌱 Di Stagione - Scopri la frutta e verdura di stagione in Italia
                        </p>
                    </div>
                </footer>
            </div>
        </>
    );
}
