import { useState, useEffect } from 'react';

export function useProducts() {
    const [products, setProducts] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        fetch('/data/products.json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to load products');
                }
                return response.json();
            })
            .then(data => {
                setProducts(data);
                setLoading(false);
            })
            .catch(err => {
                setError(err.message);
                setLoading(false);
            });
    }, []);

    return { products, loading, error };
}

export function useProduct(slug) {
    const { products, loading, error } = useProducts();
    const product = products.find(p => p.slug === slug);

    return { product, loading, error };
}
