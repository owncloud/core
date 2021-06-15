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

class Google_Service_Spanner_DiagnosticMessage extends Google_Model
{
  protected $infoType = 'Google_Service_Spanner_LocalizedString';
  protected $infoDataType = '';
  protected $metricType = 'Google_Service_Spanner_LocalizedString';
  protected $metricDataType = '';
  public $metricSpecific;
  public $severity;
  protected $shortMessageType = 'Google_Service_Spanner_LocalizedString';
  protected $shortMessageDataType = '';

  /**
   * @param Google_Service_Spanner_LocalizedString
   */
  public function setInfo(Google_Service_Spanner_LocalizedString $info)
  {
    $this->info = $info;
  }
  /**
   * @return Google_Service_Spanner_LocalizedString
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param Google_Service_Spanner_LocalizedString
   */
  public function setMetric(Google_Service_Spanner_LocalizedString $metric)
  {
    $this->metric = $metric;
  }
  /**
   * @return Google_Service_Spanner_LocalizedString
   */
  public function getMetric()
  {
    return $this->metric;
  }
  public function setMetricSpecific($metricSpecific)
  {
    $this->metricSpecific = $metricSpecific;
  }
  public function getMetricSpecific()
  {
    return $this->metricSpecific;
  }
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  public function getSeverity()
  {
    return $this->severity;
  }
  /**
   * @param Google_Service_Spanner_LocalizedString
   */
  public function setShortMessage(Google_Service_Spanner_LocalizedString $shortMessage)
  {
    $this->shortMessage = $shortMessage;
  }
  /**
   * @return Google_Service_Spanner_LocalizedString
   */
  public function getShortMessage()
  {
    return $this->shortMessage;
  }
}
