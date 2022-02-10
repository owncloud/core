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

namespace Google\Service\PagespeedInsights;

class PagespeedApiLoadingExperienceV5 extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "initialUrl" => "initial_url",
        "originFallback" => "origin_fallback",
        "overallCategory" => "overall_category",
  ];
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $initialUrl;
  protected $metricsType = UserPageLoadMetricV5::class;
  protected $metricsDataType = 'map';
  /**
   * @var bool
   */
  public $originFallback;
  /**
   * @var string
   */
  public $overallCategory;

  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setInitialUrl($initialUrl)
  {
    $this->initialUrl = $initialUrl;
  }
  /**
   * @return string
   */
  public function getInitialUrl()
  {
    return $this->initialUrl;
  }
  /**
   * @param UserPageLoadMetricV5[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return UserPageLoadMetricV5[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param bool
   */
  public function setOriginFallback($originFallback)
  {
    $this->originFallback = $originFallback;
  }
  /**
   * @return bool
   */
  public function getOriginFallback()
  {
    return $this->originFallback;
  }
  /**
   * @param string
   */
  public function setOverallCategory($overallCategory)
  {
    $this->overallCategory = $overallCategory;
  }
  /**
   * @return string
   */
  public function getOverallCategory()
  {
    return $this->overallCategory;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PagespeedApiLoadingExperienceV5::class, 'Google_Service_PagespeedInsights_PagespeedApiLoadingExperienceV5');
