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

class Google_Service_Compute_SslPolicy extends Google_Collection
{
  protected $collection_key = 'warnings';
  public $creationTimestamp;
  public $customFeatures;
  public $description;
  public $enabledFeatures;
  public $fingerprint;
  public $id;
  public $kind;
  public $minTlsVersion;
  public $name;
  public $profile;
  public $selfLink;
  protected $warningsType = 'Google_Service_Compute_SslPolicyWarnings';
  protected $warningsDataType = 'array';

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setCustomFeatures($customFeatures)
  {
    $this->customFeatures = $customFeatures;
  }
  public function getCustomFeatures()
  {
    return $this->customFeatures;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEnabledFeatures($enabledFeatures)
  {
    $this->enabledFeatures = $enabledFeatures;
  }
  public function getEnabledFeatures()
  {
    return $this->enabledFeatures;
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
  public function setMinTlsVersion($minTlsVersion)
  {
    $this->minTlsVersion = $minTlsVersion;
  }
  public function getMinTlsVersion()
  {
    return $this->minTlsVersion;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProfile($profile)
  {
    $this->profile = $profile;
  }
  public function getProfile()
  {
    return $this->profile;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param Google_Service_Compute_SslPolicyWarnings[]
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return Google_Service_Compute_SslPolicyWarnings[]
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}
