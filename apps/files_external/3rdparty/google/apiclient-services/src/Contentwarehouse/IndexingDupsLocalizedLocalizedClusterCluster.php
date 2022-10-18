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

class IndexingDupsLocalizedLocalizedClusterCluster extends \Google\Collection
{
  protected $collection_key = 'deprecatedDebugInfo';
  /**
   * @var string
   */
  public $clusterId;
  /**
   * @var string
   */
  public $clusterType;
  /**
   * @var string[]
   */
  public $deprecatedDebugInfo;
  /**
   * @var bool
   */
  public $filteringEnabled;
  /**
   * @var string
   */
  public $language;
  /**
   * @var int
   */
  public $regionCode;
  /**
   * @var int
   */
  public $urlRegionCode;

  /**
   * @param string
   */
  public function setClusterId($clusterId)
  {
    $this->clusterId = $clusterId;
  }
  /**
   * @return string
   */
  public function getClusterId()
  {
    return $this->clusterId;
  }
  /**
   * @param string
   */
  public function setClusterType($clusterType)
  {
    $this->clusterType = $clusterType;
  }
  /**
   * @return string
   */
  public function getClusterType()
  {
    return $this->clusterType;
  }
  /**
   * @param string[]
   */
  public function setDeprecatedDebugInfo($deprecatedDebugInfo)
  {
    $this->deprecatedDebugInfo = $deprecatedDebugInfo;
  }
  /**
   * @return string[]
   */
  public function getDeprecatedDebugInfo()
  {
    return $this->deprecatedDebugInfo;
  }
  /**
   * @param bool
   */
  public function setFilteringEnabled($filteringEnabled)
  {
    $this->filteringEnabled = $filteringEnabled;
  }
  /**
   * @return bool
   */
  public function getFilteringEnabled()
  {
    return $this->filteringEnabled;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param int
   */
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  /**
   * @return int
   */
  public function getRegionCode()
  {
    return $this->regionCode;
  }
  /**
   * @param int
   */
  public function setUrlRegionCode($urlRegionCode)
  {
    $this->urlRegionCode = $urlRegionCode;
  }
  /**
   * @return int
   */
  public function getUrlRegionCode()
  {
    return $this->urlRegionCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingDupsLocalizedLocalizedClusterCluster::class, 'Google_Service_Contentwarehouse_IndexingDupsLocalizedLocalizedClusterCluster');
