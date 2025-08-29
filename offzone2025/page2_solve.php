<?php

  $s = file_get_contents("Page2.png.enc");
  $pass = "k2leMoopz6wm7A7TjFv9";

  $iv = s2b(substr($s, 0, 16));
  
  $A = array_fill(0, 32, 0);
  for($i=0;$i<10000;$i++)
    for($j=0;$j<32;$j++)
    {
      $A[$j] = ((rol8($A[$j], 1) ^ ord($pass[($i + $j) % strlen($pass)]) ^ $iv[$j & 0xf]) + $j * $i + 0x39) & 0xff;
    }

  for($i=0;$i<256;$i++)
    for($j=0;$j<32;$j++)
    {
      $A[($j+3) & 0x1f] ^= ($iv[$i & 0xf] + $A[$j]) & 0xff;
      $A[$j] = ($A[$j] + $i * $A[($j+7) & 0x1f] + 0x31) & 0xff;
    }

  $sbox = array_fill(0, 4, array_fill(0, 256, 0));
  for($i=0;$i<4;$i++)
  {
    for($j=0;$j<256;$j++)
      $sbox[$i][$j] = $j;

    $x = $A[8*$i] ^ $A[8*$i+7];
    for($j=0;$j<256;$j++)
    {
      $x = ($x + $sbox[$i][$j] + $A[($i*8+$j) & 0x1f]) & 0xff;
      swap($sbox[$i][$j], $sbox[$i][$x]);
    }
    for($j=0;$j<256;$j+=2)
    {
      $sbox[$i][$j] = (($sbox[$i][$j] ^ $sbox[$i][($j + 173) & 0xff]) + $A[$j & 0x1f]) & 0xff;
      $sbox[$i][$j+1] = ((37*$sbox[$i][$j+1]) & 0xff) ^ $sbox[$i][($j+79) & 0xff];
    }
  }

  $B = array_fill(0, 16, 0);
  for($i=0;$i<16;$i++)
  {
    $B[$i] = rol32(($A[$i]<<24)|($A[($i+3)&0x1f]<<16)|($A[($i+7)&0x1f]<<8)|$A[($i+11)&0x1f], $i) ^ ((0x9E3779B9 * ($i + 1)) & 0xffffffff);
  }

/*
  // encryption
  $r = "";
  for($p=16;$p<strlen($s);$p+=8)
  {
    $block = unpack("N2", substr($s, $p, 8));
    for($i=0;$i<16;$i++)
    {
      $t = $block[2];
      $block[2] = $block[1] ^ f($block[2], $i);
      $block[1] = $t;  
    }
    $r .= pack("N2", $block[1], $block[2]);
  }
*/
  //decryption
  $r = "";
  for($p=16;$p<strlen($s);$p+=8)
  {
    $block = unpack("N2", substr($s, $p, 8));
    for($i=15;$i>=0;$i--)
    {
      $t = $block[1];
      $block[1] = $block[2] ^ f($block[1], $i);
      $block[2] = $t;  
    }
    $r .= pack("N2", $block[1], $block[2]);
  }
  $r = substr($r, 0, -ord(substr($r, -1)));
  file_put_contents("Page2.png", $r);


  function f($x, $i)
  {
    global $sbox, $B;
    $x = ($sbox[$i & 1][$x >> 24]<<24)|($sbox[2 + ($i & 1)][($x >> 16) & 0xff]<<16)|($sbox[$i & 1][($x >> 8) & 0xff]<<8)|$sbox[2 + ($i & 1)][$x & 0xff];
    return (rol32(rol32($x, 3) ^ $B[$i], 27)+0x9e3779b9) & 0xffffffff;
  }

  function swap(&$x, &$y)
  {
    $tmp=$x; $x=$y; $y=$tmp;
  }

  function rol8($a, $b)
  {
    $b &= 7;
    return (($a << $b) | ($a >> (8-$b))) & 0xff;
  }
  function rol32($a, $b)
  {
    $b &= 0x1f;
    return (($a << $b) | ($a >> (32-$b))) & 0xffffffff;
  }

  function s2b($s)
  {
    $r = array();
    for($i=0;$i<strlen($s);$i++) $r[] = ord($s[$i]); 
    return $r;
  }
