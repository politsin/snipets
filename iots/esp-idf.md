# idf

## COlors WTF:
https://github.com/platformio/platform-espressif32/blob/develop/monitor/filter_exception_decoder.py
--- Available filters and text transformations: colorize, debug, default, direct, esp32_exception_decoder, hexlify, log2file, nocontrol, printable, send_on_enter, time
--- More details at http://bit.ly/pio-monitor-filters

## Cmd:
* `idf.py flash monitor` `idf.py -p [your com port] flash monitor`
* `CTRL` + `~` - Open Terminal
* `CTRL` + `]` - Close connection
* `pio device monitor`
  - `/c/Users/polit/.platformio/penv/Scripts/platformio.exe device monitor`
  - `C:\Users\polit\.platformio\penv\Scripts\platformio.exe`


## Install:

C:\WINDOWS\System32\WindowsPowerShell\v1.0\powershell.exe
* `C:\Users\polit\.espressif\tools\idf-exe\1.0.1\idf.py.exe`
* `["/k", "["/k", "C:\Users\polit\.esp-idf\export.bat"]"]`
* `IDF_PATH=C:\Users\polit\.esp-idf`

```yml
  "platformio-ide-terminal":
    core:
      shell: "cmd.exe"
    style: {}
```

1. мой компьютер `->` свойства `->` Дополнительные параметры системы `->` Переменные среды
1. +IDF_PATH: `IDF_PATH=C:\Users\polit\.esp-idf`
1. +IDF_TOOLS_PATH: `IDF_TOOLS_PATH=C:\Users\polit\.espressif`
1. +PATH:
```cmd
C:\Users\polit\.espressif\tools\xtensa-esp32-elf\esp-2019r2-8.2.0\xtensa-esp32-elf\bin
C:\Users\polit\.espressif\tools\esp32ulp-elf\2.28.51.20170517\esp32ulp-elf-binutils\bin
C:\Users\polit\.espressif\tools\cmake\3.13.4\bin
C:\Users\polit\.espressif\tools\openocd-esp32\v0.10.0-esp32-20190313\openocd-esp32\bin
C:\Users\polit\.espressif\tools\mconf\v4.6.0.0-idf-20190628
C:\Users\polit\.espressif\tools\ninja\1.9.0
C:\Users\polit\.espressif\tools\idf-exe\1.0.1
C:\Users\polit\.espressif\tools\ccache\3.7
C:\Users\polit\.espressif\python_env\idf4.0_py3.7_env\Scripts
C:\Users\polit\.esp-idf\tools
```

# Colors:
* https://stackoverflow.com/questions/51680709/colored-text-output-in-powershell-console-using-ansi-vt100-codes
* Set-ItemProperty HKCU:\Console VirtualTerminalLevel -Type DWORD 1
