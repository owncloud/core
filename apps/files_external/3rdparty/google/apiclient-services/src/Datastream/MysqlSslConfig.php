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
  public $caCertificate;
  public $caCertificateSet;
  public $clientCertificate;
  public $clientCertificateSet;
  public $clientKey;
  public $clientKeySet;

  public function setCaCertificate($caCertificate)
  {
    $this->caCertificate = $caCertificate;
  }
  public function getCaCertificate()
  {
    return $this->caCertificate;
  }
  public function setCaCertificateSet($caCertificateSet)
  {
    $this->caCertificateSet = $caCertificateSet;
  }
  public function getCaCertificateSet()
  {
    return $this->caCertificateSet;
  }
  public function setClientCertificate($clientCertificate)
  {
    $this->clientCertificate = $clientCertificate;
  }
  public function getClientCertificate()
  {
    return $this->clientCertificate;
  }
  public function setClientCertificateSet($clientCertificateSet)
  {
    $this->clientCertificateSet = $clientCertificateSet;
  }
  public function getClientCertificateSet()
  {
    return $this->clientCertificateSet;
  }
  public function setClientKey($clientKey)
  {
    $this->clientKey = $clientKey;
  }
  public function getClientKey()
  {
    return $this->clientKey;
  }
  public function setClientKeySet($clientKeySet)
  {
    $this->clientKeySet = $clientKeySet;
  }
  public function getClientKeySet()
  {
    return $this->clientKeySet;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MysqlSslConfig::class, 'Google_Service_Datastream_MysqlSslConfig');
