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

namespace Google\Service\BusinessProfilePerformance;

class SearchKeywordCount extends \Google\Model
{
  protected $insightsValueType = InsightsValue::class;
  protected $insightsValueDataType = '';
  /**
   * @var string
   */
  public $searchKeyword;

  /**
   * @param InsightsValue
   */
  public function setInsightsValue(InsightsValue $insightsValue)
  {
    $this->insightsValue = $insightsValue;
  }
  /**
   * @return InsightsValue
   */
  public function getInsightsValue()
  {
    return $this->insightsValue;
  }
  /**
   * @param string
   */
  public function setSearchKeyword($searchKeyword)
  {
    $this->searchKeyword = $searchKeyword;
  }
  /**
   * @return string
   */
  public function getSearchKeyword()
  {
    return $this->searchKeyword;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchKeywordCount::class, 'Google_Service_BusinessProfilePerformance_SearchKeywordCount');
