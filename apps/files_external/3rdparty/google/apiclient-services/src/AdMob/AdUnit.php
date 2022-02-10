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

namespace Google\Service\AdMob;

class AdUnit extends \Google\Collection
{
  protected $collection_key = 'adTypes';
  /**
   * @var string
   */
  public $adFormat;
  /**
   * @var string[]
   */
  public $adTypes;
  /**
   * @var string
   */
  public $adUnitId;
  /**
   * @var string
   */
  public $appId;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $name;

  /**
   * @param string
   */
  public function setAdFormat($adFormat)
  {
    $this->adFormat = $adFormat;
  }
  /**
   * @return string
   */
  public function getAdFormat()
  {
    return $this->adFormat;
  }
  /**
   * @param string[]
   */
  public function setAdTypes($adTypes)
  {
    $this->adTypes = $adTypes;
  }
  /**
   * @return string[]
   */
  public function getAdTypes()
  {
    return $this->adTypes;
  }
  /**
   * @param string
   */
  public function setAdUnitId($adUnitId)
  {
    $this->adUnitId = $adUnitId;
  }
  /**
   * @return string
   */
  public function getAdUnitId()
  {
    return $this->adUnitId;
  }
  /**
   * @param string
   */
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  /**
   * @return string
   */
  public function getAppId()
  {
    return $this->appId;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdUnit::class, 'Google_Service_AdMob_AdUnit');
