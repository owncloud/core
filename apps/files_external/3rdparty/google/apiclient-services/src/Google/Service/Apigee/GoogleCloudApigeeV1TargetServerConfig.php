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

class Google_Service_Apigee_GoogleCloudApigeeV1TargetServerConfig extends Google_Model
{
  public $host;
  public $name;
  public $port;
  protected $tlsInfoType = 'Google_Service_Apigee_GoogleCloudApigeeV1TlsInfoConfig';
  protected $tlsInfoDataType = '';

  public function setHost($host)
  {
    $this->host = $host;
  }
  public function getHost()
  {
    return $this->host;
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
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1TlsInfoConfig
   */
  public function setTlsInfo(Google_Service_Apigee_GoogleCloudApigeeV1TlsInfoConfig $tlsInfo)
  {
    $this->tlsInfo = $tlsInfo;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1TlsInfoConfig
   */
  public function getTlsInfo()
  {
    return $this->tlsInfo;
  }
}
