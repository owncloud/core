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

class WebDriverFlickFromElementAction
  extends WebDriverTouchAction
  implements WebDriverAction {

  private $x;
  private $y;
  private $speed;

  /**
   * @param WebDriverTouchScreen $touch_screen
   * @param WebDriverElement $element
   * @param int $x
   * @param int $y
   * @param int $speed
   */
  public function __construct(
    WebDriverTouchScreen $touch_screen,
    WebDriverElement $element, $x, $y, $speed
  ) {
    $this->x = $x;
    $this->y = $y;
    $this->speed = $speed;
    parent::__construct($touch_screen, $element);
  }

  public function perform() {
    $this->touchScreen->flickFromElement(
      $this->locationProvider,
      $this->x,
      $this->y,
      $this->speed
    );
  }
}
