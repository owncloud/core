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

class Google_Service_CloudHealthcare_Consent extends Google_Collection
{
  protected $collection_key = 'policies';
  public $consentArtifact;
  public $expireTime;
  public $metadata;
  public $name;
  protected $policiesType = 'Google_Service_CloudHealthcare_GoogleCloudHealthcareV1ConsentPolicy';
  protected $policiesDataType = 'array';
  public $revisionCreateTime;
  public $revisionId;
  public $state;
  public $ttl;
  public $userId;

  public function setConsentArtifact($consentArtifact)
  {
    $this->consentArtifact = $consentArtifact;
  }
  public function getConsentArtifact()
  {
    return $this->consentArtifact;
  }
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
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
   * @param Google_Service_CloudHealthcare_GoogleCloudHealthcareV1ConsentPolicy[]
   */
  public function setPolicies($policies)
  {
    $this->policies = $policies;
  }
  /**
   * @return Google_Service_CloudHealthcare_GoogleCloudHealthcareV1ConsentPolicy[]
   */
  public function getPolicies()
  {
    return $this->policies;
  }
  public function setRevisionCreateTime($revisionCreateTime)
  {
    $this->revisionCreateTime = $revisionCreateTime;
  }
  public function getRevisionCreateTime()
  {
    return $this->revisionCreateTime;
  }
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTtl($ttl)
  {
    $this->ttl = $ttl;
  }
  public function getTtl()
  {
    return $this->ttl;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
}
