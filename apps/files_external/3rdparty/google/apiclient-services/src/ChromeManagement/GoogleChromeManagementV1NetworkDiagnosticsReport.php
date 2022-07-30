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

namespace Google\Service\ChromeManagement;

class GoogleChromeManagementV1NetworkDiagnosticsReport extends \Google\Model
{
  protected $httpsLatencyDataType = GoogleChromeManagementV1HttpsLatencyRoutineData::class;
  protected $httpsLatencyDataDataType = '';
  /**
   * @var string
   */
  public $reportTime;

  /**
   * @param GoogleChromeManagementV1HttpsLatencyRoutineData
   */
  public function setHttpsLatencyData(GoogleChromeManagementV1HttpsLatencyRoutineData $httpsLatencyData)
  {
    $this->httpsLatencyData = $httpsLatencyData;
  }
  /**
   * @return GoogleChromeManagementV1HttpsLatencyRoutineData
   */
  public function getHttpsLatencyData()
  {
    return $this->httpsLatencyData;
  }
  /**
   * @param string
   */
  public function setReportTime($reportTime)
  {
    $this->reportTime = $reportTime;
  }
  /**
   * @return string
   */
  public function getReportTime()
  {
    return $this->reportTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1NetworkDiagnosticsReport::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1NetworkDiagnosticsReport');
