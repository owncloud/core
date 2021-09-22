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

namespace Google\Service\Compute;

class SecurityPolicy extends \Google\Collection
{
  protected $collection_key = 'rules';
  protected $adaptiveProtectionConfigType = SecurityPolicyAdaptiveProtectionConfig::class;
  protected $adaptiveProtectionConfigDataType = '';
  protected $advancedOptionsConfigType = SecurityPolicyAdvancedOptionsConfig::class;
  protected $advancedOptionsConfigDataType = '';
  public $creationTimestamp;
  public $description;
  public $fingerprint;
  public $id;
  public $kind;
  public $name;
  protected $rulesType = SecurityPolicyRule::class;
  protected $rulesDataType = 'array';
  public $selfLink;

  /**
   * @param SecurityPolicyAdaptiveProtectionConfig
   */
  public function setAdaptiveProtectionConfig(SecurityPolicyAdaptiveProtectionConfig $adaptiveProtectionConfig)
  {
    $this->adaptiveProtectionConfig = $adaptiveProtectionConfig;
  }
  /**
   * @return SecurityPolicyAdaptiveProtectionConfig
   */
  public function getAdaptiveProtectionConfig()
  {
    return $this->adaptiveProtectionConfig;
  }
  /**
   * @param SecurityPolicyAdvancedOptionsConfig
   */
  public function setAdvancedOptionsConfig(SecurityPolicyAdvancedOptionsConfig $advancedOptionsConfig)
  {
    $this->advancedOptionsConfig = $advancedOptionsConfig;
  }
  /**
   * @return SecurityPolicyAdvancedOptionsConfig
   */
  public function getAdvancedOptionsConfig()
  {
    return $this->advancedOptionsConfig;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
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
   * @param SecurityPolicyRule[]
   */
  public function setRules($rules)
  {
    $this->rules = $rules;
  }
  /**
   * @return SecurityPolicyRule[]
   */
  public function getRules()
  {
    return $this->rules;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SecurityPolicy::class, 'Google_Service_Compute_SecurityPolicy');
