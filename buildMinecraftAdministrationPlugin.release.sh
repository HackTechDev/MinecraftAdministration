#!/bin/sh

cd ..
rm MinecraftAdministration.zip
zip -r MinecraftAdministration.zip MinecraftAdministration -x *.git*
cd MinecraftAdministration
