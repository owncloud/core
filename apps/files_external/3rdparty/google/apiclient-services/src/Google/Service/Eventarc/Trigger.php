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

class Google_Service_Eventarc_Trigger extends Google_Collection
{
  protected $collection_key = 'eventFilters';
  public $createTime;
  protected $destinationType = 'Google_Service_Eventarc_Destination';
  protected $destinationDataType = '';
  public $etag;
  protected $eventFiltersType = 'Google_Service_Eventarc_EventFilter';
  protected $eventFiltersDataType = 'array';
  public $labels;
  public $name;
  public $serviceAccount;
  protected $transportType = 'Google_Service_Eventarc_Transport';
  protected $transportDataType = '';
  public $uid;
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param Google_Service_Eventarc_Destination
   */
  public function setDestination(Google_Service_Eventarc_Destination $destination)
  {
    $this->destination = $destination;
  }
  /**
   * @return Google_Service_Eventarc_Destination
   */
  public function getDestination()
  {
    return $this->destination;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param Google_Service_Eventarc_EventFilter[]
   */
  public function setEventFilters($eventFilters)
  {
    $this->eventFilters = $eventFilters;
  }
  /**
   * @return Google_Service_Eventarc_EventFilter[]
   */
  public function getEventFilters()
  {
    return $this->eventFilters;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param Google_Service_Eventarc_Transport
   */
  public function setTransport(Google_Service_Eventarc_Transport $transport)
  {
    $this->transport = $transport;
  }
  /**
   * @return Google_Service_Eventarc_Transport
   */
  public function getTransport()
  {
    return $this->transport;
  }
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  public function getUid()
  {
    return $this->uid;
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
