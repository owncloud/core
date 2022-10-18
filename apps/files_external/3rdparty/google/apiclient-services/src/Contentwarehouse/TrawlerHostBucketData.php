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

class TrawlerHostBucketData extends \Google\Collection
{
  protected $collection_key = 'urllist';
  protected $internal_gapi_mappings = [
        "clientTrafficFraction" => "ClientTrafficFraction",
        "clientWeightFraction" => "ClientWeightFraction",
        "currentActiveConnections" => "CurrentActiveConnections",
        "isFull" => "IsFull",
        "lastScheduleIntervalMs" => "LastScheduleIntervalMs",
        "maxActiveConnections" => "MaxActiveConnections",
        "mediumTermLoad" => "MediumTermLoad",
        "minInterRequestSecs" => "MinInterRequestSecs",
        "nonFullIntervalMs" => "NonFullIntervalMs",
        "totalCapacityQps" => "TotalCapacityQps",
        "totalUsedQps" => "TotalUsedQps",
  ];
  /**
   * @var float
   */
  public $clientTrafficFraction;
  /**
   * @var float
   */
  public $clientWeightFraction;
  /**
   * @var int
   */
  public $currentActiveConnections;
  /**
   * @var bool
   */
  public $isFull;
  /**
   * @var string
   */
  public $lastScheduleIntervalMs;
  /**
   * @var float
   */
  public $maxActiveConnections;
  /**
   * @var float
   */
  public $mediumTermLoad;
  /**
   * @var float
   */
  public $minInterRequestSecs;
  /**
   * @var string
   */
  public $nonFullIntervalMs;
  /**
   * @var float
   */
  public $totalCapacityQps;
  /**
   * @var float
   */
  public $totalUsedQps;
  protected $urllistType = TrawlerHostBucketDataUrlList::class;
  protected $urllistDataType = 'array';

  /**
   * @param float
   */
  public function setClientTrafficFraction($clientTrafficFraction)
  {
    $this->clientTrafficFraction = $clientTrafficFraction;
  }
  /**
   * @return float
   */
  public function getClientTrafficFraction()
  {
    return $this->clientTrafficFraction;
  }
  /**
   * @param float
   */
  public function setClientWeightFraction($clientWeightFraction)
  {
    $this->clientWeightFraction = $clientWeightFraction;
  }
  /**
   * @return float
   */
  public function getClientWeightFraction()
  {
    return $this->clientWeightFraction;
  }
  /**
   * @param int
   */
  public function setCurrentActiveConnections($currentActiveConnections)
  {
    $this->currentActiveConnections = $currentActiveConnections;
  }
  /**
   * @return int
   */
  public function getCurrentActiveConnections()
  {
    return $this->currentActiveConnections;
  }
  /**
   * @param bool
   */
  public function setIsFull($isFull)
  {
    $this->isFull = $isFull;
  }
  /**
   * @return bool
   */
  public function getIsFull()
  {
    return $this->isFull;
  }
  /**
   * @param string
   */
  public function setLastScheduleIntervalMs($lastScheduleIntervalMs)
  {
    $this->lastScheduleIntervalMs = $lastScheduleIntervalMs;
  }
  /**
   * @return string
   */
  public function getLastScheduleIntervalMs()
  {
    return $this->lastScheduleIntervalMs;
  }
  /**
   * @param float
   */
  public function setMaxActiveConnections($maxActiveConnections)
  {
    $this->maxActiveConnections = $maxActiveConnections;
  }
  /**
   * @return float
   */
  public function getMaxActiveConnections()
  {
    return $this->maxActiveConnections;
  }
  /**
   * @param float
   */
  public function setMediumTermLoad($mediumTermLoad)
  {
    $this->mediumTermLoad = $mediumTermLoad;
  }
  /**
   * @return float
   */
  public function getMediumTermLoad()
  {
    return $this->mediumTermLoad;
  }
  /**
   * @param float
   */
  public function setMinInterRequestSecs($minInterRequestSecs)
  {
    $this->minInterRequestSecs = $minInterRequestSecs;
  }
  /**
   * @return float
   */
  public function getMinInterRequestSecs()
  {
    return $this->minInterRequestSecs;
  }
  /**
   * @param string
   */
  public function setNonFullIntervalMs($nonFullIntervalMs)
  {
    $this->nonFullIntervalMs = $nonFullIntervalMs;
  }
  /**
   * @return string
   */
  public function getNonFullIntervalMs()
  {
    return $this->nonFullIntervalMs;
  }
  /**
   * @param float
   */
  public function setTotalCapacityQps($totalCapacityQps)
  {
    $this->totalCapacityQps = $totalCapacityQps;
  }
  /**
   * @return float
   */
  public function getTotalCapacityQps()
  {
    return $this->totalCapacityQps;
  }
  /**
   * @param float
   */
  public function setTotalUsedQps($totalUsedQps)
  {
    $this->totalUsedQps = $totalUsedQps;
  }
  /**
   * @return float
   */
  public function getTotalUsedQps()
  {
    return $this->totalUsedQps;
  }
  /**
   * @param TrawlerHostBucketDataUrlList[]
   */
  public function setUrllist($urllist)
  {
    $this->urllist = $urllist;
  }
  /**
   * @return TrawlerHostBucketDataUrlList[]
   */
  public function getUrllist()
  {
    return $this->urllist;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerHostBucketData::class, 'Google_Service_Contentwarehouse_TrawlerHostBucketData');
