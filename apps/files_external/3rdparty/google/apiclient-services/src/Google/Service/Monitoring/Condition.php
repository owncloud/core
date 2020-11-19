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

class Google_Service_Monitoring_Condition extends Google_Model
{
  protected $conditionAbsentType = 'Google_Service_Monitoring_MetricAbsence';
  protected $conditionAbsentDataType = '';
  protected $conditionMonitoringQueryLanguageType = 'Google_Service_Monitoring_MonitoringQueryLanguageCondition';
  protected $conditionMonitoringQueryLanguageDataType = '';
  protected $conditionThresholdType = 'Google_Service_Monitoring_MetricThreshold';
  protected $conditionThresholdDataType = '';
  public $displayName;
  public $name;

  /**
   * @param Google_Service_Monitoring_MetricAbsence
   */
  public function setConditionAbsent(Google_Service_Monitoring_MetricAbsence $conditionAbsent)
  {
    $this->conditionAbsent = $conditionAbsent;
  }
  /**
   * @return Google_Service_Monitoring_MetricAbsence
   */
  public function getConditionAbsent()
  {
    return $this->conditionAbsent;
  }
  /**
   * @param Google_Service_Monitoring_MonitoringQueryLanguageCondition
   */
  public function setConditionMonitoringQueryLanguage(Google_Service_Monitoring_MonitoringQueryLanguageCondition $conditionMonitoringQueryLanguage)
  {
    $this->conditionMonitoringQueryLanguage = $conditionMonitoringQueryLanguage;
  }
  /**
   * @return Google_Service_Monitoring_MonitoringQueryLanguageCondition
   */
  public function getConditionMonitoringQueryLanguage()
  {
    return $this->conditionMonitoringQueryLanguage;
  }
  /**
   * @param Google_Service_Monitoring_MetricThreshold
   */
  public function setConditionThreshold(Google_Service_Monitoring_MetricThreshold $conditionThreshold)
  {
    $this->conditionThreshold = $conditionThreshold;
  }
  /**
   * @return Google_Service_Monitoring_MetricThreshold
   */
  public function getConditionThreshold()
  {
    return $this->conditionThreshold;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
