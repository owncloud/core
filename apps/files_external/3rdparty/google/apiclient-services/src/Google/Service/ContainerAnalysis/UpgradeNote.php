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

class Google_Service_ContainerAnalysis_UpgradeNote extends Google_Collection
{
  protected $collection_key = 'distributions';
  protected $distributionsType = 'Google_Service_ContainerAnalysis_UpgradeDistribution';
  protected $distributionsDataType = 'array';
  public $package;
  protected $versionType = 'Google_Service_ContainerAnalysis_Version';
  protected $versionDataType = '';

  /**
   * @param Google_Service_ContainerAnalysis_UpgradeDistribution
   */
  public function setDistributions($distributions)
  {
    $this->distributions = $distributions;
  }
  /**
   * @return Google_Service_ContainerAnalysis_UpgradeDistribution
   */
  public function getDistributions()
  {
    return $this->distributions;
  }
  public function setPackage($package)
  {
    $this->package = $package;
  }
  public function getPackage()
  {
    return $this->package;
  }
  /**
   * @param Google_Service_ContainerAnalysis_Version
   */
  public function setVersion(Google_Service_ContainerAnalysis_Version $version)
  {
    $this->version = $version;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Version
   */
  public function getVersion()
  {
    return $this->version;
  }
}
