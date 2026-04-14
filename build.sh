#!/bin/bash

# 1. Create the distribution folder
mkdir -p dist

# 2. Copy static assets (CSS, Images, JS) to dist
# Replace 'css', 'js', 'images' with your actual folder names
cp -r css dist/ 2>/dev/null || true
cp -r js dist/ 2>/dev/null || true
cp -r images dist/ 2>/dev/null || true

# 3. Convert every PHP file to HTML
for file in *.php; do
    if [ -f "$file" ]; then
        filename=$(basename "$file" .php)
        echo "Processing $file -> dist/$filename.html"
        # This executes the PHP and saves the resulting HTML
        php "$file" > "dist/$filename.html"
    fi
done

echo "Build complete. Files are in /dist"
