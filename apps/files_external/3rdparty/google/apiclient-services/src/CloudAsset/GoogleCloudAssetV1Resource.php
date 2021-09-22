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

class GoogleCloudAssetV1Resource extends \Google\Model
{
  protected $analysisStateType = IamPolicyAnalysisState::class;
  protected $analysisStateDataType = '';
  public $fullResourceName;

  /**
   * @param IamPolicyAnalysisState
   */
  public function setAnalysisState(IamPolicyAnalysisState $analysisState)
  {
    $this->analysisState = $analysisState;
  }
  /**
   * @return IamPolicyAnalysisState
   */
  public function getAnalysisState()
  {
    return $this->analysisState;
  }
  public function setFullResourceName($fullResourceName)
  {
    $this->fullResourceName = $fullResourceName;
  }
  public function getFullResourceName()
  {
    return $this->fullResourceName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudAssetV1Resource::class, 'Google_Service_CloudAsset_GoogleCloudAssetV1Resource');
