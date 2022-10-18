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

class GoodocOrientationLabel extends \Google\Model
{
  /**
   * @var float
   */
  public $deskewAngle;
  /**
   * @var bool
   */
  public $mirrored;
  /**
   * @var string
   */
  public $orientation;
  /**
   * @var string
   */
  public $textlineOrder;
  /**
   * @var string
   */
  public $writingDirection;

  /**
   * @param float
   */
  public function setDeskewAngle($deskewAngle)
  {
    $this->deskewAngle = $deskewAngle;
  }
  /**
   * @return float
   */
  public function getDeskewAngle()
  {
    return $this->deskewAngle;
  }
  /**
   * @param bool
   */
  public function setMirrored($mirrored)
  {
    $this->mirrored = $mirrored;
  }
  /**
   * @return bool
   */
  public function getMirrored()
  {
    return $this->mirrored;
  }
  /**
   * @param string
   */
  public function setOrientation($orientation)
  {
    $this->orientation = $orientation;
  }
  /**
   * @return string
   */
  public function getOrientation()
  {
    return $this->orientation;
  }
  /**
   * @param string
   */
  public function setTextlineOrder($textlineOrder)
  {
    $this->textlineOrder = $textlineOrder;
  }
  /**
   * @return string
   */
  public function getTextlineOrder()
  {
    return $this->textlineOrder;
  }
  /**
   * @param string
   */
  public function setWritingDirection($writingDirection)
  {
    $this->writingDirection = $writingDirection;
  }
  /**
   * @return string
   */
  public function getWritingDirection()
  {
    return $this->writingDirection;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocOrientationLabel::class, 'Google_Service_Contentwarehouse_GoodocOrientationLabel');
