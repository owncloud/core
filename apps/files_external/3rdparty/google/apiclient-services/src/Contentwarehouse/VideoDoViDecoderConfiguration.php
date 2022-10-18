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

class VideoDoViDecoderConfiguration extends \Google\Model
{
  /**
   * @var bool
   */
  public $blPresentFlag;
  /**
   * @var string
   */
  public $dvBlSignalCompatibilityId;
  /**
   * @var string
   */
  public $dvLevel;
  /**
   * @var string
   */
  public $dvProfile;
  /**
   * @var string
   */
  public $dvVersionMajor;
  /**
   * @var string
   */
  public $dvVersionMinor;
  /**
   * @var bool
   */
  public $elPresentFlag;
  /**
   * @var string
   */
  public $fourccTag;
  /**
   * @var bool
   */
  public $rpuPresentFlag;

  /**
   * @param bool
   */
  public function setBlPresentFlag($blPresentFlag)
  {
    $this->blPresentFlag = $blPresentFlag;
  }
  /**
   * @return bool
   */
  public function getBlPresentFlag()
  {
    return $this->blPresentFlag;
  }
  /**
   * @param string
   */
  public function setDvBlSignalCompatibilityId($dvBlSignalCompatibilityId)
  {
    $this->dvBlSignalCompatibilityId = $dvBlSignalCompatibilityId;
  }
  /**
   * @return string
   */
  public function getDvBlSignalCompatibilityId()
  {
    return $this->dvBlSignalCompatibilityId;
  }
  /**
   * @param string
   */
  public function setDvLevel($dvLevel)
  {
    $this->dvLevel = $dvLevel;
  }
  /**
   * @return string
   */
  public function getDvLevel()
  {
    return $this->dvLevel;
  }
  /**
   * @param string
   */
  public function setDvProfile($dvProfile)
  {
    $this->dvProfile = $dvProfile;
  }
  /**
   * @return string
   */
  public function getDvProfile()
  {
    return $this->dvProfile;
  }
  /**
   * @param string
   */
  public function setDvVersionMajor($dvVersionMajor)
  {
    $this->dvVersionMajor = $dvVersionMajor;
  }
  /**
   * @return string
   */
  public function getDvVersionMajor()
  {
    return $this->dvVersionMajor;
  }
  /**
   * @param string
   */
  public function setDvVersionMinor($dvVersionMinor)
  {
    $this->dvVersionMinor = $dvVersionMinor;
  }
  /**
   * @return string
   */
  public function getDvVersionMinor()
  {
    return $this->dvVersionMinor;
  }
  /**
   * @param bool
   */
  public function setElPresentFlag($elPresentFlag)
  {
    $this->elPresentFlag = $elPresentFlag;
  }
  /**
   * @return bool
   */
  public function getElPresentFlag()
  {
    return $this->elPresentFlag;
  }
  /**
   * @param string
   */
  public function setFourccTag($fourccTag)
  {
    $this->fourccTag = $fourccTag;
  }
  /**
   * @return string
   */
  public function getFourccTag()
  {
    return $this->fourccTag;
  }
  /**
   * @param bool
   */
  public function setRpuPresentFlag($rpuPresentFlag)
  {
    $this->rpuPresentFlag = $rpuPresentFlag;
  }
  /**
   * @return bool
   */
  public function getRpuPresentFlag()
  {
    return $this->rpuPresentFlag;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoDoViDecoderConfiguration::class, 'Google_Service_Contentwarehouse_VideoDoViDecoderConfiguration');
