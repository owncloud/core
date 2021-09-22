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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2TimespanConfig extends \Google\Model
{
  public $enableAutoPopulationOfTimespanConfig;
  public $endTime;
  public $startTime;
  protected $timestampFieldType = GooglePrivacyDlpV2FieldId::class;
  protected $timestampFieldDataType = '';

  public function setEnableAutoPopulationOfTimespanConfig($enableAutoPopulationOfTimespanConfig)
  {
    $this->enableAutoPopulationOfTimespanConfig = $enableAutoPopulationOfTimespanConfig;
  }
  public function getEnableAutoPopulationOfTimespanConfig()
  {
    return $this->enableAutoPopulationOfTimespanConfig;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
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
   * @param GooglePrivacyDlpV2FieldId
   */
  public function setTimestampField(GooglePrivacyDlpV2FieldId $timestampField)
  {
    $this->timestampField = $timestampField;
  }
  /**
   * @return GooglePrivacyDlpV2FieldId
   */
  public function getTimestampField()
  {
    return $this->timestampField;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2TimespanConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2TimespanConfig');
