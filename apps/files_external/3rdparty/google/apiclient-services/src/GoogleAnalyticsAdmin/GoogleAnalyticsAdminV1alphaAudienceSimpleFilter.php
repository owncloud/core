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

class GoogleAnalyticsAdminV1alphaAudienceSimpleFilter extends \Google\Model
{
  protected $filterExpressionType = GoogleAnalyticsAdminV1alphaAudienceFilterExpression::class;
  protected $filterExpressionDataType = '';
  /**
   * @var string
   */
  public $scope;

  /**
   * @param GoogleAnalyticsAdminV1alphaAudienceFilterExpression
   */
  public function setFilterExpression(GoogleAnalyticsAdminV1alphaAudienceFilterExpression $filterExpression)
  {
    $this->filterExpression = $filterExpression;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAudienceFilterExpression
   */
  public function getFilterExpression()
  {
    return $this->filterExpression;
  }
  /**
   * @param string
   */
  public function setScope($scope)
  {
    $this->scope = $scope;
  }
  /**
   * @return string
   */
  public function getScope()
  {
    return $this->scope;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaAudienceSimpleFilter::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAudienceSimpleFilter');
