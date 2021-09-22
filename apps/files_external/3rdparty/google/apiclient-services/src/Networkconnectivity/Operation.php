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

namespace Google\Service\Networkconnectivity;

class Operation extends \Google\Collection
{
  protected $collection_key = 'traceSpans';
  public $consumerId;
  public $endTime;
  public $extensions;
  public $importance;
  public $labels;
  protected $logEntriesType = LogEntry::class;
  protected $logEntriesDataType = 'array';
  protected $metricValueSetsType = MetricValueSet::class;
  protected $metricValueSetsDataType = 'array';
  public $operationId;
  public $operationName;
  protected $quotaPropertiesType = QuotaProperties::class;
  protected $quotaPropertiesDataType = '';
  protected $resourcesType = ResourceInfo::class;
  protected $resourcesDataType = 'array';
  public $startTime;
  protected $traceSpansType = TraceSpan::class;
  protected $traceSpansDataType = 'array';
  public $userLabels;

  public function setConsumerId($consumerId)
  {
    $this->consumerId = $consumerId;
  }
  public function getConsumerId()
  {
    return $this->consumerId;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setExtensions($extensions)
  {
    $this->extensions = $extensions;
  }
  public function getExtensions()
  {
    return $this->extensions;
  }
  public function setImportance($importance)
  {
    $this->importance = $importance;
  }
  public function getImportance()
  {
    return $this->importance;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param LogEntry[]
   */
  public function setLogEntries($logEntries)
  {
    $this->logEntries = $logEntries;
  }
  /**
   * @return LogEntry[]
   */
  public function getLogEntries()
  {
    return $this->logEntries;
  }
  /**
   * @param MetricValueSet[]
   */
  public function setMetricValueSets($metricValueSets)
  {
    $this->metricValueSets = $metricValueSets;
  }
  /**
   * @return MetricValueSet[]
   */
  public function getMetricValueSets()
  {
    return $this->metricValueSets;
  }
  public function setOperationId($operationId)
  {
    $this->operationId = $operationId;
  }
  public function getOperationId()
  {
    return $this->operationId;
  }
  public function setOperationName($operationName)
  {
    $this->operationName = $operationName;
  }
  public function getOperationName()
  {
    return $this->operationName;
  }
  /**
   * @param QuotaProperties
   */
  public function setQuotaProperties(QuotaProperties $quotaProperties)
  {
    $this->quotaProperties = $quotaProperties;
  }
  /**
   * @return QuotaProperties
   */
  public function getQuotaProperties()
  {
    return $this->quotaProperties;
  }
  /**
   * @param ResourceInfo[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return ResourceInfo[]
   */
  public function getResources()
  {
    return $this->resources;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param TraceSpan[]
   */
  public function setTraceSpans($traceSpans)
  {
    $this->traceSpans = $traceSpans;
  }
  /**
   * @return TraceSpan[]
   */
  public function getTraceSpans()
  {
    return $this->traceSpans;
  }
  public function setUserLabels($userLabels)
  {
    $this->userLabels = $userLabels;
  }
  public function getUserLabels()
  {
    return $this->userLabels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Operation::class, 'Google_Service_Networkconnectivity_Operation');
