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

namespace Google\Service\AndroidEnterprise;

class AppVersion extends \Google\Collection
{
  protected $collection_key = 'trackId';
  /**
   * @var bool
   */
  public $isProduction;
  /**
   * @var string
   */
  public $track;
  /**
   * @var string[]
   */
  public $trackId;
  /**
   * @var int
   */
  public $versionCode;
  /**
   * @var string
   */
  public $versionString;

  /**
   * @param bool
   */
  public function setIsProduction($isProduction)
  {
    $this->isProduction = $isProduction;
  }
  /**
   * @return bool
   */
  public function getIsProduction()
  {
    return $this->isProduction;
  }
  /**
   * @param string
   */
  public function setTrack($track)
  {
    $this->track = $track;
  }
  /**
   * @return string
   */
  public function getTrack()
  {
    return $this->track;
  }
  /**
   * @param string[]
   */
  public function setTrackId($trackId)
  {
    $this->trackId = $trackId;
  }
  /**
   * @return string[]
   */
  public function getTrackId()
  {
    return $this->trackId;
  }
  /**
   * @param int
   */
  public function setVersionCode($versionCode)
  {
    $this->versionCode = $versionCode;
  }
  /**
   * @return int
   */
  public function getVersionCode()
  {
    return $this->versionCode;
  }
  /**
   * @param string
   */
  public function setVersionString($versionString)
  {
    $this->versionString = $versionString;
  }
  /**
   * @return string
   */
  public function getVersionString()
  {
    return $this->versionString;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppVersion::class, 'Google_Service_AndroidEnterprise_AppVersion');
