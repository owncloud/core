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

class Google_Service_Sheets_ChartGroupRule extends Google_Model
{
  protected $dateTimeRuleType = 'Google_Service_Sheets_ChartDateTimeRule';
  protected $dateTimeRuleDataType = '';
  protected $histogramRuleType = 'Google_Service_Sheets_ChartHistogramRule';
  protected $histogramRuleDataType = '';

  /**
   * @param Google_Service_Sheets_ChartDateTimeRule
   */
  public function setDateTimeRule(Google_Service_Sheets_ChartDateTimeRule $dateTimeRule)
  {
    $this->dateTimeRule = $dateTimeRule;
  }
  /**
   * @return Google_Service_Sheets_ChartDateTimeRule
   */
  public function getDateTimeRule()
  {
    return $this->dateTimeRule;
  }
  /**
   * @param Google_Service_Sheets_ChartHistogramRule
   */
  public function setHistogramRule(Google_Service_Sheets_ChartHistogramRule $histogramRule)
  {
    $this->histogramRule = $histogramRule;
  }
  /**
   * @return Google_Service_Sheets_ChartHistogramRule
   */
  public function getHistogramRule()
  {
    return $this->histogramRule;
  }
}
