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
  public $chartType;
  public $comments;
  public $createdAt;
  public $dimensions;
  public $displayName;
  public $environment;
  public $filter;
  public $fromTime;
  public $lastModifiedAt;
  public $lastViewedAt;
  public $limit;
  protected $metricsType = GoogleCloudApigeeV1CustomReportMetric::class;
  protected $metricsDataType = 'array';
  public $name;
  public $offset;
  public $organization;
  protected $propertiesType = GoogleCloudApigeeV1ReportProperty::class;
  protected $propertiesDataType = 'array';
  public $sortByCols;
  public $sortOrder;
  public $tags;
  public $timeUnit;
  public $toTime;
  public $topk;

  public function setChartType($chartType)
  {
    $this->chartType = $chartType;
  }
  public function getChartType()
  {
    return $this->chartType;
  }
  public function setComments($comments)
  {
    $this->comments = $comments;
  }
  public function getComments()
  {
    return $this->comments;
  }
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  public function getDimensions()
  {
    return $this->dimensions;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEnvironment($environment)
  {
    $this->environment = $environment;
  }
  public function getEnvironment()
  {
    return $this->environment;
  }
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  public function getFilter()
  {
    return $this->filter;
  }
  public function setFromTime($fromTime)
  {
    $this->fromTime = $fromTime;
  }
  public function getFromTime()
  {
    return $this->fromTime;
  }
  public function setLastModifiedAt($lastModifiedAt)
  {
    $this->lastModifiedAt = $lastModifiedAt;
  }
  public function getLastModifiedAt()
  {
    return $this->lastModifiedAt;
  }
  public function setLastViewedAt($lastViewedAt)
  {
    $this->lastViewedAt = $lastViewedAt;
  }
  public function getLastViewedAt()
  {
    return $this->lastViewedAt;
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOffset($offset)
  {
    $this->offset = $offset;
  }
  public function getOffset()
  {
    return $this->offset;
  }
  public function setOrganization($organization)
  {
    $this->organization = $organization;
  }
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
  public function setSortByCols($sortByCols)
  {
    $this->sortByCols = $sortByCols;
  }
  public function getSortByCols()
  {
    return $this->sortByCols;
  }
  public function setSortOrder($sortOrder)
  {
    $this->sortOrder = $sortOrder;
  }
  public function getSortOrder()
  {
    return $this->sortOrder;
  }
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  public function getTags()
  {
    return $this->tags;
  }
  public function setTimeUnit($timeUnit)
  {
    $this->timeUnit = $timeUnit;
  }
  public function getTimeUnit()
  {
    return $this->timeUnit;
  }
  public function setToTime($toTime)
  {
    $this->toTime = $toTime;
  }
  public function getToTime()
  {
    return $this->toTime;
  }
  public function setTopk($topk)
  {
    $this->topk = $topk;
  }
  public function getTopk()
  {
    return $this->topk;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1CustomReport::class, 'Google_Service_Apigee_GoogleCloudApigeeV1CustomReport');
