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

class Google_Service_CloudHealthcare_ConsentArtifact extends Google_Collection
{
  protected $collection_key = 'consentContentScreenshots';
  protected $consentContentScreenshotsType = 'Google_Service_CloudHealthcare_Image';
  protected $consentContentScreenshotsDataType = 'array';
  public $consentContentVersion;
  protected $guardianSignatureType = 'Google_Service_CloudHealthcare_Signature';
  protected $guardianSignatureDataType = '';
  public $metadata;
  public $name;
  public $userId;
  protected $userSignatureType = 'Google_Service_CloudHealthcare_Signature';
  protected $userSignatureDataType = '';
  protected $witnessSignatureType = 'Google_Service_CloudHealthcare_Signature';
  protected $witnessSignatureDataType = '';

  /**
   * @param Google_Service_CloudHealthcare_Image[]
   */
  public function setConsentContentScreenshots($consentContentScreenshots)
  {
    $this->consentContentScreenshots = $consentContentScreenshots;
  }
  /**
   * @return Google_Service_CloudHealthcare_Image[]
   */
  public function getConsentContentScreenshots()
  {
    return $this->consentContentScreenshots;
  }
  public function setConsentContentVersion($consentContentVersion)
  {
    $this->consentContentVersion = $consentContentVersion;
  }
  public function getConsentContentVersion()
  {
    return $this->consentContentVersion;
  }
  /**
   * @param Google_Service_CloudHealthcare_Signature
   */
  public function setGuardianSignature(Google_Service_CloudHealthcare_Signature $guardianSignature)
  {
    $this->guardianSignature = $guardianSignature;
  }
  /**
   * @return Google_Service_CloudHealthcare_Signature
   */
  public function getGuardianSignature()
  {
    return $this->guardianSignature;
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
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
  /**
   * @param Google_Service_CloudHealthcare_Signature
   */
  public function setUserSignature(Google_Service_CloudHealthcare_Signature $userSignature)
  {
    $this->userSignature = $userSignature;
  }
  /**
   * @return Google_Service_CloudHealthcare_Signature
   */
  public function getUserSignature()
  {
    return $this->userSignature;
  }
  /**
   * @param Google_Service_CloudHealthcare_Signature
   */
  public function setWitnessSignature(Google_Service_CloudHealthcare_Signature $witnessSignature)
  {
    $this->witnessSignature = $witnessSignature;
  }
  /**
   * @return Google_Service_CloudHealthcare_Signature
   */
  public function getWitnessSignature()
  {
    return $this->witnessSignature;
  }
}
