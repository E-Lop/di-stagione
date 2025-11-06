#!/bin/bash

# Script per scaricare tutte le immagini dei prodotti da Wikimedia Commons
# Eseguire dalla root del progetto Laravel

echo "📥 Downloading product images from Wikimedia Commons..."
echo ""

# Crea la directory se non esiste
mkdir -p public/images/products

success=0
failed=0

# Funzione per scaricare un'immagine
download_image() {
    local filename="$1"
    local url="$2"
    local output="public/images/products/$filename"

    echo -n "⬇️  Downloading $filename... "

    # Aggiungi un user-agent e altri header per sembrare un browser
    if curl -L -s -f \
        -H "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36" \
        -H "Accept: image/avif,image/webp,image/apng,image/svg+xml,image/*,*/*;q=0.8" \
        -H "Accept-Language: it-IT,it;q=0.9,en-US;q=0.8,en;q=0.7" \
        -H "Referer: https://commons.wikimedia.org/" \
        -o "$output" "$url"; then
        # Verifica che sia un'immagine valida
        if file "$output" | grep -q -E "image|JPEG|PNG"; then
            echo "✓ Success"
            success=$((success + 1))
        else
            echo "✗ Failed (invalid file)"
            rm "$output"
            failed=$((failed + 1))
        fi
    else
        echo "✗ Failed (download error)"
        failed=$((failed + 1))
    fi

    # Pausa di 1 secondo tra i download per evitare rate limiting
    sleep 1
}

# Frutta
download_image "arance.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Orange-Fruit-Pieces.jpg/400px-Orange-Fruit-Pieces.jpg"
download_image "mele.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Red_Apple.jpg/400px-Red_Apple.jpg"
download_image "fragole.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/PerfectStrawberry.jpg/400px-PerfectStrawberry.jpg"
download_image "ciliegie.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Cherry_Stella444.jpg/400px-Cherry_Stella444.jpg"
download_image "pesche.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Autumn_Red_peaches.jpg/400px-Autumn_Red_peaches.jpg"
download_image "albicocche.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Apricots.jpg/400px-Apricots.jpg"
download_image "uva.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Kyoho-grape.jpg/400px-Kyoho-grape.jpg"
download_image "pere.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Pears.jpg/400px-Pears.jpg"
download_image "mandarini.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/Mandarin_Oranges_%28Citrus_Reticulata%29.jpg/400px-Mandarin_Oranges_%28Citrus_Reticulata%29.jpg"
download_image "melone.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Cantaloupes.jpg/400px-Cantaloupes.jpg"
download_image "anguria.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/4/47/Taiwan_2009_Tainan_City_Organic_Farm_Watermelon_FRD_7962.jpg/400px-Taiwan_2009_Tainan_City_Organic_Farm_Watermelon_FRD_7962.jpg"
download_image "fichi.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Figs.jpg/400px-Figs.jpg"

# Verdura
download_image "pomodori.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Tomato_je.jpg/400px-Tomato_je.jpg"
download_image "zucchine.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Courgette_J1.JPG/400px-Courgette_J1.JPG"
download_image "melanzane.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Solanum_melongena_24_08_2012_%281%29.JPG/400px-Solanum_melongena_24_08_2012_%281%29.JPG"
download_image "peperoni.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Green-Red-Orange-Bell-Pepper-Selection.jpg/400px-Green-Red-Orange-Bell-Pepper-Selection.jpg"
download_image "lattuga.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Lactuca_sativa_-_butterhead_lettuce.jpg/400px-Lactuca_sativa_-_butterhead_lettuce.jpg"
download_image "spinaci.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/Spinach_bunch.jpg/400px-Spinach_bunch.jpg"
download_image "cavolfiore.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Cauliflower.JPG/400px-Cauliflower.JPG"
download_image "broccoli.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Broccoli_DSC00862.png/400px-Broccoli_DSC00862.png"
download_image "carciofi.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Artichoke_J1.jpg/400px-Artichoke_J1.jpg"
download_image "asparagi.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Asparagus-Bundle.jpg/400px-Asparagus-Bundle.jpg"
download_image "fagiolini.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/ARS_lima_beans.jpg/400px-ARS_lima_beans.jpg"
download_image "zucca.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Calabaza_Butternut.jpg/400px-Calabaza_Butternut.jpg"
download_image "radicchio.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Radicchio_di_Treviso.jpg/400px-Radicchio_di_Treviso.jpg"
download_image "finocchi.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/7/7d/Foeniculum_vulgare_Florence_Fennel.jpg/400px-Foeniculum_vulgare_Florence_Fennel.jpg"

echo ""
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo "📊 Download Summary:"
echo "   ✓ Success: $success"
echo "   ✗ Failed:  $failed"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo ""

if [ $failed -eq 0 ]; then
    echo "🎉 All images downloaded successfully!"
    echo ""
    echo "Next steps:"
    echo "1. Run: php artisan db:seed --class=ProductSeeder"
    echo "   or: php artisan migrate:fresh --seed"
    echo "2. The images will now be served locally from /images/products/"
else
    echo "⚠️  Some images failed to download."
    echo "You may need to download them manually from Wikimedia Commons."
fi
