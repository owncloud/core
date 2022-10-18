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

class IndexingDocjoinerAnchorStatisticsPerDupStats extends \Google\Model
{
  /**
   * @var int
   */
  public $anchorCount;
  /**
   * @var int
   */
  public $collectType;
  /**
   * @var string
   */
  public $dupUrl;
  /**
   * @var int
   */
  public $offdomainAnchorCount;
  /**
   * @var int
   */
  public $redundantAnchorCount;
  /**
   * @var int
   */
  public $scannedAnchorCount;
  /**
   * @var int
   */
  public $timestamp;

  /**
   * @param int
   */
  public function setAnchorCount($anchorCount)
  {
    $this->anchorCount = $anchorCount;
  }
  /**
   * @return int
   */
  public function getAnchorCount()
  {
    return $this->anchorCount;
  }
  /**
   * @param int
   */
  public function setCollectType($collectType)
  {
    $this->collectType = $collectType;
  }
  /**
   * @return int
   */
  public function getCollectType()
  {
    return $this->collectType;
  }
  /**
   * @param string
   */
  public function setDupUrl($dupUrl)
  {
    $this->dupUrl = $dupUrl;
  }
  /**
   * @return string
   */
  public function getDupUrl()
  {
    return $this->dupUrl;
  }
  /**
   * @param int
   */
  public function setOffdomainAnchorCount($offdomainAnchorCount)
  {
    $this->offdomainAnchorCount = $offdomainAnchorCount;
  }
  /**
   * @return int
   */
  public function getOffdomainAnchorCount()
  {
    return $this->offdomainAnchorCount;
  }
  /**
   * @param int
   */
  public function setRedundantAnchorCount($redundantAnchorCount)
  {
    $this->redundantAnchorCount = $redundantAnchorCount;
  }
  /**
   * @return int
   */
  public function getRedundantAnchorCount()
  {
    return $this->redundantAnchorCount;
  }
  /**
   * @param int
   */
  public function setScannedAnchorCount($scannedAnchorCount)
  {
    $this->scannedAnchorCount = $scannedAnchorCount;
  }
  /**
   * @return int
   */
  public function getScannedAnchorCount()
  {
    return $this->scannedAnchorCount;
  }
  /**
   * @param int
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return int
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingDocjoinerAnchorStatisticsPerDupStats::class, 'Google_Service_Contentwarehouse_IndexingDocjoinerAnchorStatisticsPerDupStats');
