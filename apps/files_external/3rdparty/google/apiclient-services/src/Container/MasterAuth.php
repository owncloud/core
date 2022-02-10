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

namespace Google\Service\Container;

class MasterAuth extends \Google\Model
{
  /**
   * @var string
   */
  public $clientCertificate;
  protected $clientCertificateConfigType = ClientCertificateConfig::class;
  protected $clientCertificateConfigDataType = '';
  /**
   * @var string
   */
  public $clientKey;
  /**
   * @var string
   */
  public $clusterCaCertificate;
  /**
   * @var string
   */
  public $password;
  /**
   * @var string
   */
  public $username;

  /**
   * @param string
   */
  public function setClientCertificate($clientCertificate)
  {
    $this->clientCertificate = $clientCertificate;
  }
  /**
   * @return string
   */
  public function getClientCertificate()
  {
    return $this->clientCertificate;
  }
  /**
   * @param ClientCertificateConfig
   */
  public function setClientCertificateConfig(ClientCertificateConfig $clientCertificateConfig)
  {
    $this->clientCertificateConfig = $clientCertificateConfig;
  }
  /**
   * @return ClientCertificateConfig
   */
  public function getClientCertificateConfig()
  {
    return $this->clientCertificateConfig;
  }
  /**
   * @param string
   */
  public function setClientKey($clientKey)
  {
    $this->clientKey = $clientKey;
  }
  /**
   * @return string
   */
  public function getClientKey()
  {
    return $this->clientKey;
  }
  /**
   * @param string
   */
  public function setClusterCaCertificate($clusterCaCertificate)
  {
    $this->clusterCaCertificate = $clusterCaCertificate;
  }
  /**
   * @return string
   */
  public function getClusterCaCertificate()
  {
    return $this->clusterCaCertificate;
  }
  /**
   * @param string
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }
  /**
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }
  /**
   * @param string
   */
  public function setUsername($username)
  {
    $this->username = $username;
  }
  /**
   * @return string
   */
  public function getUsername()
  {
    return $this->username;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MasterAuth::class, 'Google_Service_Container_MasterAuth');
