import { Head, Link, router } from '@inertiajs/react';
import { ArrowLeft, Calendar, Apple, Carrot } from 'lucide-react';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';

export default function Show({ product }) {
    const monthNames = [
        'Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno',
        'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'
    ];

    const seasonalMonthsNames = product.seasonal_months
        .sort((a, b) => a - b)
        .map(m => monthNames[m - 1]);

    const getSeasonFromMonth = (month) => {
        if ([3, 4, 5].includes(month)) return { name: 'Primavera', color: 'bg-green-100 text-green-800' };
        if ([6, 7, 8].includes(month)) return { name: 'Estate', color: 'bg-yellow-100 text-yellow-800' };
        if ([9, 10, 11].includes(month)) return { name: 'Autunno', color: 'bg-orange-100 text-orange-800' };
        return { name: 'Inverno', color: 'bg-blue-100 text-blue-800' };
    };

    const seasons = [...new Set(product.seasonal_months.map(m => getSeasonFromMonth(m).name))];

    return (
        <>
            <Head title={product.name} />

            <div className="min-h-screen bg-gradient-to-b from-green-50 to-white">
                {/* Header */}
                <header className="bg-white shadow-sm border-b">
                    <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                        <Link href="/">
                            <Button variant="ghost" className="gap-2 mb-4">
                                <ArrowLeft className="h-4 w-4" />
                                Torna ai prodotti
                            </Button>
                        </Link>
                        <div className="flex items-start gap-4">
                            <div className="flex-1">
                                <h1 className="text-4xl font-bold text-gray-900">
                                    {product.name}
                                </h1>
                                <div className="flex gap-2 mt-3">
                                    <Badge
                                        variant={product.type === 'frutta' ? 'default' : 'secondary'}
                                        className="text-sm"
                                    >
                                        {product.type === 'frutta' ? (
                                            <>
                                                <Apple className="h-4 w-4 mr-1" />
                                                Frutta
                                            </>
                                        ) : (
                                            <>
                                                <Carrot className="h-4 w-4 mr-1" />
                                                Verdura
                                            </>
                                        )}
                                    </Badge>
                                    {seasons.map((season, index) => {
                                        const seasonInfo = getSeasonFromMonth(
                                            product.seasonal_months.find(m => getSeasonFromMonth(m).name === season)
                                        );
                                        return (
                                            <Badge key={index} className={seasonInfo.color}>
                                                {season}
                                            </Badge>
                                        );
                                    })}
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <main className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                        {/* Product Image */}
                        <div>
                            {product.image_url && (
                                <Card className="overflow-hidden">
                                    <img
                                        src={product.image_url}
                                        alt={product.name}
                                        className="w-full h-96 object-cover"
                                    />
                                </Card>
                            )}
                        </div>

                        {/* Product Info */}
                        <div className="space-y-6">
                            {/* Description */}
                            <Card>
                                <CardHeader>
                                    <CardTitle>Descrizione</CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <p className="text-gray-700 leading-relaxed">
                                        {product.description}
                                    </p>
                                </CardContent>
                            </Card>

                            {/* Seasonal Info */}
                            <Card>
                                <CardHeader>
                                    <CardTitle className="flex items-center gap-2">
                                        <Calendar className="h-5 w-5" />
                                        Disponibilità stagionale
                                    </CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <p className="text-gray-700 mb-4">
                                        Questo prodotto è di stagione nei seguenti mesi:
                                    </p>
                                    <div className="flex flex-wrap gap-2">
                                        {product.seasonal_months.map((month) => {
                                            const seasonInfo = getSeasonFromMonth(month);
                                            return (
                                                <Badge
                                                    key={month}
                                                    variant="outline"
                                                    className={`${seasonInfo.color} cursor-pointer hover:opacity-80 transition-opacity`}
                                                    onClick={() => router.get('/', { month })}
                                                >
                                                    {monthNames[month - 1]}
                                                </Badge>
                                            );
                                        })}
                                    </div>
                                </CardContent>
                            </Card>

                            {/* Benefits */}
                            <Card className="bg-green-50 border-green-200">
                                <CardHeader>
                                    <CardTitle className="text-green-800">
                                        🌱 Perché scegliere prodotti di stagione?
                                    </CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <ul className="space-y-2 text-sm text-green-900">
                                        <li className="flex items-start">
                                            <span className="mr-2">✓</span>
                                            <span>Più sapore e qualità nutrizionale</span>
                                        </li>
                                        <li className="flex items-start">
                                            <span className="mr-2">✓</span>
                                            <span>Sostegno all'economia locale</span>
                                        </li>
                                        <li className="flex items-start">
                                            <span className="mr-2">✓</span>
                                            <span>Minore impatto ambientale</span>
                                        </li>
                                        <li className="flex items-start">
                                            <span className="mr-2">✓</span>
                                            <span>Prezzi più convenienti</span>
                                        </li>
                                    </ul>
                                </CardContent>
                            </Card>
                        </div>
                    </div>

                    {/* Back Button */}
                    <div className="mt-8 text-center">
                        <Link href="/">
                            <Button size="lg" className="gap-2">
                                <ArrowLeft className="h-4 w-4" />
                                Torna ai prodotti di stagione
                            </Button>
                        </Link>
                    </div>
                </main>

                {/* Footer */}
                <footer className="bg-white border-t mt-16">
                    <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                        <p className="text-center text-gray-600">
                            🌱 Di Stagione - Scopri la frutta e verdura di stagione in Italia
                        </p>
                    </div>
                </footer>
            </div>
        </>
    );
}
