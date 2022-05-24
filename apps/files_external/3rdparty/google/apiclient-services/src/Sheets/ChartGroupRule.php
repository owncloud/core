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

namespace Google\Service\Sheets;

class ChartGroupRule extends \Google\Model
{
  protected $dateTimeRuleType = ChartDateTimeRule::class;
  protected $dateTimeRuleDataType = '';
  protected $histogramRuleType = ChartHistogramRule::class;
  protected $histogramRuleDataType = '';

  /**
   * @param ChartDateTimeRule
   */
  public function setDateTimeRule(ChartDateTimeRule $dateTimeRule)
  {
    $this->dateTimeRule = $dateTimeRule;
  }
  /**
   * @return ChartDateTimeRule
   */
  public function getDateTimeRule()
  {
    return $this->dateTimeRule;
  }
  /**
   * @param ChartHistogramRule
   */
  public function setHistogramRule(ChartHistogramRule $histogramRule)
  {
    $this->histogramRule = $histogramRule;
  }
  /**
   * @return ChartHistogramRule
   */
  public function getHistogramRule()
  {
    return $this->histogramRule;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChartGroupRule::class, 'Google_Service_Sheets_ChartGroupRule');
