#!/bin/bash

# Script per scaricare tutte le immagini dei prodotti da Wikimedia Commons
# Eseguire dalla root del progetto Laravel

echo "📥 Downloading product images from Wikimedia Commons..."
echo ""

# Crea la directory se non esiste
mkdir -p public/images/products

# Array associativo: nome_file => URL
declare -A images=(
    # Frutta
    ["arance.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Orange-Fruit-Pieces.jpg/400px-Orange-Fruit-Pieces.jpg"
    ["mele.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Red_Apple.jpg/400px-Red_Apple.jpg"
    ["fragole.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/PerfectStrawberry.jpg/400px-PerfectStrawberry.jpg"
    ["ciliegie.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Cherry_Stella444.jpg/400px-Cherry_Stella444.jpg"
    ["pesche.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Autumn_Red_peaches.jpg/400px-Autumn_Red_peaches.jpg"
    ["albicocche.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Apricots.jpg/400px-Apricots.jpg"
    ["uva.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Kyoho-grape.jpg/400px-Kyoho-grape.jpg"
    ["pere.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Pears.jpg/400px-Pears.jpg"
    ["mandarini.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/Mandarin_Oranges_%28Citrus_Reticulata%29.jpg/400px-Mandarin_Oranges_%28Citrus_Reticulata%29.jpg"
    ["melone.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Cantaloupes.jpg/400px-Cantaloupes.jpg"
    ["anguria.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/4/47/Taiwan_2009_Tainan_City_Organic_Farm_Watermelon_FRD_7962.jpg/400px-Taiwan_2009_Tainan_City_Organic_Farm_Watermelon_FRD_7962.jpg"
    ["fichi.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Figs.jpg/400px-Figs.jpg"

    # Verdura
    ["pomodori.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Tomato_je.jpg/400px-Tomato_je.jpg"
    ["zucchine.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Courgette_J1.JPG/400px-Courgette_J1.JPG"
    ["melanzane.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Solanum_melongena_24_08_2012_%281%29.JPG/400px-Solanum_melongena_24_08_2012_%281%29.JPG"
    ["peperoni.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Green-Red-Orange-Bell-Pepper-Selection.jpg/400px-Green-Red-Orange-Bell-Pepper-Selection.jpg"
    ["lattuga.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Lactuca_sativa_-_butterhead_lettuce.jpg/400px-Lactuca_sativa_-_butterhead_lettuce.jpg"
    ["spinaci.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/Spinach_bunch.jpg/400px-Spinach_bunch.jpg"
    ["cavolfiore.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Cauliflower.JPG/400px-Cauliflower.JPG"
    ["broccoli.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Broccoli_DSC00862.png/400px-Broccoli_DSC00862.png"
    ["carciofi.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Artichoke_J1.jpg/400px-Artichoke_J1.jpg"
    ["asparagi.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Asparagus-Bundle.jpg/400px-Asparagus-Bundle.jpg"
    ["fagiolini.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/ARS_lima_beans.jpg/400px-ARS_lima_beans.jpg"
    ["zucca.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Calabaza_Butternut.jpg/400px-Calabaza_Butternut.jpg"
    ["radicchio.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Radicchio_di_Treviso.jpg/400px-Radicchio_di_Treviso.jpg"
    ["finocchi.jpg"]="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7d/Foeniculum_vulgare_Florence_Fennel.jpg/400px-Foeniculum_vulgare_Florence_Fennel.jpg"
)

success=0
failed=0

# Download di ogni immagine
for filename in "${!images[@]}"; do
    url="${images[$filename]}"
    output="public/images/products/$filename"

    echo -n "⬇️  Downloading $filename... "

    if curl -L -s -f -o "$output" "$url"; then
        # Verifica che sia un'immagine valida
        if file "$output" | grep -q "image\|JPEG\|PNG"; then
            echo "✓ Success"
            ((success++))
        else
            echo "✗ Failed (invalid file)"
            rm "$output"
            ((failed++))
        fi
    else
        echo "✗ Failed (download error)"
        ((failed++))
    fi
done

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
