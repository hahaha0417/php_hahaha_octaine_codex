@echo off
setlocal

cd /d "%~dp0"

if not exist "rr.exe" (
    echo [ERROR] rr.exe not found in project root.
    exit /b 1
)

if not exist ".rr.yaml" (
    echo [ERROR] .rr.yaml not found in project root.
    exit /b 1
)

set "RR_RPC_PORT=7001"
for /f "tokens=5" %%a in ('netstat -ano ^| findstr /R /C:":7001 .*LISTENING"') do (
    set "RR_RPC_PORT=7002"
    goto :start_rr
)

:start_rr
echo [INFO] Using RPC port %RR_RPC_PORT%
rr.exe serve -c .rr.yaml -o rpc.listen=tcp://127.0.0.1:%RR_RPC_PORT% %*
