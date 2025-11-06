#!/bin/bash

echo "📥 Downloading images from alternative free sources (Pexels, Unsplash)..."
echo ""

mkdir -p public/images/products

# Funzione per scaricare
download_image() {
    local filename="$1"
    local url="$2"
    local output="public/images/products/$filename"

    echo -n "Downloading $filename... "

    if curl -L -s -f \
        -H "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36" \
        -o "$output" "$url"; then

        size=$(stat -f%z "$output" 2>/dev/null || stat -c%s "$output" 2>/dev/null)
        if [ "$size" -gt 10000 ]; then
            echo "✓ Success (${size} bytes)"
            sleep 1
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

# Immagini da Pexels e Unsplash (URL diretti alle immagini)
echo "🍊 Frutta..."
download_image "albicocche.jpg" "https://images.pexels.com/photos/1028598/pexels-photo-1028598.jpeg?auto=compress&cs=tinysrgb&w=400"
download_image "mandarini.jpg" "https://images.pexels.com/photos/327098/pexels-photo-327098.jpeg?auto=compress&cs=tinysrgb&w=400"
download_image "melone.jpg" "https://images.pexels.com/photos/2363347/pexels-photo-2363347.jpeg?auto=compress&cs=tinysrgb&w=400"
download_image "fichi.jpg" "https://images.pexels.com/photos/5966630/pexels-photo-5966630.jpeg?auto=compress&cs=tinysrgb&w=400"

echo ""
echo "🥬 Verdura..."
download_image "zucchine.jpg" "https://images.pexels.com/photos/6157047/pexels-photo-6157047.jpeg?auto=compress&cs=tinysrgb&w=400"
download_image "peperoni.jpg" "https://images.pexels.com/photos/1271918/pexels-photo-1271918.jpeg?auto=compress&cs=tinysrgb&w=400"
download_image "lattuga.jpg" "https://images.pexels.com/photos/1352199/pexels-photo-1352199.jpeg?auto=compress&cs=tinysrgb&w=400"
download_image "spinaci.jpg" "https://images.pexels.com/photos/2255935/pexels-photo-2255935.jpeg?auto=compress&cs=tinysrgb&w=400"
download_image "cavolfiore.jpg" "https://images.pexels.com/photos/1359326/pexels-photo-1359326.jpeg?auto=compress&cs=tinysrgb&w=400"
download_image "broccoli.jpg" "https://images.pexels.com/photos/47347/broccoli-vegetable-food-healthy-47347.jpeg?auto=compress&cs=tinysrgb&w=400"
download_image "carciofi.jpg" "https://images.pexels.com/photos/15241490/pexels-photo-15241490.jpeg?auto=compress&cs=tinysrgb&w=400"
download_image "asparagi.jpg" "https://images.pexels.com/photos/5677862/pexels-photo-5677862.jpeg?auto=compress&cs=tinysrgb&w=400"
download_image "fagiolini.jpg" "https://images.pexels.com/photos/1656666/pexels-photo-1656666.jpeg?auto=compress&cs=tinysrgb&w=400"
download_image "zucca.jpg" "https://images.pexels.com/photos/1482101/pexels-photo-1482101.jpeg?auto=compress&cs=tinysrgb&w=400"
download_image "radicchio.jpg" "https://images.pexels.com/photos/7763674/pexels-photo-7763674.jpeg?auto=compress&cs=tinysrgb&w=400"
download_image "finocchi.jpg" "https://images.pexels.com/photos/6157658/pexels-photo-6157658.jpeg?auto=compress&cs=tinysrgb&w=400"

echo ""
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo "✅ Download completato!"
echo ""
echo "Verifica le immagini con: ./check-images.sh"
echo "Poi esegui: php artisan migrate:fresh --seed"
