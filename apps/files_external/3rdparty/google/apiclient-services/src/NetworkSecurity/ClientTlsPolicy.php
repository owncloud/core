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

namespace Google\Service\NetworkSecurity;

class ClientTlsPolicy extends \Google\Collection
{
  protected $collection_key = 'serverValidationCa';
  protected $clientCertificateType = GoogleCloudNetworksecurityV1CertificateProvider::class;
  protected $clientCertificateDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  protected $serverValidationCaType = ValidationCA::class;
  protected $serverValidationCaDataType = 'array';
  /**
   * @var string
   */
  public $sni;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param GoogleCloudNetworksecurityV1CertificateProvider
   */
  public function setClientCertificate(GoogleCloudNetworksecurityV1CertificateProvider $clientCertificate)
  {
    $this->clientCertificate = $clientCertificate;
  }
  /**
   * @return GoogleCloudNetworksecurityV1CertificateProvider
   */
  public function getClientCertificate()
  {
    return $this->clientCertificate;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
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
   * @param ValidationCA[]
   */
  public function setServerValidationCa($serverValidationCa)
  {
    $this->serverValidationCa = $serverValidationCa;
  }
  /**
   * @return ValidationCA[]
   */
  public function getServerValidationCa()
  {
    return $this->serverValidationCa;
  }
  /**
   * @param string
   */
  public function setSni($sni)
  {
    $this->sni = $sni;
  }
  /**
   * @return string
   */
  public function getSni()
  {
    return $this->sni;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClientTlsPolicy::class, 'Google_Service_NetworkSecurity_ClientTlsPolicy');
