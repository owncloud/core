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

namespace Google\Service\CertificateAuthorityService;

class CaPool extends \Google\Model
{
  protected $issuancePolicyType = IssuancePolicy::class;
  protected $issuancePolicyDataType = '';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  protected $publishingOptionsType = PublishingOptions::class;
  protected $publishingOptionsDataType = '';
  /**
   * @var string
   */
  public $tier;

  /**
   * @param IssuancePolicy
   */
  public function setIssuancePolicy(IssuancePolicy $issuancePolicy)
  {
    $this->issuancePolicy = $issuancePolicy;
  }
  /**
   * @return IssuancePolicy
   */
  public function getIssuancePolicy()
  {
    return $this->issuancePolicy;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
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
   * @param PublishingOptions
   */
  public function setPublishingOptions(PublishingOptions $publishingOptions)
  {
    $this->publishingOptions = $publishingOptions;
  }
  /**
   * @return PublishingOptions
   */
  public function getPublishingOptions()
  {
    return $this->publishingOptions;
  }
  /**
   * @param string
   */
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  /**
   * @return string
   */
  public function getTier()
  {
    return $this->tier;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CaPool::class, 'Google_Service_CertificateAuthorityService_CaPool');
