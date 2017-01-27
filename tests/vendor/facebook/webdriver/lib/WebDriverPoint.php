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
 * Represent a point.
 */
class WebDriverPoint {

  private $x, $y;

  public function __construct($x, $y) {
    $this->x = $x;
    $this->y = $y;
  }

  /**
   * Get the x-coordinate.
   *
   * @return int The x-coordinate of the point.
   */
  public function getX() {
    return $this->x;
  }

  /**
   * Get the y-coordinate.
   *
   * @return int The y-coordinate of the point.
   */
  public function getY() {
    return $this->y;
  }

  /**
   * Set the point to a new position.
   *
   * @param int $new_x
   * @param int $new_y
   * @return WebDriverPoint The same instance with updated coordinates.
   */
  public function move($new_x, $new_y) {
    $this->x = $new_x;
    $this->y = $new_y;
    return $this;
  }

  /**
   * Move the current by offsets.
   *
   * @param int $x_offset
   * @param int $y_offset
   * @return WebDriverPoint The same instance with updated coordinates.
   */
  public function moveBy($x_offset, $y_offset) {
    $this->x += $x_offset;
    $this->y += $y_offset;
    return $this;
  }

  /**
   * Check whether the given point is the same as the instance.
   *
   * @param WebDriverPoint $point The point to be compared with.
   * @return bool Whether the x and y coordinates are the same as the instance.
   */
  public function equals(WebDriverPoint $point) {
    return $this->x === $point->getX() &&
           $this->y === $point->getY();
  }
}
