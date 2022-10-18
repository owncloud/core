<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Contentwarehouse;

class LensDiscoveryStyleBoundingBox extends \Google\Model
{
  /**
   * @var int
   */
  public $x1;
  /**
   * @var int
   */
  public $x2;
  /**
   * @var int
   */
  public $y1;
  /**
   * @var int
   */
  public $y2;

  /**
   * @param int
   */
  public function setX1($x1)
  {
    $this->x1 = $x1;
  }
  /**
   * @return int
   */
  public function getX1()
  {
    return $this->x1;
  }
  /**
   * @param int
   */
  public function setX2($x2)
  {
    $this->x2 = $x2;
  }
  /**
   * @return int
   */
  public function getX2()
  {
    return $this->x2;
  }
  /**
   * @param int
   */
  public function setY1($y1)
  {
    $this->y1 = $y1;
  }
  /**
   * @return int
   */
  public function getY1()
  {
    return $this->y1;
  }
  /**
   * @param int
   */
  public function setY2($y2)
  {
    $this->y2 = $y2;
  }
  /**
   * @return int
   */
  public function getY2()
  {
    return $this->y2;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LensDiscoveryStyleBoundingBox::class, 'Google_Service_Contentwarehouse_LensDiscoveryStyleBoundingBox');
