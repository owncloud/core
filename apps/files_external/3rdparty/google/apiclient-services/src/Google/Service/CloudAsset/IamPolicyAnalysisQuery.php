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

class Google_Service_CloudAsset_IamPolicyAnalysisQuery extends Google_Model
{
  protected $accessSelectorType = 'Google_Service_CloudAsset_AccessSelector';
  protected $accessSelectorDataType = '';
  protected $identitySelectorType = 'Google_Service_CloudAsset_IdentitySelector';
  protected $identitySelectorDataType = '';
  protected $optionsType = 'Google_Service_CloudAsset_Options';
  protected $optionsDataType = '';
  protected $resourceSelectorType = 'Google_Service_CloudAsset_ResourceSelector';
  protected $resourceSelectorDataType = '';
  public $scope;

  /**
   * @param Google_Service_CloudAsset_AccessSelector
   */
  public function setAccessSelector(Google_Service_CloudAsset_AccessSelector $accessSelector)
  {
    $this->accessSelector = $accessSelector;
  }
  /**
   * @return Google_Service_CloudAsset_AccessSelector
   */
  public function getAccessSelector()
  {
    return $this->accessSelector;
  }
  /**
   * @param Google_Service_CloudAsset_IdentitySelector
   */
  public function setIdentitySelector(Google_Service_CloudAsset_IdentitySelector $identitySelector)
  {
    $this->identitySelector = $identitySelector;
  }
  /**
   * @return Google_Service_CloudAsset_IdentitySelector
   */
  public function getIdentitySelector()
  {
    return $this->identitySelector;
  }
  /**
   * @param Google_Service_CloudAsset_Options
   */
  public function setOptions(Google_Service_CloudAsset_Options $options)
  {
    $this->options = $options;
  }
  /**
   * @return Google_Service_CloudAsset_Options
   */
  public function getOptions()
  {
    return $this->options;
  }
  /**
   * @param Google_Service_CloudAsset_ResourceSelector
   */
  public function setResourceSelector(Google_Service_CloudAsset_ResourceSelector $resourceSelector)
  {
    $this->resourceSelector = $resourceSelector;
  }
  /**
   * @return Google_Service_CloudAsset_ResourceSelector
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
