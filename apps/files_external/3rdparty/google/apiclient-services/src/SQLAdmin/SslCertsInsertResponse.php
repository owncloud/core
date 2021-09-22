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

namespace Google\Service\SQLAdmin;

class SslCertsInsertResponse extends \Google\Model
{
  protected $clientCertType = SslCertDetail::class;
  protected $clientCertDataType = '';
  public $kind;
  protected $operationType = Operation::class;
  protected $operationDataType = '';
  protected $serverCaCertType = SslCert::class;
  protected $serverCaCertDataType = '';

  /**
   * @param SslCertDetail
   */
  public function setClientCert(SslCertDetail $clientCert)
  {
    $this->clientCert = $clientCert;
  }
  /**
   * @return SslCertDetail
   */
  public function getClientCert()
  {
    return $this->clientCert;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param Operation
   */
  public function setOperation(Operation $operation)
  {
    $this->operation = $operation;
  }
  /**
   * @return Operation
   */
  public function getOperation()
  {
    return $this->operation;
  }
  /**
   * @param SslCert
   */
  public function setServerCaCert(SslCert $serverCaCert)
  {
    $this->serverCaCert = $serverCaCert;
  }
  /**
   * @return SslCert
   */
  public function getServerCaCert()
  {
    return $this->serverCaCert;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SslCertsInsertResponse::class, 'Google_Service_SQLAdmin_SslCertsInsertResponse');
