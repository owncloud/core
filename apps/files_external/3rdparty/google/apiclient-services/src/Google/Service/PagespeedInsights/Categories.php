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

class Google_Service_PagespeedInsights_Categories extends Google_Model
{
  protected $internal_gapi_mappings = array(
        "bestPractices" => "best-practices",
  );
  protected $accessibilityType = 'Google_Service_PagespeedInsights_LighthouseCategoryV5';
  protected $accessibilityDataType = '';
  protected $bestPracticesType = 'Google_Service_PagespeedInsights_LighthouseCategoryV5';
  protected $bestPracticesDataType = '';
  protected $performanceType = 'Google_Service_PagespeedInsights_LighthouseCategoryV5';
  protected $performanceDataType = '';
  protected $pwaType = 'Google_Service_PagespeedInsights_LighthouseCategoryV5';
  protected $pwaDataType = '';
  protected $seoType = 'Google_Service_PagespeedInsights_LighthouseCategoryV5';
  protected $seoDataType = '';

  /**
   * @param Google_Service_PagespeedInsights_LighthouseCategoryV5
   */
  public function setAccessibility(Google_Service_PagespeedInsights_LighthouseCategoryV5 $accessibility)
  {
    $this->accessibility = $accessibility;
  }
  /**
   * @return Google_Service_PagespeedInsights_LighthouseCategoryV5
   */
  public function getAccessibility()
  {
    return $this->accessibility;
  }
  /**
   * @param Google_Service_PagespeedInsights_LighthouseCategoryV5
   */
  public function setBestPractices(Google_Service_PagespeedInsights_LighthouseCategoryV5 $bestPractices)
  {
    $this->bestPractices = $bestPractices;
  }
  /**
   * @return Google_Service_PagespeedInsights_LighthouseCategoryV5
   */
  public function getBestPractices()
  {
    return $this->bestPractices;
  }
  /**
   * @param Google_Service_PagespeedInsights_LighthouseCategoryV5
   */
  public function setPerformance(Google_Service_PagespeedInsights_LighthouseCategoryV5 $performance)
  {
    $this->performance = $performance;
  }
  /**
   * @return Google_Service_PagespeedInsights_LighthouseCategoryV5
   */
  public function getPerformance()
  {
    return $this->performance;
  }
  /**
   * @param Google_Service_PagespeedInsights_LighthouseCategoryV5
   */
  public function setPwa(Google_Service_PagespeedInsights_LighthouseCategoryV5 $pwa)
  {
    $this->pwa = $pwa;
  }
  /**
   * @return Google_Service_PagespeedInsights_LighthouseCategoryV5
   */
  public function getPwa()
  {
    return $this->pwa;
  }
  /**
   * @param Google_Service_PagespeedInsights_LighthouseCategoryV5
   */
  public function setSeo(Google_Service_PagespeedInsights_LighthouseCategoryV5 $seo)
  {
    $this->seo = $seo;
  }
  /**
   * @return Google_Service_PagespeedInsights_LighthouseCategoryV5
   */
  public function getSeo()
  {
    return $this->seo;
  }
}
