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
  /**
   * @var string
   */
  public $checkerType;
  protected $contentMatchersType = ContentMatcher::class;
  protected $contentMatchersDataType = 'array';
  /**
   * @var string
   */
  public $displayName;
  protected $httpCheckType = HttpCheck::class;
  protected $httpCheckDataType = '';
  protected $internalCheckersType = InternalChecker::class;
  protected $internalCheckersDataType = 'array';
  /**
   * @var bool
   */
  public $isInternal;
  protected $monitoredResourceType = MonitoredResource::class;
  protected $monitoredResourceDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $period;
  protected $resourceGroupType = ResourceGroup::class;
  protected $resourceGroupDataType = '';
  /**
   * @var string[]
   */
  public $selectedRegions;
  protected $tcpCheckType = TcpCheck::class;
  protected $tcpCheckDataType = '';
  /**
   * @var string
   */
  public $timeout;

  /**
   * @param string
   */
  public function setCheckerType($checkerType)
  {
    $this->checkerType = $checkerType;
  }
  /**
   * @return string
   */
  public function getCheckerType()
  {
    return $this->checkerType;
  }
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
  /**
   * @param bool
   */
  public function setIsInternal($isInternal)
  {
    $this->isInternal = $isInternal;
  }
  /**
   * @return bool
   */
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
  public function setPeriod($period)
  {
    $this->period = $period;
  }
  /**
   * @return string
   */
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
  /**
   * @param string[]
   */
  public function setSelectedRegions($selectedRegions)
  {
    $this->selectedRegions = $selectedRegions;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string
   */
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  /**
   * @return string
   */
  public function getTimeout()
  {
    return $this->timeout;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UptimeCheckConfig::class, 'Google_Service_Monitoring_UptimeCheckConfig');
