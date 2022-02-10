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

class GoogleCloudApigeeV1CustomReport extends \Google\Collection
{
  protected $collection_key = 'tags';
  /**
   * @var string
   */
  public $chartType;
  /**
   * @var string[]
   */
  public $comments;
  /**
   * @var string
   */
  public $createdAt;
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
  public $environment;
  /**
   * @var string
   */
  public $filter;
  /**
   * @var string
   */
  public $fromTime;
  /**
   * @var string
   */
  public $lastModifiedAt;
  /**
   * @var string
   */
  public $lastViewedAt;
  /**
   * @var string
   */
  public $limit;
  protected $metricsType = GoogleCloudApigeeV1CustomReportMetric::class;
  protected $metricsDataType = 'array';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $offset;
  /**
   * @var string
   */
  public $organization;
  protected $propertiesType = GoogleCloudApigeeV1ReportProperty::class;
  protected $propertiesDataType = 'array';
  /**
   * @var string[]
   */
  public $sortByCols;
  /**
   * @var string
   */
  public $sortOrder;
  /**
   * @var string[]
   */
  public $tags;
  /**
   * @var string
   */
  public $timeUnit;
  /**
   * @var string
   */
  public $toTime;
  /**
   * @var string
   */
  public $topk;

  /**
   * @param string
   */
  public function setChartType($chartType)
  {
    $this->chartType = $chartType;
  }
  /**
   * @return string
   */
  public function getChartType()
  {
    return $this->chartType;
  }
  /**
   * @param string[]
   */
  public function setComments($comments)
  {
    $this->comments = $comments;
  }
  /**
   * @return string[]
   */
  public function getComments()
  {
    return $this->comments;
  }
  /**
   * @param string
   */
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  /**
   * @return string
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
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
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  /**
   * @return string
   */
  public function getEnvironment()
  {
    return $this->environment;
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
  public function setFromTime($fromTime)
  {
    $this->fromTime = $fromTime;
  }
  /**
   * @return string
   */
  public function getFromTime()
  {
    return $this->fromTime;
  }
  /**
   * @param string
   */
  public function setLastModifiedAt($lastModifiedAt)
  {
    $this->lastModifiedAt = $lastModifiedAt;
  }
  /**
   * @return string
   */
  public function getLastModifiedAt()
  {
    return $this->lastModifiedAt;
  }
  /**
   * @param string
   */
  public function setLastViewedAt($lastViewedAt)
  {
    $this->lastViewedAt = $lastViewedAt;
  }
  /**
   * @return string
   */
  public function getLastViewedAt()
  {
    return $this->lastViewedAt;
  }
  /**
   * @param string
   */
  public function setLimit($limit)
  {
    $this->limit = $limit;
  }
  /**
   * @return string
   */
  public function getLimit()
  {
    return $this->limit;
  }
  /**
   * @param GoogleCloudApigeeV1CustomReportMetric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return GoogleCloudApigeeV1CustomReportMetric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  /**
   * @return string
   */
  public function getOffset()
  {
    return $this->offset;
  }
  /**
   * @param string
   */
  public function setOrganization($organization)
  {
    $this->organization = $organization;
  }
  /**
   * @return string
   */
  public function getOrganization()
  {
    return $this->organization;
  }
  /**
   * @param GoogleCloudApigeeV1ReportProperty[]
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return GoogleCloudApigeeV1ReportProperty[]
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param string[]
   */
  public function setSortByCols($sortByCols)
  {
    $this->sortByCols = $sortByCols;
  }
  /**
   * @return string[]
   */
  public function getSortByCols()
  {
    return $this->sortByCols;
  }
  /**
   * @param string
   */
  public function setSortOrder($sortOrder)
  {
    $this->sortOrder = $sortOrder;
  }
  /**
   * @return string
   */
  public function getSortOrder()
  {
    return $this->sortOrder;
  }
  /**
   * @param string[]
   */
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return string[]
   */
  public function getTags()
  {
    return $this->tags;
  }
  /**
   * @param string
   */
  public function setTimeUnit($timeUnit)
  {
    $this->timeUnit = $timeUnit;
  }
  /**
   * @return string
   */
  public function getTimeUnit()
  {
    return $this->timeUnit;
  }
  /**
   * @param string
   */
  public function setToTime($toTime)
  {
    $this->toTime = $toTime;
  }
  /**
   * @return string
   */
  public function getToTime()
  {
    return $this->toTime;
  }
  /**
   * @param string
   */
  public function setTopk($topk)
  {
    $this->topk = $topk;
  }
  /**
   * @return string
   */
  public function getTopk()
  {
    return $this->topk;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1CustomReport::class, 'Google_Service_Apigee_GoogleCloudApigeeV1CustomReport');
