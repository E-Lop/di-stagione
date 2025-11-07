#!/bin/bash

echo "🧹 Removing all incorrect images..."
echo ""

# List of 11 images to remove
images_to_remove=(
    "asparagi.jpg"
    "carciofi.jpg"
    "fagiolini.jpg"
    "fichi.jpg"
    "finocchi.jpg"
    "melone.jpg"
    "peperoni.jpg"
    "radicchio.jpg"
    "spinaci.jpg"
    "zucca.jpg"
    "zucchine.jpg"
)

removed=0
for img in "${images_to_remove[@]}"; do
    if [ -f "public/images/products/$img" ]; then
        rm "public/images/products/$img"
        echo "  🗑️  Removed: $img"
        removed=$((removed + 1))
    else
        echo "  ⚠️  Not found: $img"
    fi
done

echo ""
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo "✓ Removed $removed incorrect images"
echo ""
echo "Next steps:"
echo "1. Open: manual-search-guide.html"
echo "2. Download the 11 correct images from Pexels"
echo "3. Save them in public/images/products/"
echo "4. Run: ./check-images.sh to verify"
