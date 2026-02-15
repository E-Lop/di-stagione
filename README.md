# 🍃 Di Stagione - Catalogo Frutta e Verdura di Stagione in Italia

🌐 **[Prova l'app live](https://di-stagione.netlify.app/)**

Una web app statica moderna per scoprire e catalogare tutta la frutta e verdura di stagione in Italia, costruita con React, React Router, Tailwind CSS e Shadcn UI. Ottimizzata per il deploy su Netlify.

## ✨ Caratteristiche

- ⚡ **App statica ultra-veloce**: Nessun backend, caricamento istantaneo, hosting gratuito su Netlify
- 🔎 **Autocomplete intelligente**: Ricerca con suggerimenti in tempo reale mentre digiti
- 📅 **Visualizzazione per mese**: Scopri quali prodotti sono di stagione in ogni mese dell'anno
- 🗓️ **Mese corrente automatico**: La homepage mostra automaticamente i prodotti del mese corrente
- 🌸 **Filtri per stagione**: Naviga i prodotti per primavera, estate, autunno e inverno
- 🔍 **Ricerca avanzata**: Cerca facilmente qualsiasi frutto o verdura con navigazione da tastiera
- 🍎 **Filtri per tipo**: Filtra tra frutta e verdura
- 🔤 **Ordinamento alfabetico**: Tutti i prodotti sono ordinati automaticamente A-Z
- 📱 **Design responsivo**: Interfaccia moderna e mobile-friendly
- 🖼️ **Immagini AI**: Immagini generate con Bing AI per qualità uniforme
- 📖 **Pagine di dettaglio**: Informazioni complete su ogni prodotto con descrizione e periodo di stagionalità
- 🔗 **Badge interattivi**: Clicca sui mesi nella pagina di dettaglio per vedere tutti i prodotti di quel periodo
- ⌨️ **Navigazione da tastiera**: Supporto completo per frecce, Enter ed Esc nell'autocomplete
- 📍 **Memoria posizione**: La posizione di scroll viene conservata quando torni dalla pagina di dettaglio
- 🔝 **Scroll to top**: Pulsante floating per tornare rapidamente in cima alla pagina

## 🛠️ Tecnologie Utilizzate

- **Frontend**: React 18
- **Router**: React Router DOM
- **Build Tool**: Vite
- **UI Framework**: Tailwind CSS 4
- **Componenti UI**: Shadcn U
- **Icone**: Lucide React
- **Deployment**: Netlify
- **Dati**: JSON statico

## 📋 Prerequisiti

- Node.js >= 20.19 (raccomandato per Vite 7)
- NPM (o Yarn)

## 🚀 Installazione

1. **Clona il repository**
```bash
git clone <repository-url>
cd di-stagione
```

2. **Installa le dipendenze**
```bash
npm install
```

3. **Avvia il server di sviluppo**
```bash
npm run dev
```

L'applicazione sarà disponibile su `http://localhost:5173`

4. **Build per produzione**
```bash
npm run build
```

I file ottimizzati saranno generati nella cartella `dist/`

5. **Anteprima della build di produzione**
```bash
npm run preview
```

## 📁 Struttura del Progetto

```
di-stagione/
├── public/
│   ├── data/
│   │   └── products.json             # Dati prodotti stagionali
│   └── images/                       # Immagini prodotti (generate con Bing AI)
├── src/
│   ├── components/
│   │   ├── ui/                       # Componenti Shadcn UI
│   │   │   ├── autocomplete.jsx      # Autocomplete con suggerimenti
│   │   │   ├── badge.jsx
│   │   │   ├── button.jsx
│   │   │   ├── card.jsx
│   │   │   └── input.jsx
│   │   └── ScrollToTop.jsx           # Pulsante floating scroll to top
│   ├── hooks/
│   │   └── useProducts.js            # Hook per gestione prodotti
│   ├── lib/
│   │   └── utils.js                  # Utility functions
│   ├── pages/
│   │   ├── ProductsIndex.jsx         # Pagina principale con filtri e memoria scroll
│   │   └── ProductShow.jsx           # Pagina dettaglio con badge interattivi
│   ├── index.css                     # Stili Tailwind
│   └── main.jsx                      # Entry point React
├── index.html                        # HTML template
├── vite.config.js                    # Configurazione Vite
├── tailwind.config.js                # Configurazione Tailwind
├── netlify.toml                      # Configurazione Netlify
└── package.json                      # Dipendenze del progetto
```

## 🎨 Componenti UI Utilizzati

- **Autocomplete**: Componente custom per ricerca con suggerimenti in tempo reale
  - Filtro client-side per massime performance
  - Navigazione da tastiera (frecce, Enter, Esc)
  - Visualizzazione immagini e dettagli prodotto
  - Limite minimo 2 caratteri, massimo 10 suggerimenti
  - Ordinamento alfabetico automatico dei risultati
- **ScrollToTop**: Pulsante floating per tornare in cima alla pagina
  - Appare automaticamente dopo aver scrollato oltre la viewport
  - Animazione smooth per una migliore UX
- **Button**: Pulsanti con varianti multiple
- **Card**: Card per visualizzare i prodotti
- **Input**: Input per la ricerca
- **Badge**: Badge per categorie e stagioni (ora interattivi nella pagina di dettaglio)

## 📊 Struttura Dati

I dati dei prodotti sono memorizzati in un file JSON statico (`public/data/products.json`):

```json
{
  "id": 1,
  "name": "Pomodori",
  "name_en": "Tomatoes",
  "type": "verdura",
  "description": "Descrizione del prodotto",
  "image": "/images/pomodori.jpg",
  "slug": "pomodori",
  "months": [6, 7, 8, 9]
}
```

### Campi:
- `id`: ID univoco del prodotto
- `name`: Nome in italiano
- `name_en`: Nome in inglese
- `type`: `frutta` o `verdura`
- `description`: Descrizione dettagliata
- `image`: Path dell'immagine (generata con Bing AI)
- `slug`: Slug per URL SEO-friendly
- `months`: Array dei mesi di stagionalità (1-12)

## 🔗 Routes

- `/`: Pagina principale con tutti i prodotti stagionali
- `/prodotti/{slug}`: Pagina di dettaglio del prodotto

## 🌱 Prodotti Inclusi

Il catalogo include una vasta gamma di prodotti stagionali italiani:

**Frutta**: Arance, Mele, Fragole, Ciliegie, Pesche, Albicocche, Uva, Pere, Mandarini, Melone, Anguria, Fichi

**Verdura**: Pomodori, Zucchine, Melanzane, Peperoni, Lattuga, Spinaci, Cavolfiore, Broccoli, Carciofi, Asparagi, Fagiolini, Zucca, Radicchio, Finocchi

## 🚀 Deployment

L'applicazione è configurata per il deployment automatico su **Netlify**:

1. Collega il repository GitHub a Netlify
2. Le impostazioni di build sono già configurate in `netlify.toml`:
   - Build command: `npm run build`
   - Publish directory: `dist`
   - Node version: 22

3. Ogni push sul branch principale attiverà automaticamente una nuova build

### Deploy manuale

Puoi anche deployare manualmente:

```bash
npm run build
netlify deploy --prod
```

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

**Nota**: Le immagini dei prodotti sono state generate utilizzando Bing AI Image Creator per garantire coerenza visiva e qualità uniforme in tutto il catalogo.
