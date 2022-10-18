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

namespace Google\Service\CloudSearch;

class MeetingSpace extends \Google\Collection
{
  protected $collection_key = 'phoneAccess';
  /**
   * @var string[]
   */
  public $acceptedNumberClass;
  protected $broadcastAccessType = BroadcastAccess::class;
  protected $broadcastAccessDataType = '';
  protected $callInfoType = CallInfo::class;
  protected $callInfoDataType = '';
  protected $gatewayAccessType = GatewayAccess::class;
  protected $gatewayAccessDataType = '';
  protected $gatewaySipAccessType = GatewaySipAccess::class;
  protected $gatewaySipAccessDataType = 'array';
  /**
   * @var string
   */
  public $meetingAlias;
  /**
   * @var string
   */
  public $meetingCode;
  /**
   * @var string
   */
  public $meetingSpaceId;
  /**
   * @var string
   */
  public $meetingUrl;
  /**
   * @var string
   */
  public $moreJoinUrl;
  protected $phoneAccessType = PhoneAccess::class;
  protected $phoneAccessDataType = 'array';
  protected $settingsType = Settings::class;
  protected $settingsDataType = '';
  protected $universalPhoneAccessType = UniversalPhoneAccess::class;
  protected $universalPhoneAccessDataType = '';

  /**
   * @param string[]
   */
  public function setAcceptedNumberClass($acceptedNumberClass)
  {
    $this->acceptedNumberClass = $acceptedNumberClass;
  }
  /**
   * @return string[]
   */
  public function getAcceptedNumberClass()
  {
    return $this->acceptedNumberClass;
  }
  /**
   * @param BroadcastAccess
   */
  public function setBroadcastAccess(BroadcastAccess $broadcastAccess)
  {
    $this->broadcastAccess = $broadcastAccess;
  }
  /**
   * @return BroadcastAccess
   */
  public function getBroadcastAccess()
  {
    return $this->broadcastAccess;
  }
  /**
   * @param CallInfo
   */
  public function setCallInfo(CallInfo $callInfo)
  {
    $this->callInfo = $callInfo;
  }
  /**
   * @return CallInfo
   */
  public function getCallInfo()
  {
    return $this->callInfo;
  }
  /**
   * @param GatewayAccess
   */
  public function setGatewayAccess(GatewayAccess $gatewayAccess)
  {
    $this->gatewayAccess = $gatewayAccess;
  }
  /**
   * @return GatewayAccess
   */
  public function getGatewayAccess()
  {
    return $this->gatewayAccess;
  }
  /**
   * @param GatewaySipAccess[]
   */
  public function setGatewaySipAccess($gatewaySipAccess)
  {
    $this->gatewaySipAccess = $gatewaySipAccess;
  }
  /**
   * @return GatewaySipAccess[]
   */
  public function getGatewaySipAccess()
  {
    return $this->gatewaySipAccess;
  }
  /**
   * @param string
   */
  public function setMeetingAlias($meetingAlias)
  {
    $this->meetingAlias = $meetingAlias;
  }
  /**
   * @return string
   */
  public function getMeetingAlias()
  {
    return $this->meetingAlias;
  }
  /**
   * @param string
   */
  public function setMeetingCode($meetingCode)
  {
    $this->meetingCode = $meetingCode;
  }
  /**
   * @return string
   */
  public function getMeetingCode()
  {
    return $this->meetingCode;
  }
  /**
   * @param string
   */
  public function setMeetingSpaceId($meetingSpaceId)
  {
    $this->meetingSpaceId = $meetingSpaceId;
  }
  /**
   * @return string
   */
  public function getMeetingSpaceId()
  {
    return $this->meetingSpaceId;
  }
  /**
   * @param string
   */
  public function setMeetingUrl($meetingUrl)
  {
    $this->meetingUrl = $meetingUrl;
  }
  /**
   * @return string
   */
  public function getMeetingUrl()
  {
    return $this->meetingUrl;
  }
  /**
   * @param string
   */
  public function setMoreJoinUrl($moreJoinUrl)
  {
    $this->moreJoinUrl = $moreJoinUrl;
  }
  /**
   * @return string
   */
  public function getMoreJoinUrl()
  {
    return $this->moreJoinUrl;
  }
  /**
   * @param PhoneAccess[]
   */
  public function setPhoneAccess($phoneAccess)
  {
    $this->phoneAccess = $phoneAccess;
  }
  /**
   * @return PhoneAccess[]
   */
  public function getPhoneAccess()
  {
    return $this->phoneAccess;
  }
  /**
   * @param Settings
   */
  public function setSettings(Settings $settings)
  {
    $this->settings = $settings;
  }
  /**
   * @return Settings
   */
  public function getSettings()
  {
    return $this->settings;
  }
  /**
   * @param UniversalPhoneAccess
   */
  public function setUniversalPhoneAccess(UniversalPhoneAccess $universalPhoneAccess)
  {
    $this->universalPhoneAccess = $universalPhoneAccess;
  }
  /**
   * @return UniversalPhoneAccess
   */
  public function getUniversalPhoneAccess()
  {
    return $this->universalPhoneAccess;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MeetingSpace::class, 'Google_Service_CloudSearch_MeetingSpace');
