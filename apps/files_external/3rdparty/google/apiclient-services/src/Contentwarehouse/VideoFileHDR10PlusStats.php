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

class VideoFileHDR10PlusStats extends \Google\Model
{
  /**
   * @var int
   */
  public $applicationVersion;
  public $averageTargetedSystemDisplayMaximumLuminance;
  /**
   * @var bool
   */
  public $masteringDisplayActualPeakLuminanceFlag;
  /**
   * @var int
   */
  public $maxNumWindows;
  /**
   * @var bool
   */
  public $targetedSystemDisplayActualPeakLuminanceFlag;

  /**
   * @param int
   */
  public function setApplicationVersion($applicationVersion)
  {
    $this->applicationVersion = $applicationVersion;
  }
  /**
   * @return int
   */
  public function getApplicationVersion()
  {
    return $this->applicationVersion;
  }
  public function setAverageTargetedSystemDisplayMaximumLuminance($averageTargetedSystemDisplayMaximumLuminance)
  {
    $this->averageTargetedSystemDisplayMaximumLuminance = $averageTargetedSystemDisplayMaximumLuminance;
  }
  public function getAverageTargetedSystemDisplayMaximumLuminance()
  {
    return $this->averageTargetedSystemDisplayMaximumLuminance;
  }
  /**
   * @param bool
   */
  public function setMasteringDisplayActualPeakLuminanceFlag($masteringDisplayActualPeakLuminanceFlag)
  {
    $this->masteringDisplayActualPeakLuminanceFlag = $masteringDisplayActualPeakLuminanceFlag;
  }
  /**
   * @return bool
   */
  public function getMasteringDisplayActualPeakLuminanceFlag()
  {
    return $this->masteringDisplayActualPeakLuminanceFlag;
  }
  /**
   * @param int
   */
  public function setMaxNumWindows($maxNumWindows)
  {
    $this->maxNumWindows = $maxNumWindows;
  }
  /**
   * @return int
   */
  public function getMaxNumWindows()
  {
    return $this->maxNumWindows;
  }
  /**
   * @param bool
   */
  public function setTargetedSystemDisplayActualPeakLuminanceFlag($targetedSystemDisplayActualPeakLuminanceFlag)
  {
    $this->targetedSystemDisplayActualPeakLuminanceFlag = $targetedSystemDisplayActualPeakLuminanceFlag;
  }
  /**
   * @return bool
   */
  public function getTargetedSystemDisplayActualPeakLuminanceFlag()
  {
    return $this->targetedSystemDisplayActualPeakLuminanceFlag;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoFileHDR10PlusStats::class, 'Google_Service_Contentwarehouse_VideoFileHDR10PlusStats');
