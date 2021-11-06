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

namespace Google\Service\CloudAsset;

class IamPolicyAnalysisQuery extends \Google\Model
{
  protected $accessSelectorType = AccessSelector::class;
  protected $accessSelectorDataType = '';
  protected $conditionContextType = ConditionContext::class;
  protected $conditionContextDataType = '';
  protected $identitySelectorType = IdentitySelector::class;
  protected $identitySelectorDataType = '';
  protected $optionsType = Options::class;
  protected $optionsDataType = '';
  protected $resourceSelectorType = ResourceSelector::class;
  protected $resourceSelectorDataType = '';
  public $scope;

  /**
   * @param AccessSelector
   */
  public function setAccessSelector(AccessSelector $accessSelector)
  {
    $this->accessSelector = $accessSelector;
  }
  /**
   * @return AccessSelector
   */
  public function getAccessSelector()
  {
    return $this->accessSelector;
  }
  /**
   * @param ConditionContext
   */
  public function setConditionContext(ConditionContext $conditionContext)
  {
    $this->conditionContext = $conditionContext;
  }
  /**
   * @return ConditionContext
   */
  public function getConditionContext()
  {
    return $this->conditionContext;
  }
  /**
   * @param IdentitySelector
   */
  public function setIdentitySelector(IdentitySelector $identitySelector)
  {
    $this->identitySelector = $identitySelector;
  }
  /**
   * @return IdentitySelector
   */
  public function getIdentitySelector()
  {
    return $this->identitySelector;
  }
  /**
   * @param Options
   */
  public function setOptions(Options $options)
  {
    $this->options = $options;
  }
  /**
   * @return Options
   */
  public function getOptions()
  {
    return $this->options;
  }
  /**
   * @param ResourceSelector
   */
  public function setResourceSelector(ResourceSelector $resourceSelector)
  {
    $this->resourceSelector = $resourceSelector;
  }
  /**
   * @return ResourceSelector
   */
  public function getResourceSelector()
  {
    return $this->resourceSelector;
  }
  public function setScope($scope)
  {
    $this->scope = $scope;
  }
  public function getScope()
  {
    return $this->scope;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IamPolicyAnalysisQuery::class, 'Google_Service_CloudAsset_IamPolicyAnalysisQuery');
