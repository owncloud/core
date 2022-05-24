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

namespace Google\Service\ServiceNetworking;

class UpdateDnsRecordSetRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $consumerNetwork;
  protected $existingDnsRecordSetType = DnsRecordSet::class;
  protected $existingDnsRecordSetDataType = '';
  protected $newDnsRecordSetType = DnsRecordSet::class;
  protected $newDnsRecordSetDataType = '';
  /**
   * @var string
   */
  public $zone;

  /**
   * @param string
   */
  public function setConsumerNetwork($consumerNetwork)
  {
    $this->consumerNetwork = $consumerNetwork;
  }
  /**
   * @return string
   */
  public function getConsumerNetwork()
  {
    return $this->consumerNetwork;
  }
  /**
   * @param DnsRecordSet
   */
  public function setExistingDnsRecordSet(DnsRecordSet $existingDnsRecordSet)
  {
    $this->existingDnsRecordSet = $existingDnsRecordSet;
  }
  /**
   * @return DnsRecordSet
   */
  public function getExistingDnsRecordSet()
  {
    return $this->existingDnsRecordSet;
  }
  /**
   * @param DnsRecordSet
   */
  public function setNewDnsRecordSet(DnsRecordSet $newDnsRecordSet)
  {
    $this->newDnsRecordSet = $newDnsRecordSet;
  }
  /**
   * @return DnsRecordSet
   */
  public function getNewDnsRecordSet()
  {
    return $this->newDnsRecordSet;
  }
  /**
   * @param string
   */
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  /**
   * @return string
   */
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateDnsRecordSetRequest::class, 'Google_Service_ServiceNetworking_UpdateDnsRecordSetRequest');
