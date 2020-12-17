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

class Google_Service_CloudAsset_AnalyzeIamPolicyResponse extends Google_Collection
{
  protected $collection_key = 'serviceAccountImpersonationAnalysis';
  public $fullyExplored;
  protected $mainAnalysisType = 'Google_Service_CloudAsset_IamPolicyAnalysis';
  protected $mainAnalysisDataType = '';
  protected $serviceAccountImpersonationAnalysisType = 'Google_Service_CloudAsset_IamPolicyAnalysis';
  protected $serviceAccountImpersonationAnalysisDataType = 'array';

  public function setFullyExplored($fullyExplored)
  {
    $this->fullyExplored = $fullyExplored;
  }
  public function getFullyExplored()
  {
    return $this->fullyExplored;
  }
  /**
   * @param Google_Service_CloudAsset_IamPolicyAnalysis
   */
  public function setMainAnalysis(Google_Service_CloudAsset_IamPolicyAnalysis $mainAnalysis)
  {
    $this->mainAnalysis = $mainAnalysis;
  }
  /**
   * @return Google_Service_CloudAsset_IamPolicyAnalysis
   */
  public function getMainAnalysis()
  {
    return $this->mainAnalysis;
  }
  /**
   * @param Google_Service_CloudAsset_IamPolicyAnalysis[]
   */
  public function setServiceAccountImpersonationAnalysis($serviceAccountImpersonationAnalysis)
  {
    $this->serviceAccountImpersonationAnalysis = $serviceAccountImpersonationAnalysis;
  }
  /**
   * @return Google_Service_CloudAsset_IamPolicyAnalysis[]
   */
  public function getServiceAccountImpersonationAnalysis()
  {
    return $this->serviceAccountImpersonationAnalysis;
  }
}
