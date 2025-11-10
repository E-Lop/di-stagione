import { Link, useParams, useNavigate } from 'react-router-dom';
import { Helmet } from 'react-helmet-async';
import { ArrowLeft, Calendar, Apple, Carrot } from 'lucide-react';
import { Card, CardContent, CardHeader, CardTitle } from '../components/ui/card';
import { Button } from '../components/ui/button';
import { Badge } from '../components/ui/badge';
import { useProduct } from '../hooks/useProducts';

export default function ProductShow() {
    const { slug } = useParams();
    const navigate = useNavigate();
    const { product, loading } = useProduct(slug);

    const monthNames = [
        'Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno',
        'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'
    ];

    const getSeasonFromMonth = (month) => {
        if ([3, 4, 5].includes(month)) return { name: 'Primavera', color: 'bg-green-100 text-green-800' };
        if ([6, 7, 8].includes(month)) return { name: 'Estate', color: 'bg-yellow-100 text-yellow-800' };
        if ([9, 10, 11].includes(month)) return { name: 'Autunno', color: 'bg-orange-100 text-orange-800' };
        return { name: 'Inverno', color: 'bg-blue-100 text-blue-800' };
    };

    if (loading) {
        return (
            <div className="min-h-screen bg-gradient-to-b from-green-50 to-white flex items-center justify-center">
                <div className="text-xl text-gray-600">Caricamento...</div>
            </div>
        );
    }

    if (!product) {
        return (
            <div className="min-h-screen bg-gradient-to-b from-green-50 to-white flex flex-col items-center justify-center">
                <h1 className="text-4xl font-bold text-gray-900 mb-4">Prodotto non trovato</h1>
                <Link to="/" onClick={() => {
                    sessionStorage.removeItem('productsIndexScrollPosition');
                    window.scrollTo(0, 0);
                }}>
                    <Button className="gap-2">
                        <ArrowLeft className="h-4 w-4" />
                        Torna alla home
                    </Button>
                </Link>
            </div>
        );
    }

    const seasons = [...new Set(product.seasonal_months.map(m => getSeasonFromMonth(m).name))];

    return (
        <>
            <Helmet>
                <title>{product.name} - Di Stagione</title>
                <meta name="description" content={product.description} />
            </Helmet>

            <div className="min-h-screen bg-gradient-to-b from-green-50 to-white">
                {/* Header */}
                <header className="bg-white shadow-sm border-b">
                    <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                        <Link to="/" onClick={() => {
                            sessionStorage.removeItem('productsIndexScrollPosition');
                            window.scrollTo(0, 0);
                            navigate('/');
                        }} className="inline-block mb-4">
                            <h2 className="text-2xl font-bold text-gray-900 hover:text-green-600 transition-colors">
                                🍃 Di Stagione
                            </h2>
                        </Link>
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
                                                    onClick={() => {
                                                        sessionStorage.removeItem('productsIndexScrollPosition');
                                                        window.scrollTo(0, 0);
                                                        navigate(`/?month=${month}`);
                                                    }}
                                                >
                                                    {monthNames[month - 1]}
                                                </Badge>
                                            );
                                        })}
                                    </div>
                                </CardContent>
                            </Card>
                        </div>
                    </div>

                    {/* Back Button */}
                    <div className="mt-8 text-center">
                        <Link to="/">
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
