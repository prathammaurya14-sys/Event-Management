#!/bin/bash

# Create a folder for the final static files
mkdir -p dist

# Convert every .php file in the root to .html inside the dist folder
for f in *.php; do 
  php "$f" > "dist/${f%.php}.html"
  echo "Converted $f to dist/${f%.php}.html"
done

# Copy your CSS, JS, and Images to the dist folder so they aren't left behind
cp -r css dist/ 2>/dev/null || :
cp -r js dist/ 2>/dev/null || :
cp -r images dist/ 2>/dev/null || :
