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

class ServerTlsPolicy extends \Google\Model
{
  public $allowOpen;
  public $createTime;
  public $description;
  public $labels;
  protected $mtlsPolicyType = MTLSPolicy::class;
  protected $mtlsPolicyDataType = '';
  public $name;
  protected $serverCertificateType = GoogleCloudNetworksecurityV1CertificateProvider::class;
  protected $serverCertificateDataType = '';
  public $updateTime;

  public function setAllowOpen($allowOpen)
  {
    $this->allowOpen = $allowOpen;
  }
  public function getAllowOpen()
  {
    return $this->allowOpen;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param MTLSPolicy
   */
  public function setMtlsPolicy(MTLSPolicy $mtlsPolicy)
  {
    $this->mtlsPolicy = $mtlsPolicy;
  }
  /**
   * @return MTLSPolicy
   */
  public function getMtlsPolicy()
  {
    return $this->mtlsPolicy;
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
   * @param GoogleCloudNetworksecurityV1CertificateProvider
   */
  public function setServerCertificate(GoogleCloudNetworksecurityV1CertificateProvider $serverCertificate)
  {
    $this->serverCertificate = $serverCertificate;
  }
  /**
   * @return GoogleCloudNetworksecurityV1CertificateProvider
   */
  public function getServerCertificate()
  {
    return $this->serverCertificate;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServerTlsPolicy::class, 'Google_Service_NetworkSecurity_ServerTlsPolicy');
