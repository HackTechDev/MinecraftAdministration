#!/bin/sh

cd ..
rm MinecraftAdministration.zip
zip -r MinecraftAdministration.zip MinecraftAdministration -x "MinecraftAdministration/.git"
cd MinecraftAdministration
