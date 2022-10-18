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

class VideoFileColorInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $matrixCoefficients;
  /**
   * @var string
   */
  public $primaries;
  /**
   * @var string
   */
  public $range;
  /**
   * @var string
   */
  public $transferCharacteristics;

  /**
   * @param string
   */
  public function setMatrixCoefficients($matrixCoefficients)
  {
    $this->matrixCoefficients = $matrixCoefficients;
  }
  /**
   * @return string
   */
  public function getMatrixCoefficients()
  {
    return $this->matrixCoefficients;
  }
  /**
   * @param string
   */
  public function setPrimaries($primaries)
  {
    $this->primaries = $primaries;
  }
  /**
   * @return string
   */
  public function getPrimaries()
  {
    return $this->primaries;
  }
  /**
   * @param string
   */
  public function setRange($range)
  {
    $this->range = $range;
  }
  /**
   * @return string
   */
  public function getRange()
  {
    return $this->range;
  }
  /**
   * @param string
   */
  public function setTransferCharacteristics($transferCharacteristics)
  {
    $this->transferCharacteristics = $transferCharacteristics;
  }
  /**
   * @return string
   */
  public function getTransferCharacteristics()
  {
    return $this->transferCharacteristics;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoFileColorInfo::class, 'Google_Service_Contentwarehouse_VideoFileColorInfo');
