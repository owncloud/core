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

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaCertificate extends \Google\Model
{
  /**
   * @var string
   */
  public $certificateStatus;
  /**
   * @var string
   */
  public $credentialId;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $name;
  protected $rawCertificateType = GoogleCloudIntegrationsV1alphaClientCertificate::class;
  protected $rawCertificateDataType = '';
  /**
   * @var string
   */
  public $requestorId;
  /**
   * @var string
   */
  public $validEndTime;
  /**
   * @var string
   */
  public $validStartTime;

  /**
   * @param string
   */
  public function setCertificateStatus($certificateStatus)
  {
    $this->certificateStatus = $certificateStatus;
  }
  /**
   * @return string
   */
  public function getCertificateStatus()
  {
    return $this->certificateStatus;
  }
  /**
   * @param string
   */
  public function setCredentialId($credentialId)
  {
    $this->credentialId = $credentialId;
  }
  /**
   * @return string
   */
  public function getCredentialId()
  {
    return $this->credentialId;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
   * @param GoogleCloudIntegrationsV1alphaClientCertificate
   */
  public function setRawCertificate(GoogleCloudIntegrationsV1alphaClientCertificate $rawCertificate)
  {
    $this->rawCertificate = $rawCertificate;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaClientCertificate
   */
  public function getRawCertificate()
  {
    return $this->rawCertificate;
  }
  /**
   * @param string
   */
  public function setRequestorId($requestorId)
  {
    $this->requestorId = $requestorId;
  }
  /**
   * @return string
   */
  public function getRequestorId()
  {
    return $this->requestorId;
  }
  /**
   * @param string
   */
  public function setValidEndTime($validEndTime)
  {
    $this->validEndTime = $validEndTime;
  }
  /**
   * @return string
   */
  public function getValidEndTime()
  {
    return $this->validEndTime;
  }
  /**
   * @param string
   */
  public function setValidStartTime($validStartTime)
  {
    $this->validStartTime = $validStartTime;
  }
  /**
   * @return string
   */
  public function getValidStartTime()
  {
    return $this->validStartTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaCertificate::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaCertificate');
