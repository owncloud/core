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

class GoogleCloudRetailV2ServingConfig extends \Google\Collection
{
  protected $collection_key = 'twowaySynonymsControlIds';
  /**
   * @var string[]
   */
  public $boostControlIds;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $diversityLevel;
  /**
   * @var string
   */
  public $diversityType;
  /**
   * @var string[]
   */
  public $doNotAssociateControlIds;
  protected $dynamicFacetSpecType = GoogleCloudRetailV2SearchRequestDynamicFacetSpec::class;
  protected $dynamicFacetSpecDataType = '';
  /**
   * @var string
   */
  public $enableCategoryFilterLevel;
  /**
   * @var string[]
   */
  public $facetControlIds;
  /**
   * @var string[]
   */
  public $filterControlIds;
  /**
   * @var string[]
   */
  public $ignoreControlIds;
  /**
   * @var string
   */
  public $modelId;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $onewaySynonymsControlIds;
  protected $personalizationSpecType = GoogleCloudRetailV2SearchRequestPersonalizationSpec::class;
  protected $personalizationSpecDataType = '';
  /**
   * @var string
   */
  public $priceRerankingLevel;
  /**
   * @var string[]
   */
  public $redirectControlIds;
  /**
   * @var string[]
   */
  public $replacementControlIds;
  /**
   * @var string[]
   */
  public $solutionTypes;
  /**
   * @var string[]
   */
  public $twowaySynonymsControlIds;

  /**
   * @param string[]
   */
  public function setBoostControlIds($boostControlIds)
  {
    $this->boostControlIds = $boostControlIds;
  }
  /**
   * @return string[]
   */
  public function getBoostControlIds()
  {
    return $this->boostControlIds;
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
  public function setDiversityLevel($diversityLevel)
  {
    $this->diversityLevel = $diversityLevel;
  }
  /**
   * @return string
   */
  public function getDiversityLevel()
  {
    return $this->diversityLevel;
  }
  /**
   * @param string
   */
  public function setDiversityType($diversityType)
  {
    $this->diversityType = $diversityType;
  }
  /**
   * @return string
   */
  public function getDiversityType()
  {
    return $this->diversityType;
  }
  /**
   * @param string[]
   */
  public function setDoNotAssociateControlIds($doNotAssociateControlIds)
  {
    $this->doNotAssociateControlIds = $doNotAssociateControlIds;
  }
  /**
   * @return string[]
   */
  public function getDoNotAssociateControlIds()
  {
    return $this->doNotAssociateControlIds;
  }
  /**
   * @param GoogleCloudRetailV2SearchRequestDynamicFacetSpec
   */
  public function setDynamicFacetSpec(GoogleCloudRetailV2SearchRequestDynamicFacetSpec $dynamicFacetSpec)
  {
    $this->dynamicFacetSpec = $dynamicFacetSpec;
  }
  /**
   * @return GoogleCloudRetailV2SearchRequestDynamicFacetSpec
   */
  public function getDynamicFacetSpec()
  {
    return $this->dynamicFacetSpec;
  }
  /**
   * @param string
   */
  public function setEnableCategoryFilterLevel($enableCategoryFilterLevel)
  {
    $this->enableCategoryFilterLevel = $enableCategoryFilterLevel;
  }
  /**
   * @return string
   */
  public function getEnableCategoryFilterLevel()
  {
    return $this->enableCategoryFilterLevel;
  }
  /**
   * @param string[]
   */
  public function setFacetControlIds($facetControlIds)
  {
    $this->facetControlIds = $facetControlIds;
  }
  /**
   * @return string[]
   */
  public function getFacetControlIds()
  {
    return $this->facetControlIds;
  }
  /**
   * @param string[]
   */
  public function setFilterControlIds($filterControlIds)
  {
    $this->filterControlIds = $filterControlIds;
  }
  /**
   * @return string[]
   */
  public function getFilterControlIds()
  {
    return $this->filterControlIds;
  }
  /**
   * @param string[]
   */
  public function setIgnoreControlIds($ignoreControlIds)
  {
    $this->ignoreControlIds = $ignoreControlIds;
  }
  /**
   * @return string[]
   */
  public function getIgnoreControlIds()
  {
    return $this->ignoreControlIds;
  }
  /**
   * @param string
   */
  public function setModelId($modelId)
  {
    $this->modelId = $modelId;
  }
  /**
   * @return string
   */
  public function getModelId()
  {
    return $this->modelId;
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
   * @param string[]
   */
  public function setOnewaySynonymsControlIds($onewaySynonymsControlIds)
  {
    $this->onewaySynonymsControlIds = $onewaySynonymsControlIds;
  }
  /**
   * @return string[]
   */
  public function getOnewaySynonymsControlIds()
  {
    return $this->onewaySynonymsControlIds;
  }
  /**
   * @param GoogleCloudRetailV2SearchRequestPersonalizationSpec
   */
  public function setPersonalizationSpec(GoogleCloudRetailV2SearchRequestPersonalizationSpec $personalizationSpec)
  {
    $this->personalizationSpec = $personalizationSpec;
  }
  /**
   * @return GoogleCloudRetailV2SearchRequestPersonalizationSpec
   */
  public function getPersonalizationSpec()
  {
    return $this->personalizationSpec;
  }
  /**
   * @param string
   */
  public function setPriceRerankingLevel($priceRerankingLevel)
  {
    $this->priceRerankingLevel = $priceRerankingLevel;
  }
  /**
   * @return string
   */
  public function getPriceRerankingLevel()
  {
    return $this->priceRerankingLevel;
  }
  /**
   * @param string[]
   */
  public function setRedirectControlIds($redirectControlIds)
  {
    $this->redirectControlIds = $redirectControlIds;
  }
  /**
   * @return string[]
   */
  public function getRedirectControlIds()
  {
    return $this->redirectControlIds;
  }
  /**
   * @param string[]
   */
  public function setReplacementControlIds($replacementControlIds)
  {
    $this->replacementControlIds = $replacementControlIds;
  }
  /**
   * @return string[]
   */
  public function getReplacementControlIds()
  {
    return $this->replacementControlIds;
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
  /**
   * @param string[]
   */
  public function setTwowaySynonymsControlIds($twowaySynonymsControlIds)
  {
    $this->twowaySynonymsControlIds = $twowaySynonymsControlIds;
  }
  /**
   * @return string[]
   */
  public function getTwowaySynonymsControlIds()
  {
    return $this->twowaySynonymsControlIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2ServingConfig::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2ServingConfig');
