@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../vendor/doctrine/doctrine-module/bin/doctrine-module
php "%BIN_TARGET%" %*
