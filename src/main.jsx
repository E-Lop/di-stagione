import './index.css';
import React from 'react';
import { createRoot } from 'react-dom/client';
import { createBrowserRouter, RouterProvider, Outlet } from 'react-router-dom';
import { HelmetProvider } from 'react-helmet-async';
import ProductsIndex from './pages/ProductsIndex';
import ProductShow from './pages/ProductShow';
import ScrollToTop from './components/ScrollToTop';

function Layout() {
    return (
        <>
            <Outlet />
            <ScrollToTop />
        </>
    );
}

const router = createBrowserRouter([
    {
        element: <Layout />,
        children: [
            {
                path: '/',
                element: <ProductsIndex />,
            },
            {
                path: '/prodotti/:slug',
                element: <ProductShow />,
            },
        ],
    },
]);

function App() {
    return (
        <HelmetProvider>
            <RouterProvider router={router} />
        </HelmetProvider>
    );
}

const root = createRoot(document.getElementById('app'));
root.render(<App />);
