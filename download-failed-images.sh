#!/bin/bash

# Script per scaricare solo le immagini fallite con output verboso
echo "📥 Downloading failed images with verbose output..."
echo ""

mkdir -p public/images/products

# Funzione per scaricare con retry e output verboso
download_with_retry() {
    local filename="$1"
    local url="$2"
    local output="public/images/products/$filename"

    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
    echo "Downloading: $filename"
    echo "URL: $url"
    echo ""

    for attempt in 1 2 3; do
        echo "Attempt $attempt/3..."

        if curl -v -L \
            -H "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36" \
            -H "Accept: image/*" \
            -H "Referer: https://commons.wikimedia.org/" \
            -o "$output" "$url" 2>&1 | grep -E "HTTP|error|failed"; then

            if [ -f "$output" ] && file "$output" | grep -q -E "image|JPEG|PNG"; then
                echo "✓ Success!"
                echo ""
                sleep 2
                return 0
            fi
        fi

        echo "Failed attempt $attempt"
        sleep 3
    done

    echo "✗ All attempts failed for $filename"
    echo ""
    return 1
}

# Download only the failed images with alternative URLs where possible
download_with_retry "albicocche.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Apricots.jpg/400px-Apricots.jpg"
download_with_retry "mandarini.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/Mandarin_Oranges_%28Citrus_Reticulata%29.jpg/400px-Mandarin_Oranges_%28Citrus_Reticulata%29.jpg"
download_with_retry "melone.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Cantaloupes.jpg/400px-Cantaloupes.jpg"
download_with_retry "fichi.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Figs.jpg/400px-Figs.jpg"
download_with_retry "zucchine.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Courgette_J1.JPG/400px-Courgette_J1.JPG"
download_with_retry "peperoni.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Green-Red-Orange-Bell-Pepper-Selection.jpg/400px-Green-Red-Orange-Bell-Pepper-Selection.jpg"
download_with_retry "lattuga.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Lactuca_sativa_-_butterhead_lettuce.jpg/400px-Lactuca_sativa_-_butterhead_lettuce.jpg"
download_with_retry "spinaci.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/Spinach_bunch.jpg/400px-Spinach_bunch.jpg"
download_with_retry "cavolfiore.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Cauliflower.JPG/400px-Cauliflower.JPG"
download_with_retry "broccoli.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Broccoli_DSC00862.png/400px-Broccoli_DSC00862.png"
download_with_retry "carciofi.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Artichoke_J1.jpg/400px-Artichoke_J1.jpg"
download_with_retry "asparagi.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Asparagus-Bundle.jpg/400px-Asparagus-Bundle.jpg"
download_with_retry "fagiolini.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/ARS_lima_beans.jpg/400px-ARS_lima_beans.jpg"
download_with_retry "zucca.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Calabaza_Butternut.jpg/400px-Calabaza_Butternut.jpg"
download_with_retry "radicchio.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Radicchio_di_Treviso.jpg/400px-Radicchio_di_Treviso.jpg"
download_with_retry "finocchi.jpg" "https://upload.wikimedia.org/wikipedia/commons/thumb/7/7d/Foeniculum_vulgare_Florence_Fennel.jpg/400px-Foeniculum_vulgare_Florence_Fennel.jpg"

echo ""
echo "Done! Check public/images/products/ for downloaded files"
