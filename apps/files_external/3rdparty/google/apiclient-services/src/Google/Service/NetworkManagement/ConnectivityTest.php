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

class Google_Service_NetworkManagement_ConnectivityTest extends Google_Collection
{
  protected $collection_key = 'relatedProjects';
  public $createTime;
  public $description;
  protected $destinationType = 'Google_Service_NetworkManagement_Endpoint';
  protected $destinationDataType = '';
  public $displayName;
  public $labels;
  public $name;
  public $protocol;
  protected $reachabilityDetailsType = 'Google_Service_NetworkManagement_ReachabilityDetails';
  protected $reachabilityDetailsDataType = '';
  public $relatedProjects;
  protected $sourceType = 'Google_Service_NetworkManagement_Endpoint';
  protected $sourceDataType = '';
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_NetworkManagement_Endpoint
   */
  public function setDestination(Google_Service_NetworkManagement_Endpoint $destination)
  {
    $this->destination = $destination;
  }
  /**
   * @return Google_Service_NetworkManagement_Endpoint
   */
  public function getDestination()
  {
    return $this->destination;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
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
  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }
  public function getProtocol()
  {
    return $this->protocol;
  }
  /**
   * @param Google_Service_NetworkManagement_ReachabilityDetails
   */
  public function setReachabilityDetails(Google_Service_NetworkManagement_ReachabilityDetails $reachabilityDetails)
  {
    $this->reachabilityDetails = $reachabilityDetails;
  }
  /**
   * @return Google_Service_NetworkManagement_ReachabilityDetails
   */
  public function getReachabilityDetails()
  {
    return $this->reachabilityDetails;
  }
  public function setRelatedProjects($relatedProjects)
  {
    $this->relatedProjects = $relatedProjects;
  }
  public function getRelatedProjects()
  {
    return $this->relatedProjects;
  }
  /**
   * @param Google_Service_NetworkManagement_Endpoint
   */
  public function setSource(Google_Service_NetworkManagement_Endpoint $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_NetworkManagement_Endpoint
   */
  public function getSource()
  {
    return $this->source;
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
