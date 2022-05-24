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

namespace Google\Service\AnalyticsData;

class FilterExpression extends \Google\Model
{
  protected $andGroupType = FilterExpressionList::class;
  protected $andGroupDataType = '';
  protected $filterType = Filter::class;
  protected $filterDataType = '';
  protected $notExpressionType = FilterExpression::class;
  protected $notExpressionDataType = '';
  protected $orGroupType = FilterExpressionList::class;
  protected $orGroupDataType = '';

  /**
   * @param FilterExpressionList
   */
  public function setAndGroup(FilterExpressionList $andGroup)
  {
    $this->andGroup = $andGroup;
  }
  /**
   * @return FilterExpressionList
   */
  public function getAndGroup()
  {
    return $this->andGroup;
  }
  /**
   * @param Filter
   */
  public function setFilter(Filter $filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return Filter
   */
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param FilterExpression
   */
  public function setNotExpression(FilterExpression $notExpression)
  {
    $this->notExpression = $notExpression;
  }
  /**
   * @return FilterExpression
   */
  public function getNotExpression()
  {
    return $this->notExpression;
  }
  /**
   * @param FilterExpressionList
   */
  public function setOrGroup(FilterExpressionList $orGroup)
  {
    $this->orGroup = $orGroup;
  }
  /**
   * @return FilterExpressionList
   */
  public function getOrGroup()
  {
    return $this->orGroup;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FilterExpression::class, 'Google_Service_AnalyticsData_FilterExpression');
