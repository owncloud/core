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

class DeepCropPixels extends \Google\Model
{
  /**
   * @var string
   */
  public $x0;
  /**
   * @var string
   */
  public $x1;
  /**
   * @var string
   */
  public $y0;
  /**
   * @var string
   */
  public $y1;

  /**
   * @param string
   */
  public function setX0($x0)
  {
    $this->x0 = $x0;
  }
  /**
   * @return string
   */
  public function getX0()
  {
    return $this->x0;
  }
  /**
   * @param string
   */
  public function setX1($x1)
  {
    $this->x1 = $x1;
  }
  /**
   * @return string
   */
  public function getX1()
  {
    return $this->x1;
  }
  /**
   * @param string
   */
  public function setY0($y0)
  {
    $this->y0 = $y0;
  }
  /**
   * @return string
   */
  public function getY0()
  {
    return $this->y0;
  }
  /**
   * @param string
   */
  public function setY1($y1)
  {
    $this->y1 = $y1;
  }
  /**
   * @return string
   */
  public function getY1()
  {
    return $this->y1;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeepCropPixels::class, 'Google_Service_Contentwarehouse_DeepCropPixels');
