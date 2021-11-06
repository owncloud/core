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

namespace Google\Service\Monitoring;

class UptimeCheckConfig extends \Google\Collection
{
  protected $collection_key = 'selectedRegions';
  protected $contentMatchersType = ContentMatcher::class;
  protected $contentMatchersDataType = 'array';
  public $displayName;
  protected $httpCheckType = HttpCheck::class;
  protected $httpCheckDataType = '';
  protected $internalCheckersType = InternalChecker::class;
  protected $internalCheckersDataType = 'array';
  public $isInternal;
  protected $monitoredResourceType = MonitoredResource::class;
  protected $monitoredResourceDataType = '';
  public $name;
  public $period;
  protected $resourceGroupType = ResourceGroup::class;
  protected $resourceGroupDataType = '';
  public $selectedRegions;
  protected $tcpCheckType = TcpCheck::class;
  protected $tcpCheckDataType = '';
  public $timeout;

  /**
   * @param ContentMatcher[]
   */
  public function setContentMatchers($contentMatchers)
  {
    $this->contentMatchers = $contentMatchers;
  }
  /**
   * @return ContentMatcher[]
   */
  public function getContentMatchers()
  {
    return $this->contentMatchers;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param HttpCheck
   */
  public function setHttpCheck(HttpCheck $httpCheck)
  {
    $this->httpCheck = $httpCheck;
  }
  /**
   * @return HttpCheck
   */
  public function getHttpCheck()
  {
    return $this->httpCheck;
  }
  /**
   * @param InternalChecker[]
   */
  public function setInternalCheckers($internalCheckers)
  {
    $this->internalCheckers = $internalCheckers;
  }
  /**
   * @return InternalChecker[]
   */
  public function getInternalCheckers()
  {
    return $this->internalCheckers;
  }
  public function setIsInternal($isInternal)
  {
    $this->isInternal = $isInternal;
  }
  public function getIsInternal()
  {
    return $this->isInternal;
  }
  /**
   * @param MonitoredResource
   */
  public function setMonitoredResource(MonitoredResource $monitoredResource)
  {
    $this->monitoredResource = $monitoredResource;
  }
  /**
   * @return MonitoredResource
   */
  public function getMonitoredResource()
  {
    return $this->monitoredResource;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPeriod($period)
  {
    $this->period = $period;
  }
  public function getPeriod()
  {
    return $this->period;
  }
  /**
   * @param ResourceGroup
   */
  public function setResourceGroup(ResourceGroup $resourceGroup)
  {
    $this->resourceGroup = $resourceGroup;
  }
  /**
   * @return ResourceGroup
   */
  public function getResourceGroup()
  {
    return $this->resourceGroup;
  }
  public function setSelectedRegions($selectedRegions)
  {
    $this->selectedRegions = $selectedRegions;
  }
  public function getSelectedRegions()
  {
    return $this->selectedRegions;
  }
  /**
   * @param TcpCheck
   */
  public function setTcpCheck(TcpCheck $tcpCheck)
  {
    $this->tcpCheck = $tcpCheck;
  }
  /**
   * @return TcpCheck
   */
  public function getTcpCheck()
  {
    return $this->tcpCheck;
  }
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  public function getTimeout()
  {
    return $this->timeout;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UptimeCheckConfig::class, 'Google_Service_Monitoring_UptimeCheckConfig');
