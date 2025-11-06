#!/bin/bash

echo "🔍 Checking image files for validity..."
echo ""

valid=0
invalid=0
missing=0
invalid_files=()

expected_images=(
    "arance.jpg"
    "mele.jpg"
    "fragole.jpg"
    "ciliegie.jpg"
    "pesche.jpg"
    "albicocche.jpg"
    "uva.jpg"
    "pere.jpg"
    "mandarini.jpg"
    "melone.jpg"
    "anguria.jpg"
    "fichi.jpg"
    "pomodori.jpg"
    "zucchine.jpg"
    "melanzane.jpg"
    "peperoni.jpg"
    "lattuga.jpg"
    "spinaci.jpg"
    "cavolfiore.jpg"
    "broccoli.jpg"
    "carciofi.jpg"
    "asparagi.jpg"
    "fagiolini.jpg"
    "zucca.jpg"
    "radicchio.jpg"
    "finocchi.jpg"
)

for img_name in "${expected_images[@]}"; do
    img_path="public/images/products/$img_name"

    if [ ! -f "$img_path" ]; then
        echo "❌ MISSING: $img_name"
        missing=$((missing + 1))
        invalid_files+=("$img_name")
    else
        file_type=$(file -b "$img_path")
        file_size=$(stat -f%z "$img_path" 2>/dev/null || stat -c%s "$img_path" 2>/dev/null)

        if echo "$file_type" | grep -q -E "JPEG|PNG|image"; then
            if [ "$file_size" -gt 1000 ]; then
                echo "✓ VALID: $img_name ($file_type, $(numfmt --to=iec-i --suffix=B $file_size 2>/dev/null || echo ${file_size}B))"
                valid=$((valid + 1))
            else
                echo "⚠️  TOO SMALL: $img_name ($file_size bytes - probably corrupt)"
                invalid=$((invalid + 1))
                invalid_files+=("$img_name")
            fi
        else
            echo "❌ INVALID: $img_name ($file_type)"
            invalid=$((invalid + 1))
            invalid_files+=("$img_name")

            # Show first few bytes to diagnose
            echo "   First 100 chars: $(head -c 100 "$img_path")"
        fi
    fi
done

echo ""
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo "📊 Summary:"
echo "   ✓ Valid:   $valid"
echo "   ❌ Invalid: $invalid"
echo "   📭 Missing: $missing"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

if [ ${#invalid_files[@]} -gt 0 ]; then
    echo ""
    echo "Files that need to be fixed:"
    printf '   - %s\n' "${invalid_files[@]}"
fi
