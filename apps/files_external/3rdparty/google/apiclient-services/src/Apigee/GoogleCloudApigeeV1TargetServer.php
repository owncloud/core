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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1TargetServer extends \Google\Model
{
  public $description;
  public $host;
  public $isEnabled;
  public $name;
  public $port;
  public $protocol;
  protected $sSLInfoType = GoogleCloudApigeeV1TlsInfo::class;
  protected $sSLInfoDataType = '';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setHost($host)
  {
    $this->host = $host;
  }
  public function getHost()
  {
    return $this->host;
  }
  public function setIsEnabled($isEnabled)
  {
    $this->isEnabled = $isEnabled;
  }
  public function getIsEnabled()
  {
    return $this->isEnabled;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPort($port)
  {
    $this->port = $port;
  }
  public function getPort()
  {
    return $this->port;
  }
  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }
  public function getProtocol()
  {
    return $this->protocol;
  }
  /**
   * @param GoogleCloudApigeeV1TlsInfo
   */
  public function setSSLInfo(GoogleCloudApigeeV1TlsInfo $sSLInfo)
  {
    $this->sSLInfo = $sSLInfo;
  }
  /**
   * @return GoogleCloudApigeeV1TlsInfo
   */
  public function getSSLInfo()
  {
    return $this->sSLInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1TargetServer::class, 'Google_Service_Apigee_GoogleCloudApigeeV1TargetServer');
