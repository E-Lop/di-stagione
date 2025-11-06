#!/bin/bash

echo "🔧 Fixing incorrect product images..."
echo ""
echo "Removing and re-downloading: peperoni, zucca, radicchio, finocchi, spinaci"
echo ""

# Remove incorrect images
rm -f public/images/products/peperoni.jpg
rm -f public/images/products/zucca.jpg
rm -f public/images/products/radicchio.jpg
rm -f public/images/products/finocchi.jpg
rm -f public/images/products/spinaci.jpg

# Funzione per scaricare
download_image() {
    local filename="$1"
    local url="$2"
    local label="$3"
    local output="public/images/products/$filename"

    echo -n "📥 $label ($filename)... "

    if curl -L -s -f \
        -H "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36" \
        -o "$output" "$url"; then

        size=$(stat -f%z "$output" 2>/dev/null || stat -c%s "$output" 2>/dev/null)
        if [ "$size" -gt 10000 ]; then
            echo "✓ Success (${size} bytes)"
            sleep 2
            return 0
        else
            rm "$output"
            echo "✗ Failed (file too small)"
            return 1
        fi
    else
        echo "✗ Failed (download error)"
        return 1
    fi
}

# Download con URL più specifici per le immagini corrette
download_image "peperoni.jpg" "https://images.pexels.com/photos/3872425/pexels-photo-3872425.jpeg?auto=compress&cs=tinysrgb&w=400" "Peperoni (Bell Peppers)"
download_image "spinaci.jpg" "https://images.pexels.com/photos/2255935/pexels-photo-2255935.jpeg?auto=compress&cs=tinysrgb&w=400" "Spinaci (Spinach)"
download_image "zucca.jpg" "https://images.pexels.com/photos/1656666/pexels-photo-1656666.jpeg?auto=compress&cs=tinysrgb&w=400" "Zucca (Butternut Squash)"
download_image "radicchio.jpg" "https://images.pexels.com/photos/5945798/pexels-photo-5945798.jpeg?auto=compress&cs=tinysrgb&w=400" "Radicchio"
download_image "finocchi.jpg" "https://images.pexels.com/photos/7763629/pexels-photo-7763629.jpeg?auto=compress&cs=tinysrgb&w=400" "Finocchi (Fennel)"

echo ""
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo ""
echo "✅ Download completato!"
echo ""
echo "Verifica le immagini con: ./check-images.sh"
echo ""
echo "Se alcune immagini sono ancora sbagliate, possiamo cercare URL alternativi."
