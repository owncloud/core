<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//   http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

/**
 * Interface representing basic mouse operations.
 */
class WebDriverCoordinates {

  private
    $onScreen,
    $inViewPort,
    $onPage,
    $auxiliary;

  public function __construct(
      $on_screen,
      Closure $in_view_port,
      Closure $on_page,
      $auxiliary) {

    $this->onScreen = $on_screen;
    $this->inViewPort = $in_view_port;
    $this->onPage = $on_page;
    $this->auxiliary = $auxiliary;
  }

  /**
   * @return WebDriverPoint
   */
  public function onScreen() {
    throw new UnsupportedOperationException(
      'onScreen is planned but not yet supported by Selenium'
    );
  }

  /**
   * @return WebDriverPoint
   */
  public function inViewPort() {
    return call_user_func($this->inViewPort);
  }

  /**
   * @return WebDriverPoint
   */
  public function onPage() {
    return call_user_func($this->onPage);
  }

  /**
   * @return Object The attached object.
   */
  public function getAuxiliary() {
    return $this->auxiliary;
  }
}
