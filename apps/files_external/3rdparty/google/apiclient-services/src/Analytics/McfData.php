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

class McfData extends \Google\Collection
{
  protected $collection_key = 'rows';
  protected $columnHeadersType = McfDataColumnHeaders::class;
  protected $columnHeadersDataType = 'array';
  /**
   * @var bool
   */
  public $containsSampledData;
  /**
   * @var string
   */
  public $id;
  /**
   * @var int
   */
  public $itemsPerPage;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $nextLink;
  /**
   * @var string
   */
  public $previousLink;
  protected $profileInfoType = McfDataProfileInfo::class;
  protected $profileInfoDataType = '';
  protected $queryType = McfDataQuery::class;
  protected $queryDataType = '';
  protected $rowsType = McfDataRows::class;
  protected $rowsDataType = 'array';
  /**
   * @var string
   */
  public $sampleSize;
  /**
   * @var string
   */
  public $sampleSpace;
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
   * @param McfDataColumnHeaders[]
   */
  public function setColumnHeaders($columnHeaders)
  {
    $this->columnHeaders = $columnHeaders;
  }
  /**
   * @return McfDataColumnHeaders[]
   */
  public function getColumnHeaders()
  {
    return $this->columnHeaders;
  }
  /**
   * @param bool
   */
  public function setContainsSampledData($containsSampledData)
  {
    $this->containsSampledData = $containsSampledData;
  }
  /**
   * @return bool
   */
  public function getContainsSampledData()
  {
    return $this->containsSampledData;
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
   * @param int
   */
  public function setItemsPerPage($itemsPerPage)
  {
    $this->itemsPerPage = $itemsPerPage;
  }
  /**
   * @return int
   */
  public function getItemsPerPage()
  {
    return $this->itemsPerPage;
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
   * @param string
   */
  public function setNextLink($nextLink)
  {
    $this->nextLink = $nextLink;
  }
  /**
   * @return string
   */
  public function getNextLink()
  {
    return $this->nextLink;
  }
  /**
   * @param string
   */
  public function setPreviousLink($previousLink)
  {
    $this->previousLink = $previousLink;
  }
  /**
   * @return string
   */
  public function getPreviousLink()
  {
    return $this->previousLink;
  }
  /**
   * @param McfDataProfileInfo
   */
  public function setProfileInfo(McfDataProfileInfo $profileInfo)
  {
    $this->profileInfo = $profileInfo;
  }
  /**
   * @return McfDataProfileInfo
   */
  public function getProfileInfo()
  {
    return $this->profileInfo;
  }
  /**
   * @param McfDataQuery
   */
  public function setQuery(McfDataQuery $query)
  {
    $this->query = $query;
  }
  /**
   * @return McfDataQuery
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param McfDataRows[]
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return McfDataRows[]
   */
  public function getRows()
  {
    return $this->rows;
  }
  /**
   * @param string
   */
  public function setSampleSize($sampleSize)
  {
    $this->sampleSize = $sampleSize;
  }
  /**
   * @return string
   */
  public function getSampleSize()
  {
    return $this->sampleSize;
  }
  /**
   * @param string
   */
  public function setSampleSpace($sampleSpace)
  {
    $this->sampleSpace = $sampleSpace;
  }
  /**
   * @return string
   */
  public function getSampleSpace()
  {
    return $this->sampleSpace;
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
class_alias(McfData::class, 'Google_Service_Analytics_McfData');
