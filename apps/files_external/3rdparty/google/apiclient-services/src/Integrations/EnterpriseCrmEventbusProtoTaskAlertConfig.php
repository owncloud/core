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

namespace Google\Service\Integrations;

class EnterpriseCrmEventbusProtoTaskAlertConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $aggregationPeriod;
  /**
   * @var bool
   */
  public $alertDisabled;
  /**
   * @var string
   */
  public $alertName;
  /**
   * @var string
   */
  public $clientId;
  /**
   * @var string
   */
  public $durationThresholdMs;
  protected $errorEnumListType = EnterpriseCrmEventbusProtoBaseAlertConfigErrorEnumList::class;
  protected $errorEnumListDataType = '';
  /**
   * @var string
   */
  public $metricType;
  /**
   * @var int
   */
  public $numAggregationPeriods;
  /**
   * @var bool
   */
  public $onlyFinalAttempt;
  /**
   * @var string
   */
  public $playbookUrl;
  /**
   * @var string
   */
  public $thresholdType;
  protected $thresholdValueType = EnterpriseCrmEventbusProtoBaseAlertConfigThresholdValue::class;
  protected $thresholdValueDataType = '';
  protected $warningEnumListType = EnterpriseCrmEventbusProtoBaseAlertConfigErrorEnumList::class;
  protected $warningEnumListDataType = '';

  /**
   * @param string
   */
  public function setAggregationPeriod($aggregationPeriod)
  {
    $this->aggregationPeriod = $aggregationPeriod;
  }
  /**
   * @return string
   */
  public function getAggregationPeriod()
  {
    return $this->aggregationPeriod;
  }
  /**
   * @param bool
   */
  public function setAlertDisabled($alertDisabled)
  {
    $this->alertDisabled = $alertDisabled;
  }
  /**
   * @return bool
   */
  public function getAlertDisabled()
  {
    return $this->alertDisabled;
  }
  /**
   * @param string
   */
  public function setAlertName($alertName)
  {
    $this->alertName = $alertName;
  }
  /**
   * @return string
   */
  public function getAlertName()
  {
    return $this->alertName;
  }
  /**
   * @param string
   */
  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  /**
   * @return string
   */
  public function getClientId()
  {
    return $this->clientId;
  }
  /**
   * @param string
   */
  public function setDurationThresholdMs($durationThresholdMs)
  {
    $this->durationThresholdMs = $durationThresholdMs;
  }
  /**
   * @return string
   */
  public function getDurationThresholdMs()
  {
    return $this->durationThresholdMs;
  }
  /**
   * @param EnterpriseCrmEventbusProtoBaseAlertConfigErrorEnumList
   */
  public function setErrorEnumList(EnterpriseCrmEventbusProtoBaseAlertConfigErrorEnumList $errorEnumList)
  {
    $this->errorEnumList = $errorEnumList;
  }
  /**
   * @return EnterpriseCrmEventbusProtoBaseAlertConfigErrorEnumList
   */
  public function getErrorEnumList()
  {
    return $this->errorEnumList;
  }
  /**
   * @param string
   */
  public function setMetricType($metricType)
  {
    $this->metricType = $metricType;
  }
  /**
   * @return string
   */
  public function getMetricType()
  {
    return $this->metricType;
  }
  /**
   * @param int
   */
  public function setNumAggregationPeriods($numAggregationPeriods)
  {
    $this->numAggregationPeriods = $numAggregationPeriods;
  }
  /**
   * @return int
   */
  public function getNumAggregationPeriods()
  {
    return $this->numAggregationPeriods;
  }
  /**
   * @param bool
   */
  public function setOnlyFinalAttempt($onlyFinalAttempt)
  {
    $this->onlyFinalAttempt = $onlyFinalAttempt;
  }
  /**
   * @return bool
   */
  public function getOnlyFinalAttempt()
  {
    return $this->onlyFinalAttempt;
  }
  /**
   * @param string
   */
  public function setPlaybookUrl($playbookUrl)
  {
    $this->playbookUrl = $playbookUrl;
  }
  /**
   * @return string
   */
  public function getPlaybookUrl()
  {
    return $this->playbookUrl;
  }
  /**
   * @param string
   */
  public function setThresholdType($thresholdType)
  {
    $this->thresholdType = $thresholdType;
  }
  /**
   * @return string
   */
  public function getThresholdType()
  {
    return $this->thresholdType;
  }
  /**
   * @param EnterpriseCrmEventbusProtoBaseAlertConfigThresholdValue
   */
  public function setThresholdValue(EnterpriseCrmEventbusProtoBaseAlertConfigThresholdValue $thresholdValue)
  {
    $this->thresholdValue = $thresholdValue;
  }
  /**
   * @return EnterpriseCrmEventbusProtoBaseAlertConfigThresholdValue
   */
  public function getThresholdValue()
  {
    return $this->thresholdValue;
  }
  /**
   * @param EnterpriseCrmEventbusProtoBaseAlertConfigErrorEnumList
   */
  public function setWarningEnumList(EnterpriseCrmEventbusProtoBaseAlertConfigErrorEnumList $warningEnumList)
  {
    $this->warningEnumList = $warningEnumList;
  }
  /**
   * @return EnterpriseCrmEventbusProtoBaseAlertConfigErrorEnumList
   */
  public function getWarningEnumList()
  {
    return $this->warningEnumList;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoTaskAlertConfig::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoTaskAlertConfig');
