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

class Google_Service_AlertCenter_GoogleAppsAlertcenterTypeRuleViolationInfoMatchInfo extends Google_Model
{
  protected $predefinedDetectorType = 'Google_Service_AlertCenter_GoogleAppsAlertcenterTypeRuleViolationInfoMatchInfoPredefinedDetectorInfo';
  protected $predefinedDetectorDataType = '';
  protected $userDefinedDetectorType = 'Google_Service_AlertCenter_GoogleAppsAlertcenterTypeRuleViolationInfoMatchInfoUserDefinedDetectorInfo';
  protected $userDefinedDetectorDataType = '';

  /**
   * @param Google_Service_AlertCenter_GoogleAppsAlertcenterTypeRuleViolationInfoMatchInfoPredefinedDetectorInfo
   */
  public function setPredefinedDetector(Google_Service_AlertCenter_GoogleAppsAlertcenterTypeRuleViolationInfoMatchInfoPredefinedDetectorInfo $predefinedDetector)
  {
    $this->predefinedDetector = $predefinedDetector;
  }
  /**
   * @return Google_Service_AlertCenter_GoogleAppsAlertcenterTypeRuleViolationInfoMatchInfoPredefinedDetectorInfo
   */
  public function getPredefinedDetector()
  {
    return $this->predefinedDetector;
  }
  /**
   * @param Google_Service_AlertCenter_GoogleAppsAlertcenterTypeRuleViolationInfoMatchInfoUserDefinedDetectorInfo
   */
  public function setUserDefinedDetector(Google_Service_AlertCenter_GoogleAppsAlertcenterTypeRuleViolationInfoMatchInfoUserDefinedDetectorInfo $userDefinedDetector)
  {
    $this->userDefinedDetector = $userDefinedDetector;
  }
  /**
   * @return Google_Service_AlertCenter_GoogleAppsAlertcenterTypeRuleViolationInfoMatchInfoUserDefinedDetectorInfo
   */
  public function getUserDefinedDetector()
  {
    return $this->userDefinedDetector;
  }
}
