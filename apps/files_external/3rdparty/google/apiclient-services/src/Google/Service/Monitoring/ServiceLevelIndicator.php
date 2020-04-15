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

class Google_Service_Monitoring_ServiceLevelIndicator extends Google_Model
{
  protected $basicSliType = 'Google_Service_Monitoring_BasicSli';
  protected $basicSliDataType = '';
  protected $requestBasedType = 'Google_Service_Monitoring_RequestBasedSli';
  protected $requestBasedDataType = '';
  protected $windowsBasedType = 'Google_Service_Monitoring_WindowsBasedSli';
  protected $windowsBasedDataType = '';

  /**
   * @param Google_Service_Monitoring_BasicSli
   */
  public function setBasicSli(Google_Service_Monitoring_BasicSli $basicSli)
  {
    $this->basicSli = $basicSli;
  }
  /**
   * @return Google_Service_Monitoring_BasicSli
   */
  public function getBasicSli()
  {
    return $this->basicSli;
  }
  /**
   * @param Google_Service_Monitoring_RequestBasedSli
   */
  public function setRequestBased(Google_Service_Monitoring_RequestBasedSli $requestBased)
  {
    $this->requestBased = $requestBased;
  }
  /**
   * @return Google_Service_Monitoring_RequestBasedSli
   */
  public function getRequestBased()
  {
    return $this->requestBased;
  }
  /**
   * @param Google_Service_Monitoring_WindowsBasedSli
   */
  public function setWindowsBased(Google_Service_Monitoring_WindowsBasedSli $windowsBased)
  {
    $this->windowsBased = $windowsBased;
  }
  /**
   * @return Google_Service_Monitoring_WindowsBasedSli
   */
  public function getWindowsBased()
  {
    return $this->windowsBased;
  }
}
