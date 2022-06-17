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

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaAttributionSettings extends \Google\Model
{
  /**
   * @var string
   */
  public $acquisitionConversionEventLookbackWindow;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $otherConversionEventLookbackWindow;
  /**
   * @var string
   */
  public $reportingAttributionModel;

  /**
   * @param string
   */
  public function setAcquisitionConversionEventLookbackWindow($acquisitionConversionEventLookbackWindow)
  {
    $this->acquisitionConversionEventLookbackWindow = $acquisitionConversionEventLookbackWindow;
  }
  /**
   * @return string
   */
  public function getAcquisitionConversionEventLookbackWindow()
  {
    return $this->acquisitionConversionEventLookbackWindow;
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
  /**
   * @param string
   */
  public function setOtherConversionEventLookbackWindow($otherConversionEventLookbackWindow)
  {
    $this->otherConversionEventLookbackWindow = $otherConversionEventLookbackWindow;
  }
  /**
   * @return string
   */
  public function getOtherConversionEventLookbackWindow()
  {
    return $this->otherConversionEventLookbackWindow;
  }
  /**
   * @param string
   */
  public function setReportingAttributionModel($reportingAttributionModel)
  {
    $this->reportingAttributionModel = $reportingAttributionModel;
  }
  /**
   * @return string
   */
  public function getReportingAttributionModel()
  {
    return $this->reportingAttributionModel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaAttributionSettings::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAttributionSettings');
