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

class Google_Service_Testing_ApkManifest extends Google_Collection
{
  protected $collection_key = 'intentFilters';
  public $applicationLabel;
  protected $intentFiltersType = 'Google_Service_Testing_IntentFilter';
  protected $intentFiltersDataType = 'array';
  public $maxSdkVersion;
  public $minSdkVersion;
  public $packageName;
  public $targetSdkVersion;

  public function setApplicationLabel($applicationLabel)
  {
    $this->applicationLabel = $applicationLabel;
  }
  public function getApplicationLabel()
  {
    return $this->applicationLabel;
  }
  /**
   * @param Google_Service_Testing_IntentFilter[]
   */
  public function setIntentFilters($intentFilters)
  {
    $this->intentFilters = $intentFilters;
  }
  /**
   * @return Google_Service_Testing_IntentFilter[]
   */
  public function getIntentFilters()
  {
    return $this->intentFilters;
  }
  public function setMaxSdkVersion($maxSdkVersion)
  {
    $this->maxSdkVersion = $maxSdkVersion;
  }
  public function getMaxSdkVersion()
  {
    return $this->maxSdkVersion;
  }
  public function setMinSdkVersion($minSdkVersion)
  {
    $this->minSdkVersion = $minSdkVersion;
  }
  public function getMinSdkVersion()
  {
    return $this->minSdkVersion;
  }
  public function setPackageName($packageName)
  {
    $this->packageName = $packageName;
  }
  public function getPackageName()
  {
    return $this->packageName;
  }
  public function setTargetSdkVersion($targetSdkVersion)
  {
    $this->targetSdkVersion = $targetSdkVersion;
  }
  public function getTargetSdkVersion()
  {
    return $this->targetSdkVersion;
  }
}
