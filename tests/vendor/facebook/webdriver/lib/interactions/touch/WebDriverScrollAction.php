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

class WebDriverScrollAction
  extends WebDriverTouchAction
  implements WebDriverAction {

  private $x;
  private $y;

  /**
   * @param WebDriverTouchScreen $touch_screen
   * @param int $x
   * @param int $y
   */
  public function __construct(WebDriverTouchScreen $touch_screen, $x, $y) {
    $this->x = $x;
    $this->y = $y;
    parent::__construct($touch_screen);
  }

  public function perform() {
    $this->touchScreen->scroll($this->x, $this->y);
  }
}
