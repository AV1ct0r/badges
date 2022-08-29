# История взлома бейджа offzone2022, часть 1

1. Ссылки на ресурсы, на которые буду ссылаться

<b>[STM32F070F6P6 Datasheet](https://www.st.com/resource/en/datasheet/stm32f070f6.pdf)</b><br/>
<b>[STM32F070F6P6 Reference Manual](https://www.st.com/resource/en/reference_manual/rm0360-stm32f030x4x6x8xc-and-stm32f070x6xb-advanced-armbased-32bit-mcus-stmicroelectronics.pdf)</b><br/>
<b>[Dumping the flash of the Syscan 2015 badge](https://gist.github.com/egirault/7b3fe7041e1bf5e2258ed5df7083f14d)</b><br/>

Из железа потребуются ST-Link и Bus Pivate.

2. На бейдже стоит контроллер STM32F070F6P6, в нем есть 32 KB Flash-памяти с прошивкой (0x8000 байт с адреса 0x08000000), 6 KB SRAM (0x1800 байт с адреса 0x20000000) и SystemMemory с OptionBytes (0x3400 байт с адреса 0x1FFFC800). Подключаемся ST-Link и считываем OptionBytes:

![OptionBytes](/offzone2022/STM32F070F6P6_OptionBytes.png?raw=true "Option Bytes")
