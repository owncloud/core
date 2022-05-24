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

namespace Google\Service\NetworkManagement;

class ConnectivityTest extends \Google\Collection
{
  protected $collection_key = 'relatedProjects';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  protected $destinationType = Endpoint::class;
  protected $destinationDataType = '';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $protocol;
  protected $reachabilityDetailsType = ReachabilityDetails::class;
  protected $reachabilityDetailsDataType = '';
  /**
   * @var string[]
   */
  public $relatedProjects;
  protected $sourceType = Endpoint::class;
  protected $sourceDataType = '';
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
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
   * @param Endpoint
   */
  public function setDestination(Endpoint $destination)
  {
    $this->destination = $destination;
  }
  /**
   * @return Endpoint
   */
  public function getDestination()
  {
    return $this->destination;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
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
   * @param ReachabilityDetails
   */
  public function setReachabilityDetails(ReachabilityDetails $reachabilityDetails)
  {
    $this->reachabilityDetails = $reachabilityDetails;
  }
  /**
   * @return ReachabilityDetails
   */
  public function getReachabilityDetails()
  {
    return $this->reachabilityDetails;
  }
  /**
   * @param string[]
   */
  public function setRelatedProjects($relatedProjects)
  {
    $this->relatedProjects = $relatedProjects;
  }
  /**
   * @return string[]
   */
  public function getRelatedProjects()
  {
    return $this->relatedProjects;
  }
  /**
   * @param Endpoint
   */
  public function setSource(Endpoint $source)
  {
    $this->source = $source;
  }
  /**
   * @return Endpoint
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConnectivityTest::class, 'Google_Service_NetworkManagement_ConnectivityTest');
