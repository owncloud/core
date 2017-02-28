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
 * Represent a dimension.
 */
class WebDriverDimension {

  private $height, $width;

  public function __construct($width, $height) {
    $this->width = $width;
    $this->height = $height;
  }

  /**
   * Get the height.
   *
   * @return int The height.
   */
  public function getHeight() {
    return $this->height;
  }

  /**
   * Get the width.
   *
   * @return int The width.
   */
  public function getWidth() {
    return $this->width;
  }

  /**
   * Check whether the given dimension is the same as the instance.
   *
   * @param WebDriverDimension $dimension The dimension to be compared with.
   * @return bool Whether the height and the width are the same as the
   *              instance.
   */
  public function equals(WebDriverDimension $dimension) {
    return $this->height === $dimension->getHeight() &&
           $this->width === $dimension->getWidth();
  }
}
