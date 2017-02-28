<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

class WebDriverSendKeysAction
    extends WebDriverKeysRelatedAction
    implements WebDriverAction {

  private $keys;

  /**
   * @param WebDriverKeyboard $keyboard
   * @param WebDriverMouse $mouse
   * @param WebDriverLocatable $location_provider
   * @param string $keys
   */
  public function __construct(
      WebDriverKeyboard $keyboard,
      WebDriverMouse $mouse,
      WebDriverLocatable $location_provider = null,
      $keys = null) {
    parent::__construct($keyboard, $mouse, $location_provider);
    $this->keys = $keys;
  }

  public function perform() {
    $this->focusOnElement();
    $this->keyboard->sendKeys($this->keys);
  }
}
