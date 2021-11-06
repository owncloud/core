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

namespace Google\Service\Dfareporting;

class ReportsConfiguration extends \Google\Model
{
  public $exposureToConversionEnabled;
  protected $lookbackConfigurationType = LookbackConfiguration::class;
  protected $lookbackConfigurationDataType = '';
  public $reportGenerationTimeZoneId;

  public function setExposureToConversionEnabled($exposureToConversionEnabled)
  {
    $this->exposureToConversionEnabled = $exposureToConversionEnabled;
  }
  public function getExposureToConversionEnabled()
  {
    return $this->exposureToConversionEnabled;
  }
  /**
   * @param LookbackConfiguration
   */
  public function setLookbackConfiguration(LookbackConfiguration $lookbackConfiguration)
  {
    $this->lookbackConfiguration = $lookbackConfiguration;
  }
  /**
   * @return LookbackConfiguration
   */
  public function getLookbackConfiguration()
  {
    return $this->lookbackConfiguration;
  }
  public function setReportGenerationTimeZoneId($reportGenerationTimeZoneId)
  {
    $this->reportGenerationTimeZoneId = $reportGenerationTimeZoneId;
  }
  public function getReportGenerationTimeZoneId()
  {
    return $this->reportGenerationTimeZoneId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportsConfiguration::class, 'Google_Service_Dfareporting_ReportsConfiguration');
