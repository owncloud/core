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

namespace Google\Service\Slides;

class CropProperties extends \Google\Model
{
  /**
   * @var float
   */
  public $angle;
  /**
   * @var float
   */
  public $bottomOffset;
  /**
   * @var float
   */
  public $leftOffset;
  /**
   * @var float
   */
  public $rightOffset;
  /**
   * @var float
   */
  public $topOffset;

  /**
   * @param float
   */
  public function setAngle($angle)
  {
    $this->angle = $angle;
  }
  /**
   * @return float
   */
  public function getAngle()
  {
    return $this->angle;
  }
  /**
   * @param float
   */
  public function setBottomOffset($bottomOffset)
  {
    $this->bottomOffset = $bottomOffset;
  }
  /**
   * @return float
   */
  public function getBottomOffset()
  {
    return $this->bottomOffset;
  }
  /**
   * @param float
   */
  public function setLeftOffset($leftOffset)
  {
    $this->leftOffset = $leftOffset;
  }
  /**
   * @return float
   */
  public function getLeftOffset()
  {
    return $this->leftOffset;
  }
  /**
   * @param float
   */
  public function setRightOffset($rightOffset)
  {
    $this->rightOffset = $rightOffset;
  }
  /**
   * @return float
   */
  public function getRightOffset()
  {
    return $this->rightOffset;
  }
  /**
   * @param float
   */
  public function setTopOffset($topOffset)
  {
    $this->topOffset = $topOffset;
  }
  /**
   * @return float
   */
  public function getTopOffset()
  {
    return $this->topOffset;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CropProperties::class, 'Google_Service_Slides_CropProperties');
