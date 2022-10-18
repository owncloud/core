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

class VideoContentSearchDescriptionAnchorFeatures extends \Google\Model
{
  /**
   * @var float
   */
  public $entityTextCoverage;
  /**
   * @var bool
   */
  public $inAsr;
  /**
   * @var bool
   */
  public $isDescriptionAnchor;
  /**
   * @var int
   */
  public $spanToAsrTime;

  /**
   * @param float
   */
  public function setEntityTextCoverage($entityTextCoverage)
  {
    $this->entityTextCoverage = $entityTextCoverage;
  }
  /**
   * @return float
   */
  public function getEntityTextCoverage()
  {
    return $this->entityTextCoverage;
  }
  /**
   * @param bool
   */
  public function setInAsr($inAsr)
  {
    $this->inAsr = $inAsr;
  }
  /**
   * @return bool
   */
  public function getInAsr()
  {
    return $this->inAsr;
  }
  /**
   * @param bool
   */
  public function setIsDescriptionAnchor($isDescriptionAnchor)
  {
    $this->isDescriptionAnchor = $isDescriptionAnchor;
  }
  /**
   * @return bool
   */
  public function getIsDescriptionAnchor()
  {
    return $this->isDescriptionAnchor;
  }
  /**
   * @param int
   */
  public function setSpanToAsrTime($spanToAsrTime)
  {
    $this->spanToAsrTime = $spanToAsrTime;
  }
  /**
   * @return int
   */
  public function getSpanToAsrTime()
  {
    return $this->spanToAsrTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchDescriptionAnchorFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchDescriptionAnchorFeatures');
