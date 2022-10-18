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

class GoogleAnalyticsAdminV1alphaExpandedDataSet extends \Google\Collection
{
  protected $collection_key = 'metricNames';
  /**
   * @var string
   */
  public $dataCollectionStartTime;
  /**
   * @var string
   */
  public $description;
  protected $dimensionFilterExpressionType = GoogleAnalyticsAdminV1alphaExpandedDataSetFilterExpression::class;
  protected $dimensionFilterExpressionDataType = '';
  /**
   * @var string[]
   */
  public $dimensionNames;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $metricNames;
  /**
   * @var string
   */
  public $name;

  /**
   * @param string
   */
  public function setDataCollectionStartTime($dataCollectionStartTime)
  {
    $this->dataCollectionStartTime = $dataCollectionStartTime;
  }
  /**
   * @return string
   */
  public function getDataCollectionStartTime()
  {
    return $this->dataCollectionStartTime;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param GoogleAnalyticsAdminV1alphaExpandedDataSetFilterExpression
   */
  public function setDimensionFilterExpression(GoogleAnalyticsAdminV1alphaExpandedDataSetFilterExpression $dimensionFilterExpression)
  {
    $this->dimensionFilterExpression = $dimensionFilterExpression;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaExpandedDataSetFilterExpression
   */
  public function getDimensionFilterExpression()
  {
    return $this->dimensionFilterExpression;
  }
  /**
   * @param string[]
   */
  public function setDimensionNames($dimensionNames)
  {
    $this->dimensionNames = $dimensionNames;
  }
  /**
   * @return string[]
   */
  public function getDimensionNames()
  {
    return $this->dimensionNames;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string[]
   */
  public function setMetricNames($metricNames)
  {
    $this->metricNames = $metricNames;
  }
  /**
   * @return string[]
   */
  public function getMetricNames()
  {
    return $this->metricNames;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaExpandedDataSet::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaExpandedDataSet');
