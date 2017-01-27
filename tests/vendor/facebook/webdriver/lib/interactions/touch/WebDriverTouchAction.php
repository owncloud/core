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
 * Base class for all touch-related actions.
 */
abstract class WebDriverTouchAction {

  /**
   * @var WebDriverTouchScreen
   */
  protected $touchScreen;

  /**
   * @var WebDriverLocatable
   */
  protected $locationProvider;

  /**
   * @param WebDriverTouchScreen $touch_screen
   * @param WebDriverLocatable $location_provider
   */
  public function __construct(
    WebDriverTouchScreen $touch_screen,
    WebDriverLocatable $location_provider = null
  ) {
    $this->touchScreen = $touch_screen;
    $this->locationProvider = $location_provider;
  }

  /**
   * @return null|WebDriverCoordinates
   */
  protected function getActionLocation() {
    return $this->locationProvider !== null
      ? $this->locationProvider->getCoordinates() : null;
  }

}
