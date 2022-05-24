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

namespace Google\Service\PolyService;

class PresentationParams extends \Google\Model
{
  /**
   * @var string
   */
  public $backgroundColor;
  /**
   * @var string
   */
  public $colorSpace;
  protected $orientingRotationType = Quaternion::class;
  protected $orientingRotationDataType = '';

  /**
   * @param string
   */
  public function setBackgroundColor($backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  /**
   * @return string
   */
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  /**
   * @param string
   */
  public function setColorSpace($colorSpace)
  {
    $this->colorSpace = $colorSpace;
  }
  /**
   * @return string
   */
  public function getColorSpace()
  {
    return $this->colorSpace;
  }
  /**
   * @param Quaternion
   */
  public function setOrientingRotation(Quaternion $orientingRotation)
  {
    $this->orientingRotation = $orientingRotation;
  }
  /**
   * @return Quaternion
   */
  public function getOrientingRotation()
  {
    return $this->orientingRotation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PresentationParams::class, 'Google_Service_PolyService_PresentationParams');
