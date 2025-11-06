#!/bin/bash

echo "🔍 Finding and fixing broken 2KB images..."
echo ""

# Find all files that are suspiciously small (under 3KB)
broken_files=()

# Check JPG files
for img in public/images/products/*.jpg; do
    if [ -f "$img" ]; then
        size=$(stat -f%z "$img" 2>/dev/null || stat -c%s "$img" 2>/dev/null)
        if [ "$size" -lt 3000 ]; then
            filename=$(basename "$img")
            echo "🗑️  Removing broken file: $filename (${size} bytes)"
            rm "$img"
            broken_files+=("$filename")
        fi
    fi
done

# Check PNG files
for img in public/images/products/*.png; do
    if [ -f "$img" ]; then
        size=$(stat -f%z "$img" 2>/dev/null || stat -c%s "$img" 2>/dev/null)
        if [ "$size" -lt 3000 ]; then
            filename=$(basename "$img")
            echo "🗑️  Removing broken file: $filename (${size} bytes)"
            rm "$img"
            broken_files+=("$filename")
        fi
    fi
done

if [ ${#broken_files[@]} -eq 0 ]; then
    echo "✓ No broken files found!"
    exit 0
fi

echo ""
echo "📥 Downloading replacements from alternative Wikimedia URLs..."
echo ""

# Function to download with simple retry
download_replacement() {
    local filename="$1"
    local url="$2"
    local output="public/images/products/$filename"

    echo -n "Downloading $filename... "

    # Try without thumb (original size images)
    if curl -L -s -f \
        -H "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36" \
        -H "Accept: image/*" \
        -o "$output" "$url"; then

        size=$(stat -f%z "$output" 2>/dev/null || stat -c%s "$output" 2>/dev/null)
        if [ "$size" -gt 5000 ]; then
            echo "✓ Success (${size} bytes)"
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

# Alternative URLs - using original files instead of thumbnails
download_replacement "albicocche.jpg" "https://upload.wikimedia.org/wikipedia/commons/f/f8/Apricots.jpg"
sleep 2
download_replacement "mandarini.jpg" "https://upload.wikimedia.org/wikipedia/commons/7/74/Mandarin_Oranges_%28Citrus_Reticulata%29.jpg"
sleep 2
download_replacement "melone.jpg" "https://upload.wikimedia.org/wikipedia/commons/6/6c/Cantaloupes.jpg"
sleep 2
download_replacement "fichi.jpg" "https://upload.wikimedia.org/wikipedia/commons/6/6a/Figs.jpg"
sleep 2
download_replacement "zucchine.jpg" "https://upload.wikimedia.org/wikipedia/commons/3/3c/Courgette_J1.JPG"
sleep 2
download_replacement "peperoni.jpg" "https://upload.wikimedia.org/wikipedia/commons/8/85/Green-Red-Orange-Bell-Pepper-Selection.jpg"
sleep 2
download_replacement "lattuga.jpg" "https://upload.wikimedia.org/wikipedia/commons/2/2b/Lactuca_sativa_-_butterhead_lettuce.jpg"
sleep 2
download_replacement "spinaci.jpg" "https://upload.wikimedia.org/wikipedia/commons/f/f7/Spinach_bunch.jpg"
sleep 2
download_replacement "cavolfiore.jpg" "https://upload.wikimedia.org/wikipedia/commons/2/2a/Cauliflower.JPG"
sleep 2
download_replacement "broccoli.jpg" "https://upload.wikimedia.org/wikipedia/commons/f/f2/Broccoli_DSC00862.png"
sleep 2
download_replacement "carciofi.jpg" "https://upload.wikimedia.org/wikipedia/commons/6/6c/Artichoke_J1.jpg"
sleep 2
download_replacement "asparagi.jpg" "https://upload.wikimedia.org/wikipedia/commons/e/e4/Asparagus-Bundle.jpg"
sleep 2
download_replacement "fagiolini.jpg" "https://upload.wikimedia.org/wikipedia/commons/c/c1/ARS_lima_beans.jpg"
sleep 2
download_replacement "zucca.jpg" "https://upload.wikimedia.org/wikipedia/commons/5/5b/Calabaza_Butternut.jpg"
sleep 2
download_replacement "radicchio.jpg" "https://upload.wikimedia.org/wikipedia/commons/d/d3/Radicchio_di_Treviso.jpg"
sleep 2
download_replacement "finocchi.jpg" "https://upload.wikimedia.org/wikipedia/commons/7/7d/Foeniculum_vulgare_Florence_Fennel.jpg"

echo ""
echo "✨ Done! Run ./check-images.sh to verify all images are now valid."
