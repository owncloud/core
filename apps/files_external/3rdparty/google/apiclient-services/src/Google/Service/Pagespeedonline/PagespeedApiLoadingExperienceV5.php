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

class Google_Service_Pagespeedonline_PagespeedApiLoadingExperienceV5 extends Google_Model
{
  protected $internal_gapi_mappings = array(
        "initialUrl" => "initial_url",
        "overallCategory" => "overall_category",
  );
  public $id;
  public $initialUrl;
  protected $metricsType = 'Google_Service_Pagespeedonline_PagespeedApiLoadingExperienceV5MetricsElement';
  protected $metricsDataType = 'map';
  public $overallCategory;

  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInitialUrl($initialUrl)
  {
    $this->initialUrl = $initialUrl;
  }
  public function getInitialUrl()
  {
    return $this->initialUrl;
  }
  /**
   * @param Google_Service_Pagespeedonline_PagespeedApiLoadingExperienceV5MetricsElement
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Google_Service_Pagespeedonline_PagespeedApiLoadingExperienceV5MetricsElement
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  public function setOverallCategory($overallCategory)
  {
    $this->overallCategory = $overallCategory;
  }
  public function getOverallCategory()
  {
    return $this->overallCategory;
  }
}
