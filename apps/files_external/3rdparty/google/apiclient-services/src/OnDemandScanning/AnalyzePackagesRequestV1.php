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

namespace Google\Service\OnDemandScanning;

class AnalyzePackagesRequestV1 extends \Google\Collection
{
  protected $collection_key = 'packages';
  /**
   * @var bool
   */
  public $includeOsvData;
  protected $packagesType = PackageData::class;
  protected $packagesDataType = 'array';
  /**
   * @var string
   */
  public $resourceUri;

  /**
   * @param bool
   */
  public function setIncludeOsvData($includeOsvData)
  {
    $this->includeOsvData = $includeOsvData;
  }
  /**
   * @return bool
   */
  public function getIncludeOsvData()
  {
    return $this->includeOsvData;
  }
  /**
   * @param PackageData[]
   */
  public function setPackages($packages)
  {
    $this->packages = $packages;
  }
  /**
   * @return PackageData[]
   */
  public function getPackages()
  {
    return $this->packages;
  }
  /**
   * @param string
   */
  public function setResourceUri($resourceUri)
  {
    $this->resourceUri = $resourceUri;
  }
  /**
   * @return string
   */
  public function getResourceUri()
  {
    return $this->resourceUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AnalyzePackagesRequestV1::class, 'Google_Service_OnDemandScanning_AnalyzePackagesRequestV1');
