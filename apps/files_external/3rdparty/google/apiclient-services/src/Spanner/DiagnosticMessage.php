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

namespace Google\Service\Spanner;

class DiagnosticMessage extends \Google\Model
{
  protected $infoType = LocalizedString::class;
  protected $infoDataType = '';
  protected $metricType = LocalizedString::class;
  protected $metricDataType = '';
  /**
   * @var bool
   */
  public $metricSpecific;
  /**
   * @var string
   */
  public $severity;
  protected $shortMessageType = LocalizedString::class;
  protected $shortMessageDataType = '';

  /**
   * @param LocalizedString
   */
  public function setInfo(LocalizedString $info)
  {
    $this->info = $info;
  }
  /**
   * @return LocalizedString
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param LocalizedString
   */
  public function setMetric(LocalizedString $metric)
  {
    $this->metric = $metric;
  }
  /**
   * @return LocalizedString
   */
  public function getMetric()
  {
    return $this->metric;
  }
  /**
   * @param bool
   */
  public function setMetricSpecific($metricSpecific)
  {
    $this->metricSpecific = $metricSpecific;
  }
  /**
   * @return bool
   */
  public function getMetricSpecific()
  {
    return $this->metricSpecific;
  }
  /**
   * @param string
   */
  public function setSeverity($severity)
  {
    $this->severity = $severity;
  }
  /**
   * @return string
   */
  public function getSeverity()
  {
    return $this->severity;
  }
  /**
   * @param LocalizedString
   */
  public function setShortMessage(LocalizedString $shortMessage)
  {
    $this->shortMessage = $shortMessage;
  }
  /**
   * @return LocalizedString
   */
  public function getShortMessage()
  {
    return $this->shortMessage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DiagnosticMessage::class, 'Google_Service_Spanner_DiagnosticMessage');
