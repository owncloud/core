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

/**
 * Base class for all mouse-related actions.
 */
class WebDriverMouseAction {

  protected $mouse;
  protected $locationProvider;

  public function __construct(
      WebDriverMouse $mouse,
      WebDriverLocatable $location_provider = null) {
    $this->mouse = $mouse;
    $this->locationProvider = $location_provider;
  }

  /**
   * @return null|WebDriverCoordinates
   */
  protected function getActionLocation() {
    if ($this->locationProvider !== null) {
      return $this->locationProvider->getCoordinates();
    }

    return null;
  }

  /**
   * @return void
   */
  protected function moveToLocation() {
    $this->mouse->mouseMove($this->locationProvider);
  }
}
