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

class GoogleCloudApigeeV1QueryMetadata extends \Google\Collection
{
  protected $collection_key = 'metrics';
  public $dimensions;
  public $endTimestamp;
  public $metrics;
  public $outputFormat;
  public $startTimestamp;
  public $timeUnit;

  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  public function getDimensions()
  {
    return $this->dimensions;
  }
  public function setEndTimestamp($endTimestamp)
  {
    $this->endTimestamp = $endTimestamp;
  }
  public function getEndTimestamp()
  {
    return $this->endTimestamp;
  }
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  public function getMetrics()
  {
    return $this->metrics;
  }
  public function setOutputFormat($outputFormat)
  {
    $this->outputFormat = $outputFormat;
  }
  public function getOutputFormat()
  {
    return $this->outputFormat;
  }
  public function setStartTimestamp($startTimestamp)
  {
    $this->startTimestamp = $startTimestamp;
  }
  public function getStartTimestamp()
  {
    return $this->startTimestamp;
  }
  public function setTimeUnit($timeUnit)
  {
    $this->timeUnit = $timeUnit;
  }
  public function getTimeUnit()
  {
    return $this->timeUnit;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1QueryMetadata::class, 'Google_Service_Apigee_GoogleCloudApigeeV1QueryMetadata');
