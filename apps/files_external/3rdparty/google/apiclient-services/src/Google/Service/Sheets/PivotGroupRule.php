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

class Google_Service_Sheets_PivotGroupRule extends Google_Model
{
  protected $dateTimeRuleType = 'Google_Service_Sheets_DateTimeRule';
  protected $dateTimeRuleDataType = '';
  protected $histogramRuleType = 'Google_Service_Sheets_HistogramRule';
  protected $histogramRuleDataType = '';
  protected $manualRuleType = 'Google_Service_Sheets_ManualRule';
  protected $manualRuleDataType = '';

  /**
   * @param Google_Service_Sheets_DateTimeRule
   */
  public function setDateTimeRule(Google_Service_Sheets_DateTimeRule $dateTimeRule)
  {
    $this->dateTimeRule = $dateTimeRule;
  }
  /**
   * @return Google_Service_Sheets_DateTimeRule
   */
  public function getDateTimeRule()
  {
    return $this->dateTimeRule;
  }
  /**
   * @param Google_Service_Sheets_HistogramRule
   */
  public function setHistogramRule(Google_Service_Sheets_HistogramRule $histogramRule)
  {
    $this->histogramRule = $histogramRule;
  }
  /**
   * @return Google_Service_Sheets_HistogramRule
   */
  public function getHistogramRule()
  {
    return $this->histogramRule;
  }
  /**
   * @param Google_Service_Sheets_ManualRule
   */
  public function setManualRule(Google_Service_Sheets_ManualRule $manualRule)
  {
    $this->manualRule = $manualRule;
  }
  /**
   * @return Google_Service_Sheets_ManualRule
   */
  public function getManualRule()
  {
    return $this->manualRule;
  }
}
