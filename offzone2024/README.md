# "Умные" бейджи и аддоны offzone2024 (версия 1.0)

Name | Photo | MCU and pinout | Readout protection | Firmware files and challenge solutions |  
:-------------------------:|:-------------------------:|:-------------------------:|:-------------------------:|:-------------------------:
Бейдж | ![](/offzone2024/10_front.png) | STM32F103C8T6<br/>3V3,SWDIO,SWCLK,NRST,GND | RDP Level 1<br/>(SRAM access) | [10_STM32F103C8T6_0x20000000_0x5000_SRAM.bin](/offzone2024/10_STM32F103C8T6_0x20000000_0x5000_SRAM.bin?raw=true)<br/>[10_STM32F103C8T6_0x08000000_0x20000_Flash.bin](/offzone2024/10_STM32F103C8T6_0x08000000_0x20000_Flash.bin?raw=true)<br/>[10_STM32F103C8T6_0x1FFFF000_0xA00_SystemMemory.bin](/offzone2024/10_STM32F103C8T6_0x1FFFF000_0xA00_SystemMemory.bin?raw=true)<br/><br/>[10_gen_all_flags.txt](/offzone2024/10_gen_all_flags.txt)<br/>[10_rev1.txt](/offzone2024/10_rev1.txt)<br/>[10_rev2.txt](/offzone2024/10_rev2.txt)
Аддон spbctf.ru | ![](/offzone2024/20_front.png) | STM32F103C8T6<br/>3V3,SWDIO,SWCLK,NRST,GND | RDP Level 0<br/>(SRAM, Flash, SystemMemory access) | [20_STM32F103C8T6_0x20000000_0x5000_SRAM.bin](/offzone2024/20_STM32F103C8T6_0x20000000_0x5000_SRAM.bin?raw=true)<br/>[20_STM32F103C8T6_0x08000000_0x20000_Flash.bin](/offzone2024/20_STM32F103C8T6_0x08000000_0x20000_Flash.bin?raw=true)<br/>[20_STM32F103C8T6_0x1FFFF000_0xA00_SystemMemory.bin](/offzone2024/20_STM32F103C8T6_0x1FFFF000_0xA00_SystemMemory.bin?raw=true)<br/><br/>[20_solution.txt](/offzone2024/20_solution.txt)
Аддон "Рассвет" | ![](/offzone2024/30_front.png) | STM32F103 | ? | 
Аддон Positive Labs | ![](/offzone2024/40_front.png) | STM32F411CCU6<br/>3V3,SWCLK,NRST,SWDIO,GND | RDP Level 1<br/>(SRAM access) | [40_STM32F411CCU6_0x20000000_0x20000_SRAM.bin](/offzone2024/40_STM32F411CCU6_0x20000000_0x20000_SRAM.bin?raw=true)<br/><br/>[40_pt-boy-main.zip](/offzone2024/40_pt-boy-main.zip?raw=true)</br>[40_serial.txt](/offzone2024/40_serial.txt)
Аддон Yandex | ![](/offzone2024/50_front.png) | ESP32-S3 | ? | 
Куб | ![](/offzone2024/60_front.png) | ESP32 | ? | 


1. Дамп прошивки бейджа (обход RDP Level 1)
   
   1.1. Приносим с собой Raspberry Pico, ST-Link v2 и сокет QFP48-STM32
   
   1.2. В паяльной зоне с помощью фена выпаиваем контроллер с бейджа
   
   1.3. Вставляет контроллер в сокет, подключаем Raspberry Pico и ST-Link, дампим прошивку с помощью stm32f1-picopwner
   
   ![](/offzone2024/10_hack2.jpg)
   
   1.4. Достаем контроллер из сокета, наносим на ножки флюс, припаиваем обратно к бейджу

2. Исследование прошивки бейджа

   2.1. На любом стенде, работающем с оффкойнами, фотографируем ID своего бейджа:

   ![](/offzone2024/10_hack1.jpg)

   2.2. Загружаем прошивку бейджа в IDA Pro, видим, что логика работы бейджа завязана на некоторый 32-байтовый ключ. Причем ID бейджа и искомый ключ в чистом виде в прошивке не лежит.

   2.3. По адресу 0x0801F000 находим хранилище, эмулирующее EEPROM, в нем данные хранятся в виде записей: 2 байта полезных данных - 2 байта номер записи. Склеиваем из 2-х байтовых кусочков ID и Key.

   ![](/offzone2024/10_hex2.png)
   
   2.4. В оперативке по адресу 0x20000864 хранится адрес структурки (у меня все время он равен 0x200011A8), в которой лежат ID и Key в чистом виде:

   ![](/offzone2024/10_hex1.png)

    В принципе, для извлечения ID и Key достаточно копировать только оперативную память с помощью ST-Link (RDP Level 1 позволяет это делать) без выпайки контроллера. Но чтобы знать, как их использовать, нужно скопировать целиком прошивку бейджа.

   2.5. После реверса прошивки может сделать универсальный скрипт для генерации всех флагов, а также решить rev1 и rev2 задания.
   
   Скрипт для генерации всех 4 флагов: [10_gen_all_flags.txt](/offzone2024/10_gen_all_flags.txt).
   Отдельно скрипты для генерации ответов на nonce-бейджа в заданиях [rev1](/offzone2024/10_rev1.txt) и [rev2](/offzone2024/10_rev2.txt)

4. Легкое решение заданий аддона Positive Labs (без написания прошивки USB-I2C адаптера)

   Частичные исходники прошивки: [40_pt-boy-main.zip](/offzone2024/40_pt-boy-main.zip?raw=true)
   
   3.1. Подключаем к аддону ST-Link v2, дампим оперативную память: 0x20000 байт с адреса 0x20000000 (RDP Level 1 разрешает это делать)

   3.2. В самом начале оперативки видим 2 флага с нечитаемыми символами (flag1, flag2) и ключ (key), который в данном случае не сильно нужен

   ![](/offzone2024/40_hex1.png)

   Чуть подальше расположены похожие 96 байт: key и оригинальные строки, из которых получаются флаги (генерируется 32 байта, потом 6 байт в конце отрезаются, а оставшиеся обрамляются flag{ } ).

   ![](/offzone2024/40_hex2.png)
   
   3.3. Т.к. флаг не ascii, то оправляем его на проверку бейджу не через putty, а через python-скрипт.

   [40_serial.txt](/offzone2024/40_serial.txt)

5. ToDo - буду дополнять writeup постепенно
   
