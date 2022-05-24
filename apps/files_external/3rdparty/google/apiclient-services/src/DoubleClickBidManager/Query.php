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

namespace Google\Service\DoubleClickBidManager;

class Query extends \Google\Model
{
  /**
   * @var string
   */
  public $kind;
  protected $metadataType = QueryMetadata::class;
  protected $metadataDataType = '';
  protected $paramsType = Parameters::class;
  protected $paramsDataType = '';
  /**
   * @var string
   */
  public $queryId;
  /**
   * @var string
   */
  public $reportDataEndTimeMs;
  /**
   * @var string
   */
  public $reportDataStartTimeMs;
  protected $scheduleType = QuerySchedule::class;
  protected $scheduleDataType = '';
  /**
   * @var string
   */
  public $timezoneCode;

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
   * @param QueryMetadata
   */
  public function setMetadata(QueryMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return QueryMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param Parameters
   */
  public function setParams(Parameters $params)
  {
    $this->params = $params;
  }
  /**
   * @return Parameters
   */
  public function getParams()
  {
    return $this->params;
  }
  /**
   * @param string
   */
  public function setQueryId($queryId)
  {
    $this->queryId = $queryId;
  }
  /**
   * @return string
   */
  public function getQueryId()
  {
    return $this->queryId;
  }
  /**
   * @param string
   */
  public function setReportDataEndTimeMs($reportDataEndTimeMs)
  {
    $this->reportDataEndTimeMs = $reportDataEndTimeMs;
  }
  /**
   * @return string
   */
  public function getReportDataEndTimeMs()
  {
    return $this->reportDataEndTimeMs;
  }
  /**
   * @param string
   */
  public function setReportDataStartTimeMs($reportDataStartTimeMs)
  {
    $this->reportDataStartTimeMs = $reportDataStartTimeMs;
  }
  /**
   * @return string
   */
  public function getReportDataStartTimeMs()
  {
    return $this->reportDataStartTimeMs;
  }
  /**
   * @param QuerySchedule
   */
  public function setSchedule(QuerySchedule $schedule)
  {
    $this->schedule = $schedule;
  }
  /**
   * @return QuerySchedule
   */
  public function getSchedule()
  {
    return $this->schedule;
  }
  /**
   * @param string
   */
  public function setTimezoneCode($timezoneCode)
  {
    $this->timezoneCode = $timezoneCode;
  }
  /**
   * @return string
   */
  public function getTimezoneCode()
  {
    return $this->timezoneCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Query::class, 'Google_Service_DoubleClickBidManager_Query');
