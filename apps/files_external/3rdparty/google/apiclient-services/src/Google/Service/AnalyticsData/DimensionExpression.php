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

class Google_Service_AnalyticsData_DimensionExpression extends Google_Model
{
  protected $concatenateType = 'Google_Service_AnalyticsData_ConcatenateExpression';
  protected $concatenateDataType = '';
  protected $lowerCaseType = 'Google_Service_AnalyticsData_CaseExpression';
  protected $lowerCaseDataType = '';
  protected $upperCaseType = 'Google_Service_AnalyticsData_CaseExpression';
  protected $upperCaseDataType = '';

  /**
   * @param Google_Service_AnalyticsData_ConcatenateExpression
   */
  public function setConcatenate(Google_Service_AnalyticsData_ConcatenateExpression $concatenate)
  {
    $this->concatenate = $concatenate;
  }
  /**
   * @return Google_Service_AnalyticsData_ConcatenateExpression
   */
  public function getConcatenate()
  {
    return $this->concatenate;
  }
  /**
   * @param Google_Service_AnalyticsData_CaseExpression
   */
  public function setLowerCase(Google_Service_AnalyticsData_CaseExpression $lowerCase)
  {
    $this->lowerCase = $lowerCase;
  }
  /**
   * @return Google_Service_AnalyticsData_CaseExpression
   */
  public function getLowerCase()
  {
    return $this->lowerCase;
  }
  /**
   * @param Google_Service_AnalyticsData_CaseExpression
   */
  public function setUpperCase(Google_Service_AnalyticsData_CaseExpression $upperCase)
  {
    $this->upperCase = $upperCase;
  }
  /**
   * @return Google_Service_AnalyticsData_CaseExpression
   */
  public function getUpperCase()
  {
    return $this->upperCase;
  }
}
