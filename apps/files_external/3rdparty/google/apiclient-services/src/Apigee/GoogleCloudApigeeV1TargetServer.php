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
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $host;
  /**
   * @var bool
   */
  public $isEnabled;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $port;
  /**
   * @var string
   */
  public $protocol;
  protected $sSLInfoType = GoogleCloudApigeeV1TlsInfo::class;
  protected $sSLInfoDataType = '';

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
  public function setHost($host)
  {
    $this->host = $host;
  }
  /**
   * @return string
   */
  public function getHost()
  {
    return $this->host;
  }
  /**
   * @param bool
   */
  public function setIsEnabled($isEnabled)
  {
    $this->isEnabled = $isEnabled;
  }
  /**
   * @return bool
   */
  public function getIsEnabled()
  {
    return $this->isEnabled;
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
   * @param int
   */
  public function setPort($port)
  {
    $this->port = $port;
  }
  /**
   * @return int
   */
  public function getPort()
  {
    return $this->port;
  }
  /**
   * @param string
   */
  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }
  /**
   * @return string
   */
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
