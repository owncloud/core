<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License; Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     httpconst //www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing; software
// distributed under the License is distributed on an "AS IS" BASIS;
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND; either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

/**
 * Representations of pressable keys that aren't text.
 * These are stored in the Unicode PUA (Private Use Area) code points.
 */
class WebDriverKeys {

  const NULL            = "\xEE\x80\x80";
  const CANCEL          = "\xEE\x80\x81";
  const HELP            = "\xEE\x80\x82";
  const BACKSPACE       = "\xEE\x80\x83";
  const TAB             = "\xEE\x80\x84";
  const CLEAR           = "\xEE\x80\x85";
  const RETURN_KEY      = "\xEE\x80\x86"; // php does not allow RETURN
  const ENTER           = "\xEE\x80\x87";
  const SHIFT           = "\xEE\x80\x88";
  const LEFT_SHIFT      = "\xEE\x80\x88";
  const CONTROL         = "\xEE\x80\x89";
  const LEFT_CONTROL    = "\xEE\x80\x89";
  const ALT             = "\xEE\x80\x8A";
  const LEFT_ALT        = "\xEE\x80\x8A";
  const PAUSE           = "\xEE\x80\x8B";
  const ESCAPE          = "\xEE\x80\x8C";
  const SPACE           = "\xEE\x80\x8D";
  const PAGE_UP         = "\xEE\x80\x8E";
  const PAGE_DOWN       = "\xEE\x80\x8F";
  const END             = "\xEE\x80\x90";
  const HOME            = "\xEE\x80\x91";
  const LEFT            = "\xEE\x80\x92";
  const ARROW_LEFT      = "\xEE\x80\x92";
  const UP              = "\xEE\x80\x93";
  const ARROW_UP        = "\xEE\x80\x93";
  const RIGHT           = "\xEE\x80\x94";
  const ARROW_RIGHT     = "\xEE\x80\x94";
  const DOWN            = "\xEE\x80\x95";
  const ARROW_DOWN      = "\xEE\x80\x95";
  const INSERT          = "\xEE\x80\x96";
  const DELETE          = "\xEE\x80\x97";
  const SEMICOLON       = "\xEE\x80\x98";
  const EQUALS          = "\xEE\x80\x99";
  const NUMPAD0         = "\xEE\x80\x9A";
  const NUMPAD1         = "\xEE\x80\x9B";
  const NUMPAD2         = "\xEE\x80\x9C";
  const NUMPAD3         = "\xEE\x80\x9D";
  const NUMPAD4         = "\xEE\x80\x9E";
  const NUMPAD5         = "\xEE\x80\x9F";
  const NUMPAD6         = "\xEE\x80\xA0";
  const NUMPAD7         = "\xEE\x80\xA1";
  const NUMPAD8         = "\xEE\x80\xA2";
  const NUMPAD9         = "\xEE\x80\xA3";
  const MULTIPLY        = "\xEE\x80\xA4";
  const ADD             = "\xEE\x80\xA5";
  const SEPARATOR       = "\xEE\x80\xA6";
  const SUBTRACT        = "\xEE\x80\xA7";
  const DECIMAL         = "\xEE\x80\xA8";
  const DIVIDE          = "\xEE\x80\xA9";
  const F1              = "\xEE\x80\xB1";
  const F2              = "\xEE\x80\xB2";
  const F3              = "\xEE\x80\xB3";
  const F4              = "\xEE\x80\xB4";
  const F5              = "\xEE\x80\xB5";
  const F6              = "\xEE\x80\xB6";
  const F7              = "\xEE\x80\xB7";
  const F8              = "\xEE\x80\xB8";
  const F9              = "\xEE\x80\xB9";
  const F10             = "\xEE\x80\xBA";
  const F11             = "\xEE\x80\xBB";
  const F12             = "\xEE\x80\xBC";
  const META            = "\xEE\x80\xBD";
  const COMMAND         = "\xEE\x80\xBD"; // ALIAS
  const ZENKAKU_HANKAKU = "\xEE\x80\xC0";

  /**
   * Encode input of `sendKeys()`.
   * @param string|array $keys
   * @return array
   */
  public static function encode($keys) {

    if (is_numeric($keys)) {
      $keys = '' . $keys;
    }

    if (is_string($keys)) {
      $keys = array($keys);
    }

    $encoded = array();
    foreach ($keys as $key) {
      if (is_array($key)) {
        // handle modified keys
        $key = implode('', $key).self::NULL;
      }
      $encoded[] = (string)$key;
    }

    return $encoded;
  }
}
