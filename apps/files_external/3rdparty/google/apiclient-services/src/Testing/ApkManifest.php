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

namespace Google\Service\Testing;

class ApkManifest extends \Google\Collection
{
  protected $collection_key = 'usesPermission';
  /**
   * @var string
   */
  public $applicationLabel;
  protected $intentFiltersType = IntentFilter::class;
  protected $intentFiltersDataType = 'array';
  /**
   * @var int
   */
  public $maxSdkVersion;
  /**
   * @var int
   */
  public $minSdkVersion;
  /**
   * @var string
   */
  public $packageName;
  /**
   * @var int
   */
  public $targetSdkVersion;
  /**
   * @var string[]
   */
  public $usesPermission;

  /**
   * @param string
   */
  public function setApplicationLabel($applicationLabel)
  {
    $this->applicationLabel = $applicationLabel;
  }
  /**
   * @return string
   */
  public function getApplicationLabel()
  {
    return $this->applicationLabel;
  }
  /**
   * @param IntentFilter[]
   */
  public function setIntentFilters($intentFilters)
  {
    $this->intentFilters = $intentFilters;
  }
  /**
   * @return IntentFilter[]
   */
  public function getIntentFilters()
  {
    return $this->intentFilters;
  }
  /**
   * @param int
   */
  public function setMaxSdkVersion($maxSdkVersion)
  {
    $this->maxSdkVersion = $maxSdkVersion;
  }
  /**
   * @return int
   */
  public function getMaxSdkVersion()
  {
    return $this->maxSdkVersion;
  }
  /**
   * @param int
   */
  public function setMinSdkVersion($minSdkVersion)
  {
    $this->minSdkVersion = $minSdkVersion;
  }
  /**
   * @return int
   */
  public function getMinSdkVersion()
  {
    return $this->minSdkVersion;
  }
  /**
   * @param string
   */
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  /**
   * @return string
   */
  public function getPackageName()
  {
    return $this->packageName;
  }
  /**
   * @param int
   */
  public function setTargetSdkVersion($targetSdkVersion)
  {
    $this->targetSdkVersion = $targetSdkVersion;
  }
  /**
   * @return int
   */
  public function getTargetSdkVersion()
  {
    return $this->targetSdkVersion;
  }
  /**
   * @param string[]
   */
  public function setUsesPermission($usesPermission)
  {
    $this->usesPermission = $usesPermission;
  }
  /**
   * @return string[]
   */
  public function getUsesPermission()
  {
    return $this->usesPermission;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ApkManifest::class, 'Google_Service_Testing_ApkManifest');
