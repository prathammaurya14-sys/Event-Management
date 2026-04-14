#!/bin/bash
# 1. Create the folder Netlify will look into
mkdir -p dist

# 2. Convert index.php to index.html (This is your homepage)
# Netlify MUST have an index.html in the root of the 'dist' folder
php index.php > dist/index.html

# 3. Convert all other PHP files
for file in *.php; do
    if [ "$file" != "index.php" ]; then
        php "$file" > "dist/${file%.php}.html"
    fi
done

# 4. CRITICAL: Copy your asset folders
# If your CSS is in a folder named 'css', copy it into 'dist'
cp -r css dist/ 2>/dev/null || true
cp -r js dist/ 2>/dev/null || true
cp -r images dist/ 2>/dev/null || true
cp -r assets dist/ 2>/dev/null || true

# 5. Copy any individual CSS/JS files sitting in the root
cp *.css dist/ 2>/dev/null || true
cp *.js dist/ 2>/dev/null || true
