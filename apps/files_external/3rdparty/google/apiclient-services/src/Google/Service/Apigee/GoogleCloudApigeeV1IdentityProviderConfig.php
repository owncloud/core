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

class Google_Service_Apigee_GoogleCloudApigeeV1IdentityProviderConfig extends Google_Model
{
  protected $certificateType = 'Google_Service_Apigee_GoogleCloudApigeeV1SamlCertificate';
  protected $certificateDataType = '';
  public $entityId;
  public $loginUrl;
  public $logoutUrl;
  public $spMetadataUrl;

  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1SamlCertificate
   */
  public function setCertificate(Google_Service_Apigee_GoogleCloudApigeeV1SamlCertificate $certificate)
  {
    $this->certificate = $certificate;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1SamlCertificate
   */
  public function getCertificate()
  {
    return $this->certificate;
  }
  public function setEntityId($entityId)
  {
    $this->entityId = $entityId;
  }
  public function getEntityId()
  {
    return $this->entityId;
  }
  public function setLoginUrl($loginUrl)
  {
    $this->loginUrl = $loginUrl;
  }
  public function getLoginUrl()
  {
    return $this->loginUrl;
  }
  public function setLogoutUrl($logoutUrl)
  {
    $this->logoutUrl = $logoutUrl;
  }
  public function getLogoutUrl()
  {
    return $this->logoutUrl;
  }
  public function setSpMetadataUrl($spMetadataUrl)
  {
    $this->spMetadataUrl = $spMetadataUrl;
  }
  public function getSpMetadataUrl()
  {
    return $this->spMetadataUrl;
  }
}
