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

class Google_Service_BinaryAuthorization_Policy extends Google_Collection
{
  protected $collection_key = 'admissionWhitelistPatterns';
  protected $admissionWhitelistPatternsType = 'Google_Service_BinaryAuthorization_AdmissionWhitelistPattern';
  protected $admissionWhitelistPatternsDataType = 'array';
  protected $clusterAdmissionRulesType = 'Google_Service_BinaryAuthorization_AdmissionRule';
  protected $clusterAdmissionRulesDataType = 'map';
  protected $defaultAdmissionRuleType = 'Google_Service_BinaryAuthorization_AdmissionRule';
  protected $defaultAdmissionRuleDataType = '';
  public $description;
  public $globalPolicyEvaluationMode;
  protected $istioServiceIdentityAdmissionRulesType = 'Google_Service_BinaryAuthorization_AdmissionRule';
  protected $istioServiceIdentityAdmissionRulesDataType = 'map';
  protected $kubernetesNamespaceAdmissionRulesType = 'Google_Service_BinaryAuthorization_AdmissionRule';
  protected $kubernetesNamespaceAdmissionRulesDataType = 'map';
  protected $kubernetesServiceAccountAdmissionRulesType = 'Google_Service_BinaryAuthorization_AdmissionRule';
  protected $kubernetesServiceAccountAdmissionRulesDataType = 'map';
  public $name;
  public $updateTime;

  /**
   * @param Google_Service_BinaryAuthorization_AdmissionWhitelistPattern[]
   */
  public function setAdmissionWhitelistPatterns($admissionWhitelistPatterns)
  {
    $this->admissionWhitelistPatterns = $admissionWhitelistPatterns;
  }
  /**
   * @return Google_Service_BinaryAuthorization_AdmissionWhitelistPattern[]
   */
  public function getAdmissionWhitelistPatterns()
  {
    return $this->admissionWhitelistPatterns;
  }
  /**
   * @param Google_Service_BinaryAuthorization_AdmissionRule[]
   */
  public function setClusterAdmissionRules($clusterAdmissionRules)
  {
    $this->clusterAdmissionRules = $clusterAdmissionRules;
  }
  /**
   * @return Google_Service_BinaryAuthorization_AdmissionRule[]
   */
  public function getClusterAdmissionRules()
  {
    return $this->clusterAdmissionRules;
  }
  /**
   * @param Google_Service_BinaryAuthorization_AdmissionRule
   */
  public function setDefaultAdmissionRule(Google_Service_BinaryAuthorization_AdmissionRule $defaultAdmissionRule)
  {
    $this->defaultAdmissionRule = $defaultAdmissionRule;
  }
  /**
   * @return Google_Service_BinaryAuthorization_AdmissionRule
   */
  public function getDefaultAdmissionRule()
  {
    return $this->defaultAdmissionRule;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setGlobalPolicyEvaluationMode($globalPolicyEvaluationMode)
  {
    $this->globalPolicyEvaluationMode = $globalPolicyEvaluationMode;
  }
  public function getGlobalPolicyEvaluationMode()
  {
    return $this->globalPolicyEvaluationMode;
  }
  /**
   * @param Google_Service_BinaryAuthorization_AdmissionRule[]
   */
  public function setIstioServiceIdentityAdmissionRules($istioServiceIdentityAdmissionRules)
  {
    $this->istioServiceIdentityAdmissionRules = $istioServiceIdentityAdmissionRules;
  }
  /**
   * @return Google_Service_BinaryAuthorization_AdmissionRule[]
   */
  public function getIstioServiceIdentityAdmissionRules()
  {
    return $this->istioServiceIdentityAdmissionRules;
  }
  /**
   * @param Google_Service_BinaryAuthorization_AdmissionRule[]
   */
  public function setKubernetesNamespaceAdmissionRules($kubernetesNamespaceAdmissionRules)
  {
    $this->kubernetesNamespaceAdmissionRules = $kubernetesNamespaceAdmissionRules;
  }
  /**
   * @return Google_Service_BinaryAuthorization_AdmissionRule[]
   */
  public function getKubernetesNamespaceAdmissionRules()
  {
    return $this->kubernetesNamespaceAdmissionRules;
  }
  /**
   * @param Google_Service_BinaryAuthorization_AdmissionRule[]
   */
  public function setKubernetesServiceAccountAdmissionRules($kubernetesServiceAccountAdmissionRules)
  {
    $this->kubernetesServiceAccountAdmissionRules = $kubernetesServiceAccountAdmissionRules;
  }
  /**
   * @return Google_Service_BinaryAuthorization_AdmissionRule[]
   */
  public function getKubernetesServiceAccountAdmissionRules()
  {
    return $this->kubernetesServiceAccountAdmissionRules;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
