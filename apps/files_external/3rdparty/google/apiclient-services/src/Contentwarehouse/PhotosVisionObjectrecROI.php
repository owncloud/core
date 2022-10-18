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

class PhotosVisionObjectrecROI extends \Google\Model
{
  /**
   * @var int
   */
  public $xMax;
  /**
   * @var int
   */
  public $xMin;
  /**
   * @var int
   */
  public $yMax;
  /**
   * @var int
   */
  public $yMin;

  /**
   * @param int
   */
  public function setXMax($xMax)
  {
    $this->xMax = $xMax;
  }
  /**
   * @return int
   */
  public function getXMax()
  {
    return $this->xMax;
  }
  /**
   * @param int
   */
  public function setXMin($xMin)
  {
    $this->xMin = $xMin;
  }
  /**
   * @return int
   */
  public function getXMin()
  {
    return $this->xMin;
  }
  /**
   * @param int
   */
  public function setYMax($yMax)
  {
    $this->yMax = $yMax;
  }
  /**
   * @return int
   */
  public function getYMax()
  {
    return $this->yMax;
  }
  /**
   * @param int
   */
  public function setYMin($yMin)
  {
    $this->yMin = $yMin;
  }
  /**
   * @return int
   */
  public function getYMin()
  {
    return $this->yMin;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotosVisionObjectrecROI::class, 'Google_Service_Contentwarehouse_PhotosVisionObjectrecROI');
