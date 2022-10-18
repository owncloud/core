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

class GoogleCloudRetailV2Control extends \Google\Collection
{
  protected $collection_key = 'solutionTypes';
  /**
   * @var string[]
   */
  public $associatedServingConfigIds;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $name;
  protected $ruleType = GoogleCloudRetailV2Rule::class;
  protected $ruleDataType = '';
  /**
   * @var string[]
   */
  public $searchSolutionUseCase;
  /**
   * @var string[]
   */
  public $solutionTypes;

  /**
   * @param string[]
   */
  public function setAssociatedServingConfigIds($associatedServingConfigIds)
  {
    $this->associatedServingConfigIds = $associatedServingConfigIds;
  }
  /**
   * @return string[]
   */
  public function getAssociatedServingConfigIds()
  {
    return $this->associatedServingConfigIds;
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
  /**
   * @param GoogleCloudRetailV2Rule
   */
  public function setRule(GoogleCloudRetailV2Rule $rule)
  {
    $this->rule = $rule;
  }
  /**
   * @return GoogleCloudRetailV2Rule
   */
  public function getRule()
  {
    return $this->rule;
  }
  /**
   * @param string[]
   */
  public function setSearchSolutionUseCase($searchSolutionUseCase)
  {
    $this->searchSolutionUseCase = $searchSolutionUseCase;
  }
  /**
   * @return string[]
   */
  public function getSearchSolutionUseCase()
  {
    return $this->searchSolutionUseCase;
  }
  /**
   * @param string[]
   */
  public function setSolutionTypes($solutionTypes)
  {
    $this->solutionTypes = $solutionTypes;
  }
  /**
   * @return string[]
   */
  public function getSolutionTypes()
  {
    return $this->solutionTypes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2Control::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2Control');
