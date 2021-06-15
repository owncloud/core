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

class Google_Service_CertificateAuthorityService_CaPool extends Google_Model
{
  protected $issuancePolicyType = 'Google_Service_CertificateAuthorityService_IssuancePolicy';
  protected $issuancePolicyDataType = '';
  public $labels;
  public $name;
  protected $publishingOptionsType = 'Google_Service_CertificateAuthorityService_PublishingOptions';
  protected $publishingOptionsDataType = '';
  public $tier;

  /**
   * @param Google_Service_CertificateAuthorityService_IssuancePolicy
   */
  public function setIssuancePolicy(Google_Service_CertificateAuthorityService_IssuancePolicy $issuancePolicy)
  {
    $this->issuancePolicy = $issuancePolicy;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_IssuancePolicy
   */
  public function getIssuancePolicy()
  {
    return $this->issuancePolicy;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_PublishingOptions
   */
  public function setPublishingOptions(Google_Service_CertificateAuthorityService_PublishingOptions $publishingOptions)
  {
    $this->publishingOptions = $publishingOptions;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_PublishingOptions
   */
  public function getPublishingOptions()
  {
    return $this->publishingOptions;
  }
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  public function getTier()
  {
    return $this->tier;
  }
}
