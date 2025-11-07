import './index.css';
import React from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { HelmetProvider } from 'react-helmet-async';
import ProductsIndex from './pages/ProductsIndex';
import ProductShow from './pages/ProductShow';

function App() {
    return (
        <HelmetProvider>
            <BrowserRouter>
                <Routes>
                    <Route path="/" element={<ProductsIndex />} />
                    <Route path="/prodotti/:slug" element={<ProductShow />} />
                </Routes>
            </BrowserRouter>
        </HelmetProvider>
    );
}

const root = createRoot(document.getElementById('app'));
root.render(<App />);
