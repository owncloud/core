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

namespace Google\Service\Contentwarehouse;

class AssistantApiCastCapabilities extends \Google\Collection
{
  protected $collection_key = 'cameraStreamSupportedProtocols';
  protected $cameraReceiverCapabilitiesType = AssistantApiCameraReceiverCapabilities::class;
  protected $cameraReceiverCapabilitiesDataType = '';
  /**
   * @var string[]
   */
  public $cameraStreamSupportedProtocols;
  /**
   * @var bool
   */
  public $canReceiveCast;
  protected $deviceIdType = AssistantApiCoreTypesDeviceId::class;
  protected $deviceIdDataType = '';
  /**
   * @var bool
   */
  public $dynamicGroupsSupported;
  /**
   * @var string
   */
  public $groupType;
  /**
   * @var bool
   */
  public $overlayApplicationsSupported;
  /**
   * @var bool
   */
  public $yetiGamingSupported;

  /**
   * @param AssistantApiCameraReceiverCapabilities
   */
  public function setCameraReceiverCapabilities(AssistantApiCameraReceiverCapabilities $cameraReceiverCapabilities)
  {
    $this->cameraReceiverCapabilities = $cameraReceiverCapabilities;
  }
  /**
   * @return AssistantApiCameraReceiverCapabilities
   */
  public function getCameraReceiverCapabilities()
  {
    return $this->cameraReceiverCapabilities;
  }
  /**
   * @param string[]
   */
  public function setCameraStreamSupportedProtocols($cameraStreamSupportedProtocols)
  {
    $this->cameraStreamSupportedProtocols = $cameraStreamSupportedProtocols;
  }
  /**
   * @return string[]
   */
  public function getCameraStreamSupportedProtocols()
  {
    return $this->cameraStreamSupportedProtocols;
  }
  /**
   * @param bool
   */
  public function setCanReceiveCast($canReceiveCast)
  {
    $this->canReceiveCast = $canReceiveCast;
  }
  /**
   * @return bool
   */
  public function getCanReceiveCast()
  {
    return $this->canReceiveCast;
  }
  /**
   * @param AssistantApiCoreTypesDeviceId
   */
  public function setDeviceId(AssistantApiCoreTypesDeviceId $deviceId)
  {
    $this->deviceId = $deviceId;
  }
  /**
   * @return AssistantApiCoreTypesDeviceId
   */
  public function getDeviceId()
  {
    return $this->deviceId;
  }
  /**
   * @param bool
   */
  public function setDynamicGroupsSupported($dynamicGroupsSupported)
  {
    $this->dynamicGroupsSupported = $dynamicGroupsSupported;
  }
  /**
   * @return bool
   */
  public function getDynamicGroupsSupported()
  {
    return $this->dynamicGroupsSupported;
  }
  /**
   * @param string
   */
  public function setGroupType($groupType)
  {
    $this->groupType = $groupType;
  }
  /**
   * @return string
   */
  public function getGroupType()
  {
    return $this->groupType;
  }
  /**
   * @param bool
   */
  public function setOverlayApplicationsSupported($overlayApplicationsSupported)
  {
    $this->overlayApplicationsSupported = $overlayApplicationsSupported;
  }
  /**
   * @return bool
   */
  public function getOverlayApplicationsSupported()
  {
    return $this->overlayApplicationsSupported;
  }
  /**
   * @param bool
   */
  public function setYetiGamingSupported($yetiGamingSupported)
  {
    $this->yetiGamingSupported = $yetiGamingSupported;
  }
  /**
   * @return bool
   */
  public function getYetiGamingSupported()
  {
    return $this->yetiGamingSupported;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCastCapabilities::class, 'Google_Service_Contentwarehouse_AssistantApiCastCapabilities');
