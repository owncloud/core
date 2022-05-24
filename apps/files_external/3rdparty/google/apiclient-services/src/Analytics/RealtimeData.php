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

namespace Google\Service\Analytics;

class RealtimeData extends \Google\Collection
{
  protected $collection_key = 'rows';
  protected $columnHeadersType = RealtimeDataColumnHeaders::class;
  protected $columnHeadersDataType = 'array';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $profileInfoType = RealtimeDataProfileInfo::class;
  protected $profileInfoDataType = '';
  protected $queryType = RealtimeDataQuery::class;
  protected $queryDataType = '';
  /**
   * @var string[]
   */
  public $rows;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var int
   */
  public $totalResults;
  /**
   * @var string[]
   */
  public $totalsForAllResults;

  /**
   * @param RealtimeDataColumnHeaders[]
   */
  public function setColumnHeaders($columnHeaders)
  {
    $this->columnHeaders = $columnHeaders;
  }
  /**
   * @return RealtimeDataColumnHeaders[]
   */
  public function getColumnHeaders()
  {
    return $this->columnHeaders;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param RealtimeDataProfileInfo
   */
  public function setProfileInfo(RealtimeDataProfileInfo $profileInfo)
  {
    $this->profileInfo = $profileInfo;
  }
  /**
   * @return RealtimeDataProfileInfo
   */
  public function getProfileInfo()
  {
    return $this->profileInfo;
  }
  /**
   * @param RealtimeDataQuery
   */
  public function setQuery(RealtimeDataQuery $query)
  {
    $this->query = $query;
  }
  /**
   * @return RealtimeDataQuery
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param string[]
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return string[]
   */
  public function getRows()
  {
    return $this->rows;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param int
   */
  public function setTotalResults($totalResults)
  {
    $this->totalResults = $totalResults;
  }
  /**
   * @return int
   */
  public function getTotalResults()
  {
    return $this->totalResults;
  }
  /**
   * @param string[]
   */
  public function setTotalsForAllResults($totalsForAllResults)
  {
    $this->totalsForAllResults = $totalsForAllResults;
  }
  /**
   * @return string[]
   */
  public function getTotalsForAllResults()
  {
    return $this->totalsForAllResults;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RealtimeData::class, 'Google_Service_Analytics_RealtimeData');
