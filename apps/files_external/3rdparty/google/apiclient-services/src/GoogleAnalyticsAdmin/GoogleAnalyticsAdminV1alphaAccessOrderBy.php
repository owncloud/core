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

class GoogleAnalyticsAdminV1alphaAccessOrderBy extends \Google\Model
{
  /**
   * @var bool
   */
  public $desc;
  protected $dimensionType = GoogleAnalyticsAdminV1alphaAccessOrderByDimensionOrderBy::class;
  protected $dimensionDataType = '';
  protected $metricType = GoogleAnalyticsAdminV1alphaAccessOrderByMetricOrderBy::class;
  protected $metricDataType = '';

  /**
   * @param bool
   */
  public function setDesc($desc)
  {
    $this->desc = $desc;
  }
  /**
   * @return bool
   */
  public function getDesc()
  {
    return $this->desc;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaAccessOrderByDimensionOrderBy
   */
  public function setDimension(GoogleAnalyticsAdminV1alphaAccessOrderByDimensionOrderBy $dimension)
  {
    $this->dimension = $dimension;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAccessOrderByDimensionOrderBy
   */
  public function getDimension()
  {
    return $this->dimension;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaAccessOrderByMetricOrderBy
   */
  public function setMetric(GoogleAnalyticsAdminV1alphaAccessOrderByMetricOrderBy $metric)
  {
    $this->metric = $metric;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaAccessOrderByMetricOrderBy
   */
  public function getMetric()
  {
    return $this->metric;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaAccessOrderBy::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaAccessOrderBy');
