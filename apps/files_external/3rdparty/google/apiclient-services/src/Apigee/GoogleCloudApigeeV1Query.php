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

class GoogleCloudApigeeV1Query extends \Google\Collection
{
  protected $collection_key = 'metrics';
  public $csvDelimiter;
  public $dimensions;
  public $envgroupHostname;
  public $filter;
  public $groupByTimeUnit;
  public $limit;
  protected $metricsType = GoogleCloudApigeeV1QueryMetric::class;
  protected $metricsDataType = 'array';
  public $name;
  public $outputFormat;
  public $reportDefinitionId;
  public $timeRange;

  public function setCsvDelimiter($csvDelimiter)
  {
    $this->csvDelimiter = $csvDelimiter;
  }
  public function getCsvDelimiter()
  {
    return $this->csvDelimiter;
  }
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  public function getDimensions()
  {
    return $this->dimensions;
  }
  public function setEnvgroupHostname($envgroupHostname)
  {
    $this->envgroupHostname = $envgroupHostname;
  }
  public function getEnvgroupHostname()
  {
    return $this->envgroupHostname;
  }
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  public function setGroupByTimeUnit($groupByTimeUnit)
  {
    $this->groupByTimeUnit = $groupByTimeUnit;
  }
  public function getGroupByTimeUnit()
  {
    return $this->groupByTimeUnit;
  }
  public function setLimit($limit)
  {
    $this->limit = $limit;
  }
  public function getLimit()
  {
    return $this->limit;
  }
  /**
   * @param GoogleCloudApigeeV1QueryMetric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return GoogleCloudApigeeV1QueryMetric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOutputFormat($outputFormat)
  {
    $this->outputFormat = $outputFormat;
  }
  public function getOutputFormat()
  {
    return $this->outputFormat;
  }
  public function setReportDefinitionId($reportDefinitionId)
  {
    $this->reportDefinitionId = $reportDefinitionId;
  }
  public function getReportDefinitionId()
  {
    return $this->reportDefinitionId;
  }
  public function setTimeRange($timeRange)
  {
    $this->timeRange = $timeRange;
  }
  public function getTimeRange()
  {
    return $this->timeRange;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1Query::class, 'Google_Service_Apigee_GoogleCloudApigeeV1Query');
