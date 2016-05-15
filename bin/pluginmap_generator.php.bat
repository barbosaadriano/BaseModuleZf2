@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../vendor/zendframework/zendframework/bin/pluginmap_generator.php
php "%BIN_TARGET%" %*
