# 🍃 Di Stagione - Catalogo Frutta e Verdura di Stagione in Italia

Una web app moderna per scoprire e catalogare tutta la frutta e verdura di stagione in Italia, costruita con Laravel, React, Inertia.js, Tailwind CSS e Shadcn UI.

## ✨ Caratteristiche

- 📅 **Visualizzazione per mese**: Scopri quali prodotti sono di stagione in ogni mese dell'anno
- 🌸 **Filtri per stagione**: Naviga i prodotti per primavera, estate, autunno e inverno
- 🔍 **Ricerca prodotti**: Cerca facilmente qualsiasi frutto o verdura
- 🍎 **Filtri per tipo**: Filtra tra frutta e verdura
- 📱 **Design responsivo**: Interfaccia moderna e mobile-friendly
- 🖼️ **Immagini dei prodotti**: Ogni prodotto ha un'immagine rappresentativa
- 📖 **Pagine di dettaglio**: Informazioni complete su ogni prodotto con descrizione e periodo di stagionalità

## 🛠️ Tecnologie Utilizzate

- **Backend**: Laravel 12
- **Frontend**: React 18
- **UI Framework**: Tailwind CSS
- **Componenti UI**: Shadcn UI
- **Router**: Inertia.js
- **Database**: PostgreSQL/MySQL/SQLite
- **Icone**: Lucide React

## 📋 Prerequisiti

- PHP >= 8.2
- Composer
- Node.js >= 18
- NPM o Yarn
- Database (PostgreSQL, MySQL o SQLite)

## 🚀 Installazione

1. **Clona il repository**
```bash
git clone <repository-url>
cd di-stagione
```

2. **Installa le dipendenze PHP**
```bash
composer install
```

3. **Installa le dipendenze Node**
```bash
npm install
```

4. **Configura l'ambiente**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configura il database**

Modifica il file `.env` con le tue credenziali database:

Per PostgreSQL:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=di_stagione
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Per MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=di_stagione
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. **Esegui le migrations e i seeders**
```bash
php artisan migrate
php artisan db:seed
```

Questo popolerà il database con oltre 25 prodotti stagionali italiani!

7. **Compila gli asset frontend**

Per development:
```bash
npm run dev
```

Per production:
```bash
npm run build
```

8. **Avvia il server**
```bash
php artisan serve
```

L'applicazione sarà disponibile su `http://localhost:8000`

## 📁 Struttura del Progetto

```
di-stagione/
├── app/
│   ├── Http/Controllers/
│   │   └── ProductController.php    # Controller per la gestione dei prodotti
│   └── Models/
│       └── Product.php               # Model del prodotto
├── database/
│   ├── migrations/                   # Migrations del database
│   └── seeders/
│       └── ProductSeeder.php         # Seeder con prodotti stagionali
├── resources/
│   ├── css/
│   │   └── app.css                   # Stili Tailwind e Shadcn
│   └── js/
│       ├── components/ui/            # Componenti Shadcn UI
│       ├── lib/
│       │   └── utils.js              # Utility functions
│       └── Pages/
│           └── Products/
│               ├── Index.jsx         # Pagina principale
│               └── Show.jsx          # Pagina dettaglio prodotto
└── routes/
    └── web.php                       # Routes dell'applicazione
```

## 🎨 Componenti UI Shadcn Utilizzati

- **Button**: Pulsanti con varianti multiple
- **Card**: Card per visualizzare i prodotti
- **Input**: Input per la ricerca
- **Badge**: Badge per categorie e stagioni

## 📊 Database Schema

### Tabella `products`
- `id`: ID univoco
- `name`: Nome del prodotto (es. "Pomodori")
- `name_en`: Nome in inglese (opzionale)
- `type`: Tipo (`frutta` o `verdura`)
- `description`: Descrizione del prodotto
- `image_url`: URL dell'immagine
- `slug`: Slug per URL SEO-friendly

### Tabella `month_product` (pivot)
- `id`: ID univoco
- `product_id`: Riferimento al prodotto
- `month`: Numero del mese (1-12)

## 🔗 API Endpoints

- `GET /`: Pagina principale con prodotti di stagione
- `GET /prodotti/{slug}`: Pagina di dettaglio prodotto
- `GET /api/products/month/{month}`: API per ottenere prodotti per mese
- `GET /api/products/season/{season}`: API per ottenere prodotti per stagione
- `GET /api/products/search?q={query}`: API per cercare prodotti

## 🌱 Prodotti Inclusi

Il seeder include una vasta gamma di prodotti stagionali italiani:

**Frutta**: Arance, Mele, Fragole, Ciliegie, Pesche, Albicocche, Uva, Pere, Mandarini, Melone, Anguria, Fichi

**Verdura**: Pomodori, Zucchine, Melanzane, Peperoni, Insalata, Spinaci, Cavolfiore, Broccoli, Carciofi, Asparagi, Fagiolini, Zucca, Radicchio, Finocchi

## 🎯 Funzionalità Future

- [ ] Autenticazione utenti per salvare prodotti preferiti
- [ ] Sistema di ricette stagionali
- [ ] Mappa dei mercati locali
- [ ] Export lista della spesa
- [ ] Notifiche quando un prodotto entra in stagione
- [ ] Dark mode

## 🤝 Contribuire

Le contribuzioni sono benvenute! Sentiti libero di:
1. Fare fork del progetto
2. Creare un branch per la tua feature (`git checkout -b feature/AmazingFeature`)
3. Committare le modifiche (`git commit -m 'Add some AmazingFeature'`)
4. Fare push del branch (`git push origin feature/AmazingFeature`)
5. Aprire una Pull Request

## 📝 Licenza

Questo progetto è distribuito sotto licenza MIT.

## 👨‍💻 Autore

Creato con ❤️ per promuovere il consumo di prodotti locali e stagionali in Italia.

---

**Nota**: Le immagini dei prodotti sono collegate da Unsplash. Per un uso in produzione, considera di scaricare e hostare le immagini localmente.
