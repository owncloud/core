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

namespace Google\Service\Datastream;

class MysqlSslConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $caCertificate;
  /**
   * @var bool
   */
  public $caCertificateSet;
  /**
   * @var string
   */
  public $clientCertificate;
  /**
   * @var bool
   */
  public $clientCertificateSet;
  /**
   * @var string
   */
  public $clientKey;
  /**
   * @var bool
   */
  public $clientKeySet;

  /**
   * @param string
   */
  public function setCaCertificate($caCertificate)
  {
    $this->caCertificate = $caCertificate;
  }
  /**
   * @return string
   */
  public function getCaCertificate()
  {
    return $this->caCertificate;
  }
  /**
   * @param bool
   */
  public function setCaCertificateSet($caCertificateSet)
  {
    $this->caCertificateSet = $caCertificateSet;
  }
  /**
   * @return bool
   */
  public function getCaCertificateSet()
  {
    return $this->caCertificateSet;
  }
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
   * @param bool
   */
  public function setClientCertificateSet($clientCertificateSet)
  {
    $this->clientCertificateSet = $clientCertificateSet;
  }
  /**
   * @return bool
   */
  public function getClientCertificateSet()
  {
    return $this->clientCertificateSet;
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
   * @param bool
   */
  public function setClientKeySet($clientKeySet)
  {
    $this->clientKeySet = $clientKeySet;
  }
  /**
   * @return bool
   */
  public function getClientKeySet()
  {
    return $this->clientKeySet;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MysqlSslConfig::class, 'Google_Service_Datastream_MysqlSslConfig');
