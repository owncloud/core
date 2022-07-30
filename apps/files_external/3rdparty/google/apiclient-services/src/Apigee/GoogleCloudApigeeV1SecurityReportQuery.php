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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1SecurityReportQuery extends \Google\Collection
{
  protected $collection_key = 'metrics';
  /**
   * @var string
   */
  public $csvDelimiter;
  /**
   * @var string[]
   */
  public $dimensions;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $envgroupHostname;
  /**
   * @var string
   */
  public $filter;
  /**
   * @var string
   */
  public $groupByTimeUnit;
  /**
   * @var int
   */
  public $limit;
  protected $metricsType = GoogleCloudApigeeV1SecurityReportQueryMetric::class;
  protected $metricsDataType = 'array';
  /**
   * @var string
   */
  public $mimeType;
  /**
   * @var string
   */
  public $reportDefinitionId;
  /**
   * @var array
   */
  public $timeRange;

  /**
   * @param string
   */
  public function setCsvDelimiter($csvDelimiter)
  {
    $this->csvDelimiter = $csvDelimiter;
  }
  /**
   * @return string
   */
  public function getCsvDelimiter()
  {
    return $this->csvDelimiter;
  }
  /**
   * @param string[]
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return string[]
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setEnvgroupHostname($envgroupHostname)
  {
    $this->envgroupHostname = $envgroupHostname;
  }
  /**
   * @return string
   */
  public function getEnvgroupHostname()
  {
    return $this->envgroupHostname;
  }
  /**
   * @param string
   */
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return string
   */
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param string
   */
  public function setGroupByTimeUnit($groupByTimeUnit)
  {
    $this->groupByTimeUnit = $groupByTimeUnit;
  }
  /**
   * @return string
   */
  public function getGroupByTimeUnit()
  {
    return $this->groupByTimeUnit;
  }
  /**
   * @param int
   */
  public function setLimit($limit)
  {
    $this->limit = $limit;
  }
  /**
   * @return int
   */
  public function getLimit()
  {
    return $this->limit;
  }
  /**
   * @param GoogleCloudApigeeV1SecurityReportQueryMetric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return GoogleCloudApigeeV1SecurityReportQueryMetric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
  /**
   * @param string
   */
  public function setReportDefinitionId($reportDefinitionId)
  {
    $this->reportDefinitionId = $reportDefinitionId;
  }
  /**
   * @return string
   */
  public function getReportDefinitionId()
  {
    return $this->reportDefinitionId;
  }
  /**
   * @param array
   */
  public function setTimeRange($timeRange)
  {
    $this->timeRange = $timeRange;
  }
  /**
   * @return array
   */
  public function getTimeRange()
  {
    return $this->timeRange;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1SecurityReportQuery::class, 'Google_Service_Apigee_GoogleCloudApigeeV1SecurityReportQuery');
