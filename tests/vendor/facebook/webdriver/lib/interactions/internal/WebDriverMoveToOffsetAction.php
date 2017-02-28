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

class WebDriverMoveToOffsetAction
    extends WebDriverMouseAction
    implements WebDriverAction {

  private $xOffset, $yOffset;

  public function __construct(WebDriverMouse $mouse,
                              WebDriverLocatable $location_provider = null,
                              $x_offset = null,
                              $y_offset = null) {
    parent::__construct($mouse, $location_provider);
    $this->xOffset = $x_offset;
    $this->yOffset = $y_offset;
  }

  public function perform() {
    $this->mouse->mouseMove(
      $this->getActionLocation(),
      $this->xOffset,
      $this->yOffset
    );
  }
}
