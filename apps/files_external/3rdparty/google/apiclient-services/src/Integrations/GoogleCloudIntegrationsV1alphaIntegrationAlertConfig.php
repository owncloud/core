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

class GoogleCloudIntegrationsV1alphaIntegrationAlertConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $aggregationPeriod;
  /**
   * @var int
   */
  public $alertThreshold;
  /**
   * @var bool
   */
  public $disableAlert;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $durationThreshold;
  /**
   * @var string
   */
  public $metricType;
  /**
   * @var bool
   */
  public $onlyFinalAttempt;
  /**
   * @var string
   */
  public $thresholdType;
  protected $thresholdValueType = GoogleCloudIntegrationsV1alphaIntegrationAlertConfigThresholdValue::class;
  protected $thresholdValueDataType = '';

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
   * @param int
   */
  public function setAlertThreshold($alertThreshold)
  {
    $this->alertThreshold = $alertThreshold;
  }
  /**
   * @return int
   */
  public function getAlertThreshold()
  {
    return $this->alertThreshold;
  }
  /**
   * @param bool
   */
  public function setDisableAlert($disableAlert)
  {
    $this->disableAlert = $disableAlert;
  }
  /**
   * @return bool
   */
  public function getDisableAlert()
  {
    return $this->disableAlert;
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
  public function setDurationThreshold($durationThreshold)
  {
    $this->durationThreshold = $durationThreshold;
  }
  /**
   * @return string
   */
  public function getDurationThreshold()
  {
    return $this->durationThreshold;
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
   * @param GoogleCloudIntegrationsV1alphaIntegrationAlertConfigThresholdValue
   */
  public function setThresholdValue(GoogleCloudIntegrationsV1alphaIntegrationAlertConfigThresholdValue $thresholdValue)
  {
    $this->thresholdValue = $thresholdValue;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaIntegrationAlertConfigThresholdValue
   */
  public function getThresholdValue()
  {
    return $this->thresholdValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaIntegrationAlertConfig::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaIntegrationAlertConfig');
