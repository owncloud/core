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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2alphaModelPageOptimizationConfig extends \Google\Collection
{
  protected $collection_key = 'panels';
  /**
   * @var string
   */
  public $pageOptimizationEventType;
  protected $panelsType = GoogleCloudRetailV2alphaModelPageOptimizationConfigPanel::class;
  protected $panelsDataType = 'array';
  /**
   * @var string
   */
  public $restriction;

  /**
   * @param string
   */
  public function setPageOptimizationEventType($pageOptimizationEventType)
  {
    $this->pageOptimizationEventType = $pageOptimizationEventType;
  }
  /**
   * @return string
   */
  public function getPageOptimizationEventType()
  {
    return $this->pageOptimizationEventType;
  }
  /**
   * @param GoogleCloudRetailV2alphaModelPageOptimizationConfigPanel[]
   */
  public function setPanels($panels)
  {
    $this->panels = $panels;
  }
  /**
   * @return GoogleCloudRetailV2alphaModelPageOptimizationConfigPanel[]
   */
  public function getPanels()
  {
    return $this->panels;
  }
  /**
   * @param string
   */
  public function setRestriction($restriction)
  {
    $this->restriction = $restriction;
  }
  /**
   * @return string
   */
  public function getRestriction()
  {
    return $this->restriction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2alphaModelPageOptimizationConfig::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2alphaModelPageOptimizationConfig');
