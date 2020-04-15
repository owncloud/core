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

class Google_Service_Dns_Operation extends Google_Model
{
  protected $dnsKeyContextType = 'Google_Service_Dns_OperationDnsKeyContext';
  protected $dnsKeyContextDataType = '';
  public $id;
  public $kind;
  public $startTime;
  public $status;
  public $type;
  public $user;
  protected $zoneContextType = 'Google_Service_Dns_OperationManagedZoneContext';
  protected $zoneContextDataType = '';

  /**
   * @param Google_Service_Dns_OperationDnsKeyContext
   */
  public function setDnsKeyContext(Google_Service_Dns_OperationDnsKeyContext $dnsKeyContext)
  {
    $this->dnsKeyContext = $dnsKeyContext;
  }
  /**
   * @return Google_Service_Dns_OperationDnsKeyContext
   */
  public function getDnsKeyContext()
  {
    return $this->dnsKeyContext;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUser($user)
  {
    $this->user = $user;
  }
  public function getUser()
  {
    return $this->user;
  }
  /**
   * @param Google_Service_Dns_OperationManagedZoneContext
   */
  public function setZoneContext(Google_Service_Dns_OperationManagedZoneContext $zoneContext)
  {
    $this->zoneContext = $zoneContext;
  }
  /**
   * @return Google_Service_Dns_OperationManagedZoneContext
   */
  public function getZoneContext()
  {
    return $this->zoneContext;
  }
}
