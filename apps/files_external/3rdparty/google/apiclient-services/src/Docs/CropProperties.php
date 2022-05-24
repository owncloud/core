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

namespace Google\Service\Docs;

class CropProperties extends \Google\Model
{
  /**
   * @var float
   */
  public $angle;
  /**
   * @var float
   */
  public $offsetBottom;
  /**
   * @var float
   */
  public $offsetLeft;
  /**
   * @var float
   */
  public $offsetRight;
  /**
   * @var float
   */
  public $offsetTop;

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
  public function setOffsetBottom($offsetBottom)
  {
    $this->offsetBottom = $offsetBottom;
  }
  /**
   * @return float
   */
  public function getOffsetBottom()
  {
    return $this->offsetBottom;
  }
  /**
   * @param float
   */
  public function setOffsetLeft($offsetLeft)
  {
    $this->offsetLeft = $offsetLeft;
  }
  /**
   * @return float
   */
  public function getOffsetLeft()
  {
    return $this->offsetLeft;
  }
  /**
   * @param float
   */
  public function setOffsetRight($offsetRight)
  {
    $this->offsetRight = $offsetRight;
  }
  /**
   * @return float
   */
  public function getOffsetRight()
  {
    return $this->offsetRight;
  }
  /**
   * @param float
   */
  public function setOffsetTop($offsetTop)
  {
    $this->offsetTop = $offsetTop;
  }
  /**
   * @return float
   */
  public function getOffsetTop()
  {
    return $this->offsetTop;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CropProperties::class, 'Google_Service_Docs_CropProperties');
