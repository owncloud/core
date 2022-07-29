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

class GoogleCloudRetailV2alphaModelPageOptimizationConfigPanel extends \Google\Collection
{
  protected $collection_key = 'candidates';
  protected $candidatesType = GoogleCloudRetailV2alphaModelPageOptimizationConfigCandidate::class;
  protected $candidatesDataType = 'array';
  protected $defaultCandidateType = GoogleCloudRetailV2alphaModelPageOptimizationConfigCandidate::class;
  protected $defaultCandidateDataType = '';
  /**
   * @var string
   */
  public $displayName;

  /**
   * @param GoogleCloudRetailV2alphaModelPageOptimizationConfigCandidate[]
   */
  public function setCandidates($candidates)
  {
    $this->candidates = $candidates;
  }
  /**
   * @return GoogleCloudRetailV2alphaModelPageOptimizationConfigCandidate[]
   */
  public function getCandidates()
  {
    return $this->candidates;
  }
  /**
   * @param GoogleCloudRetailV2alphaModelPageOptimizationConfigCandidate
   */
  public function setDefaultCandidate(GoogleCloudRetailV2alphaModelPageOptimizationConfigCandidate $defaultCandidate)
  {
    $this->defaultCandidate = $defaultCandidate;
  }
  /**
   * @return GoogleCloudRetailV2alphaModelPageOptimizationConfigCandidate
   */
  public function getDefaultCandidate()
  {
    return $this->defaultCandidate;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2alphaModelPageOptimizationConfigPanel::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2alphaModelPageOptimizationConfigPanel');
