#!/bin/bash

PANEL_DIR="/var/www/pterodactyl"

echo "== Instalasi SecureLogger Extension =="

ZIP_URL="https://raw.githubusercontent.com/Yigdthbotm/bashsh/main/SecureLogger_Extension.zip"
TEMP_DIR=$(mktemp -d)

echo "== Mengunduh ekstensi..."
curl -L -o "$TEMP_DIR/extension.zip" "$ZIP_URL" || { echo "Gagal download."; exit 1; }

echo "== Mengekstrak file..."
unzip "$TEMP_DIR/extension.zip" -d "$TEMP_DIR/extracted" || { echo "Gagal extract."; exit 1; }

echo "== Menyalin file ke direktori panel..."
cp -r "$TEMP_DIR/extracted/"* "$PANEL_DIR"

echo "== Build ulang panel..."
cd "$PANEL_DIR" || exit
yarn install
npm run build:production

echo "== Instalasi selesai! SecureLogger Extension aktif."
