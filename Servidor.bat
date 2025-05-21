::.\Servidor.bat
@echo off
cd /d C:\laragon\www\purificadora

:: 1. Inicia Laravel
start "" cmd /k "php artisan serve --host=0.0.0.0 --port=8000"

:: 2. Espera a que Laravel arranque (ajusta si tarda más en tu equipo)
timeout /t 5 > nul

:: 3. Inicia Ngrok en segundo plano
start "" ngrok http 8000 > nul

:: 4. Espera a que Ngrok genere el enlace
timeout /t 5 > nul

:: 5. Obtener la URL pública de Ngrok con PowerShell
for /f "delims=" %%A in ('powershell -Command "(Invoke-WebRequest -UseBasicParsing http://127.0.0.1:4040/api/tunnels).Content | ConvertFrom-Json | Select-Object -ExpandProperty tunnels | Where-Object { $_.proto -eq 'https' } | Select-Object -ExpandProperty public_url"') do (
    set "raw_url=%%A"
)
echo %raw_url% > storage\app\ngrok.txt

:: 6. Limpiar comillas y guardar en archivo
set "raw_url=%raw_url:"=%"
echo %raw_url% > storage\app\ngrok.txt

echo === Servidores en marcha ===
echo Laravel en: http://localhost:8000
echo Ngrok en: %raw_url%
echo Ruta API: %raw_url%/api/data
pause
