#!/bin/bash

echo "🔧 Fixing 11 incorrect product images..."
echo ""
echo "Removing images with wrong content or missing..."
echo ""

# Remove the 11 incorrect/missing images
rm -f public/images/products/asparagi.jpg
rm -f public/images/products/carciofi.jpg
rm -f public/images/products/fagiolini.jpg
rm -f public/images/products/fichi.jpg
rm -f public/images/products/finocchi.jpg
rm -f public/images/products/melone.jpg
rm -f public/images/products/peperoni.jpg
rm -f public/images/products/radicchio.jpg
rm -f public/images/products/spinaci.jpg
rm -f public/images/products/zucca.jpg
rm -f public/images/products/zucchine.jpg

echo "✓ Removed 11 incorrect images"
echo ""
echo "Downloading correct images..."
echo ""

# Funzione per scaricare
download_image() {
    local filename="$1"
    local url="$2"
    local label="$3"
    local output="public/images/products/$filename"

    echo -n "📥 $label... "

    if curl -L -s -f \
        -H "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36" \
        -H "Accept: image/jpeg,image/png,image/*" \
        -o "$output" "$url"; then

        size=$(stat -f%z "$output" 2>/dev/null || stat -c%s "$output" 2>/dev/null)
        if [ "$size" -gt 10000 ]; then
            echo "✓ ${size} bytes"
            sleep 2
            return 0
        else
            rm "$output"
            echo "✗ Too small"
            return 1
        fi
    else
        echo "✗ Download failed"
        return 1
    fi
}

# Download images with very specific search terms
download_image "asparagi.jpg" "https://images.pexels.com/photos/5677862/pexels-photo-5677862.jpeg?auto=compress&cs=tinysrgb&w=500" "Asparagi (Asparagus)"

download_image "carciofi.jpg" "https://images.pexels.com/photos/8844288/pexels-photo-8844288.jpeg?auto=compress&cs=tinysrgb&w=500" "Carciofi (Artichokes)"

download_image "fagiolini.jpg" "https://images.pexels.com/photos/7456983/pexels-photo-7456983.jpeg?auto=compress&cs=tinysrgb&w=500" "Fagiolini (Green Beans)"

download_image "fichi.jpg" "https://images.pexels.com/photos/5966630/pexels-photo-5966630.jpeg?auto=compress&cs=tinysrgb&w=500" "Fichi (Figs)"

download_image "finocchi.jpg" "https://images.pexels.com/photos/7456982/pexels-photo-7456982.jpeg?auto=compress&cs=tinysrgb&w=500" "Finocchi (Fennel bulb)"

download_image "melone.jpg" "https://images.pexels.com/photos/5966466/pexels-photo-5966466.jpeg?auto=compress&cs=tinysrgb&w=500" "Melone (Cantaloupe)"

download_image "peperoni.jpg" "https://images.pexels.com/photos/3872425/pexels-photo-3872425.jpeg?auto=compress&cs=tinysrgb&w=500" "Peperoni (Bell Peppers)"

download_image "radicchio.jpg" "https://images.pexels.com/photos/6157641/pexels-photo-6157641.jpeg?auto=compress&cs=tinysrgb&w=500" "Radicchio (Red chicory)"

download_image "spinaci.jpg" "https://images.pexels.com/photos/2325843/pexels-photo-2325843.jpeg?auto=compress&cs=tinysrgb&w=500" "Spinaci (Spinach leaves)"

download_image "zucca.jpg" "https://images.pexels.com/photos/1482101/pexels-photo-1482101.jpeg?auto=compress&cs=tinysrgb&w=500" "Zucca (Butternut squash)"

download_image "zucchine.jpg" "https://images.pexels.com/photos/6157047/pexels-photo-6157047.jpeg?auto=compress&cs=tinysrgb&w=500" "Zucchine (Zucchini/Courgette)"

echo ""
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo ""
echo "✅ Download completato!"
echo ""
echo "Controlla le immagini con: ./check-images.sh"
echo ""
echo "Se alcune immagini sono ancora sbagliate,"
echo "apri manual-download-10-images.html nel browser per scaricarle manualmente"
