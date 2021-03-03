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

class Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ExplainedPolicy extends Google_Collection
{
  protected $collection_key = 'bindingExplanations';
  public $access;
  protected $bindingExplanationsType = 'Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1BindingExplanation';
  protected $bindingExplanationsDataType = 'array';
  public $fullResourceName;
  protected $policyType = 'Google_Service_PolicySimulator_GoogleIamV1Policy';
  protected $policyDataType = '';
  public $relevance;

  public function setAccess($access)
  {
    $this->access = $access;
  }
  public function getAccess()
  {
    return $this->access;
  }
  /**
   * @param Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1BindingExplanation[]
   */
  public function setBindingExplanations($bindingExplanations)
  {
    $this->bindingExplanations = $bindingExplanations;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1BindingExplanation[]
   */
  public function getBindingExplanations()
  {
    return $this->bindingExplanations;
  }
  public function setFullResourceName($fullResourceName)
  {
    $this->fullResourceName = $fullResourceName;
  }
  public function getFullResourceName()
  {
    return $this->fullResourceName;
  }
  /**
   * @param Google_Service_PolicySimulator_GoogleIamV1Policy
   */
  public function setPolicy(Google_Service_PolicySimulator_GoogleIamV1Policy $policy)
  {
    $this->policy = $policy;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleIamV1Policy
   */
  public function getPolicy()
  {
    return $this->policy;
  }
  public function setRelevance($relevance)
  {
    $this->relevance = $relevance;
  }
  public function getRelevance()
  {
    return $this->relevance;
  }
}
