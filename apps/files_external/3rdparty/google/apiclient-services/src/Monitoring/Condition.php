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

namespace Google\Service\Monitoring;

class Condition extends \Google\Model
{
  protected $conditionAbsentType = MetricAbsence::class;
  protected $conditionAbsentDataType = '';
  protected $conditionMatchedLogType = LogMatch::class;
  protected $conditionMatchedLogDataType = '';
  protected $conditionMonitoringQueryLanguageType = MonitoringQueryLanguageCondition::class;
  protected $conditionMonitoringQueryLanguageDataType = '';
  protected $conditionThresholdType = MetricThreshold::class;
  protected $conditionThresholdDataType = '';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $name;

  /**
   * @param MetricAbsence
   */
  public function setConditionAbsent(MetricAbsence $conditionAbsent)
  {
    $this->conditionAbsent = $conditionAbsent;
  }
  /**
   * @return MetricAbsence
   */
  public function getConditionAbsent()
  {
    return $this->conditionAbsent;
  }
  /**
   * @param LogMatch
   */
  public function setConditionMatchedLog(LogMatch $conditionMatchedLog)
  {
    $this->conditionMatchedLog = $conditionMatchedLog;
  }
  /**
   * @return LogMatch
   */
  public function getConditionMatchedLog()
  {
    return $this->conditionMatchedLog;
  }
  /**
   * @param MonitoringQueryLanguageCondition
   */
  public function setConditionMonitoringQueryLanguage(MonitoringQueryLanguageCondition $conditionMonitoringQueryLanguage)
  {
    $this->conditionMonitoringQueryLanguage = $conditionMonitoringQueryLanguage;
  }
  /**
   * @return MonitoringQueryLanguageCondition
   */
  public function getConditionMonitoringQueryLanguage()
  {
    return $this->conditionMonitoringQueryLanguage;
  }
  /**
   * @param MetricThreshold
   */
  public function setConditionThreshold(MetricThreshold $conditionThreshold)
  {
    $this->conditionThreshold = $conditionThreshold;
  }
  /**
   * @return MetricThreshold
   */
  public function getConditionThreshold()
  {
    return $this->conditionThreshold;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Condition::class, 'Google_Service_Monitoring_Condition');
