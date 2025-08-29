# "Умные" бейджи и аддоны offzone2025 (версия 1.0)

Name | Photo | MCU and pinout | Readout protection | Firmware files and challenge solutions |  
:-------------------------:|:-------------------------:|:-------------------------:|:-------------------------:|:-------------------------:
Бейдж |  | STM32F103CBT6<br/>3V3,SWDIO,SWCLK,NRST,GND | RDP Level 1<br/>(SRAM access) | [10_STM32F103CBT6_0x20000000_0x5000_SRAM.bin](/offzone2025/10_STM32F103CBT6_0x20000000_0x5000_SRAM.bin?raw=true)<br/>[10_STM32F103CBT6_0x08000000_0x20000_Flash.bin](/offzone2025/10_STM32F103CBT6_0x08000000_0x20000_Flash.bin?raw=true)<br/>[10_STM32F103CBT6_0x1FFFF000_0xA00_SystemMemory.bin](/offzone2025/10_STM32F103CBT6_0x1FFFF000_0xA00_SystemMemory.bin?raw=true)
Аддон bizone (Радио) | ![](/offzone2025/20.jpg) | STM32F405RGT6<br/>GND,NRST,SWCLK,SWDIO,3V3 | RDP Level 0<br/>(SRAM, Flash, SystemMemory access) | [20_STM32F405RGT6_0x1FFF0000_0x8000_SystemMemory_OTP.bin](/offzone2025/20_STM32F405RGT6_0x1FFF0000_0x8000_SystemMemory_OTP.bin)<br/>[20_STM32F405RGT6_0x1FFFC000_0x4000_OptionBytes.bin](/offzone2025/20_STM32F405RGT6_0x1FFFC000_0x4000_OptionBytes.bin)<br/>[20_STM32F405RGT6_0x08000000_0x100000_Flash.bin](/offzone2025/20_STM32F405RGT6_0x08000000_0x100000_Flash.bin)<br/>[20_STM32F405RGT6_0x10000000_0x10000_CCMRAM.bin](/offzone2025/20_STM32F405RGT6_0x10000000_0x10000_CCMRAM.bin)<br/>[20_STM32F405RGT6_0x20000000_0x20000_SRAM.bin](/offzone2025/20_STM32F405RGT6_0x20000000_0x20000_SRAM.bin)
Аддон ptsecurity.com (Медведи) |  | STM32 | ? |
Аддон lockpick (Сейф) |  | ATMEGA | ? |
Аддон reg.ru | ![](/offzone2025/50.jpg) | ESP32-S3 | Secure Boot: Disabled<br/>Flash Encryption: Disabled | [50_ESP32-S3.bin](/offzone2025/50_ESP32-S3.bin)<br/>[50_efuse.txt](/offzone2025/50_efuse.txt)<br/>[50_esptool.txt](/offzone2025/50_esptool.txt)<br/>[50_solve.txt](/offzone2025/50_solve.txt)
Аддон yandex.ru | ![](/offzone2025/60.jpg) | ESP32-S3 | Secure Boot: Disabled<br/>Flash Encryption: Disabled | [60_ESP32-S3.bin](/offzone2025/60_ESP32-S3.bin)<br/>[60_efuse.txt](/offzone2025/60_efuse.txt)<br/>[60_esptool.txt](/offzone2025/60_esptool.txt)<br/>[https://hoggr.ru/](https://hoggr.ru/)<br/>[60_hoggr.ru.rar](/offzone2025/60_hoggr.ru.rar)
Аддон tbank.ru | ![](/offzone2025/70.jpg) | NTAG 213 144bytes (NT2H1311G0DU) | PWD: 304B346B</br>PACK: 1337 | [70_hf-mfu-044A2F92161E90-dump.json](/offzone2025/70_hf-mfu-044A2F92161E90-dump.json)<br/>[70_hf-mfu-044A2F92161E90-dump.bin](/offzone2025/70_hf-mfu-044A2F92161E90-dump.bin)<br/>[@TBankOffzoneBot](https://t.me/TBankOffzoneBot)
Куб |  | ESP32 | ? | 

Флаги моего бейджа: <br/> 
qr = https://t.me/offzone_25_bot?start=2eb340549ca07f5543d07882<br/> 
id = 16877566ff92476176e21bb0<br/> 
key = 7bd08c38bb6e79b08d39346cc53329631e63d3a1b48454c77d80014dfe324df3<br/> 

ID | Task | Flag | Comment |  
:-------------------------:|:-------------------------:|:-------------------------:|:-------------------------:
0 | secret | OFFZONE{DuMp_D1gg3r_X0R_W1nn3r_1204B2B7} | [ZE:RO] is not a villain |
1 | snake | OFFZONE{T3rm1n4l_Sn4k3_Gg_9636CBD2} | snake w=6 h=6 |
2 | snake w=2 h=2 | OFFZONE{T1ny_2x2_M4st3r_83E39134} | snake secret => 1337 |
3 | qmizjsq | OFFZONE{0H_n0_My_F1rmWar3_W4s_DUMPED_E2B9A735} | любая команда с crc32b = 0x95e968c8 |
4 | sudoku -n easy | OFFZONE{q8_SuDoKu_z1A_Mn4p_77LkW_7DB0FBD0} |
5 | sudoku -n medium | OFFZONE{K9_sudoku_XY_3Zt_Q4bR_1mN_A72344AE} |
6 | sudoku -n hard | OFFZONE{uU__SUDOKU_7pL0q_A9xM_4Y_1FE1B1B2} |
7 | sudoku unknown | OFFZONE{z2_SudOkU_A1B_c8N3_0qR_F_444D4EC4} | возможно, надо сохраненную игру подправить на флеше |
8 | pinokio | OFFZONE{P4t13nT_P@$$w0rD_Cr4Ck3r_968A1475} | каждый верный символ прибавляет 100 мс ко времени проверки |
9 | wedding | OFFZONE{h@ppy_Dr@90n_w3ll-f3D_Dr@90n_8F4FDC45} | выбираем режим 500 и первое число > 4.250.000.000 |
10 | - | OFFZONE{holy_moly_you_really_did_it_27DF71A0} | в хранилище флагов лишний флаг |

Прошивка бейджа дампится через выпайку, колодку и picopwner как в прошлом году, даже морозить не пришлось.<br/> 
ID 12 байт лежит по адресу 0x0801F000, <br/> 
KEY 32 байта лежит по адресу 0x0801F00C, <br/> 
сохраненная игра sudoku - по адресу 0x0801F432, <br/> 
все флаги лежат в конце прошивки по адресу 0x0801FC10 в следующей структуре:

ID | Data_len | Seed | Data_enc |  
:-------------------------:|:-------------------------:|:-------------------------:|:-------------------------:
0 | 16 | aba873b9 | 00ff0380571121e6b6d32dbb6e3a848ce8eeff24ff35 |
1 | 11 | 519d9862 | 945884437cf0ea4a08a9f4c46b7ac720ff |
2 | 0f | dd37783a | db153ef176086708e58bc3d1c6984c |
3 | 1c | b2a6d270 | 067373f962ee31d869801aa0ee09cb53df43d7138a65a3e67698c25e |
4 | 18 | e113dc28 | efafbb0348bdb234479f2af86b2158f0624be6b7dd5fe97e |
5 | 19 | 0eb17710 | ef4719d8f35f261b181e3de4730595058616696ab4e4aaa792 |
6 | 18 | 6e72da90 | 89ae809fa568c071884a97481b1974270b2d81e87f7235e7 |
7 | 18 | c07c7772 | b7aa3c040aaccd67cac1ea643453b4c9b523b38f5af7b8ef |
8 | 18 | dbbaa73d | 0e8f83079b4c3d8df6c932127d1dd886b691690cd0cb2581 |
9 | 1c | 0f12b796 | 7d2b0e7cf83c2e4b63ede27461fd361353b791d438cea2df59f58e6a |
10 | 1b | 81cd6fea | c1868772ebe546ebc1716b750cb95ad6daa9f62a788f5b37133713 |

Функция расшифровки флагов обфусцирована, использует контрольную сумму начала прошивки с исполняемым кодом и для генерации окончаний флагов (8 символов хекса) использует KEY бейджа. Её деобфусцировал, позже запрограммирую, а в ходе конференции для извлечения флагов 7 и 10 использовался перестановку флагов внутри структуры по адресу 0x0801FC10 (сделал так, чтобы 7 флаг стал 0, а 10 - 3), после чего получил их через повторное решение других заданий.

Задания CUBE (http://51.250.105.119/):
Task | Description | Decrypted flag | Solution |
:-------------------------:|:-------------------------:|:-------------------------:|:-------------------------:
Page1 (500) | ![](/offzone2025/private_key_pem.png)<br/>[page1_public_data.tar.gz](/offzone2025/page1_public_data.tar.gz)<br/>Учёный был сильно озабочен своей безопасностью.<br/>На его компьютере мы нашли ряд неочевидных для нас файлов.<br/>Первое что мы хотим понять это как он шифровал свои файлы.<br/>Мы нашли некоторый скрипт и зашифрованную страницу дневника, а также остаток другой страницы. К сожалению, полностью страницу восстановить не удалось.<br/>Может быть у вас получиться что-то сделать с этими файлами?<br/>[Архив с файлами](https://disk.yandex.ru/d/umwEdHAOToEPkA)<br/>Author: [@revker](https://t.me/revker) | ![](/offzone2025/Page1.png)<br/>CUBE{227a6b9a360d1450dc7db9cb81fe2efd} | ОСR, долго правим ошибки распознавания, base64_decode уцелевших частей ключа, в них находим модуль n, публичную экспоненту e и один из множителей p, восстанавливаем приватный ключ и расшифровываем файл. [Скрипт для решения](/offzone2025/page1_solve.py)
Page2 (2500) | [page2_public_data.zip](/offzone2025/page2_public_data.zip)<br/>В ходе анализа диска был найден некоторый исполняемый файл.<br/>Он очень похож на клиент отправляющий файлы на сервер.<br/>Вероятно, данное ПО было использовано для пересылки других частей дневника на внешний сервер.<br/>Вдобавок к исполняемому файлу мы получили выгрузку трафика.<br/>Осталось всё это проанализировать и понять что передовалось, но это ведь не проблема?<br/>[Архив с файлами](https://disk.yandex.ru/d/wY9AlRipjiwu_w)<br/>Пароль от архива: `cub3`<br/>Author: [@revker](https://t.me/revker) | ![](/offzone2025/Page2.png)<br/>CUBE{6ec32a4738bc11b6a5d88d812da19149} | keepass2john на файл Database.kdbx, с помощью hashcat подбираем пароль ihatepasswords, запускаем KeePassXC и находим запись default_enc_password с паролем k2leMoopz6wm7A7TjFv9, дальше реверсим SecuredClient.exe, расшифровываем трафик target_traffic.pcapng, достаем файл Page2.png.enc, и его еще раз расшифровываем найденным ранее паролем. [Скрипт для решения](/offzone2025/page2_solve.php)
Page3 (1200) | Ещё одна страница дневника находится на сервере который мы нашли когда разбирались со второй страницей.<br/>Надо получить туда доступ и забрать последнюю страницу дневника.<br/>Правда у нас нет исполняемого файла, но наверное это можно как-то решить<br/>Author: [@revker](https://t.me/revker) |  |
