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

namespace Google\Service\AlertCenter;

class AppsOutage extends \Google\Collection
{
  protected $collection_key = 'products';
  /**
   * @var string
   */
  public $dashboardUri;
  /**
   * @var string
   */
  public $incidentTrackingId;
  protected $mergeInfoType = MergeInfo::class;
  protected $mergeInfoDataType = '';
  /**
   * @var string
   */
  public $nextUpdateTime;
  /**
   * @var string[]
   */
  public $products;
  /**
   * @var string
   */
  public $resolutionTime;
  /**
   * @var string
   */
  public $status;

  /**
   * @param string
   */
  public function setDashboardUri($dashboardUri)
  {
    $this->dashboardUri = $dashboardUri;
  }
  /**
   * @return string
   */
  public function getDashboardUri()
  {
    return $this->dashboardUri;
  }
  /**
   * @param string
   */
  public function setIncidentTrackingId($incidentTrackingId)
  {
    $this->incidentTrackingId = $incidentTrackingId;
  }
  /**
   * @return string
   */
  public function getIncidentTrackingId()
  {
    return $this->incidentTrackingId;
  }
  /**
   * @param MergeInfo
   */
  public function setMergeInfo(MergeInfo $mergeInfo)
  {
    $this->mergeInfo = $mergeInfo;
  }
  /**
   * @return MergeInfo
   */
  public function getMergeInfo()
  {
    return $this->mergeInfo;
  }
  /**
   * @param string
   */
  public function setNextUpdateTime($nextUpdateTime)
  {
    $this->nextUpdateTime = $nextUpdateTime;
  }
  /**
   * @return string
   */
  public function getNextUpdateTime()
  {
    return $this->nextUpdateTime;
  }
  /**
   * @param string[]
   */
  public function setProducts($products)
  {
    $this->products = $products;
  }
  /**
   * @return string[]
   */
  public function getProducts()
  {
    return $this->products;
  }
  /**
   * @param string
   */
  public function setResolutionTime($resolutionTime)
  {
    $this->resolutionTime = $resolutionTime;
  }
  /**
   * @return string
   */
  public function getResolutionTime()
  {
    return $this->resolutionTime;
  }
  /**
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsOutage::class, 'Google_Service_AlertCenter_AppsOutage');
