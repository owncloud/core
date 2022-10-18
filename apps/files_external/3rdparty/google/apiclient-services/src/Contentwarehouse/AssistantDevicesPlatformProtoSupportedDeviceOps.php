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

class AssistantDevicesPlatformProtoSupportedDeviceOps extends \Google\Model
{
  protected $callCallType = AssistantDevicesPlatformProtoCallCallCapability::class;
  protected $callCallDataType = '';
  protected $clientReconnectType = AssistantDevicesPlatformProtoClientReconnectCapability::class;
  protected $clientReconnectDataType = '';
  protected $deviceModifySettingType = AssistantDevicesPlatformProtoDeviceModifySettingCapability::class;
  protected $deviceModifySettingDataType = '';
  protected $mediaNextType = AssistantDevicesPlatformProtoMediaNextCapability::class;
  protected $mediaNextDataType = '';
  protected $mediaPauseType = AssistantDevicesPlatformProtoMediaPauseCapability::class;
  protected $mediaPauseDataType = '';
  protected $mediaPlayMediaType = AssistantDevicesPlatformProtoMediaPlayMediaCapability::class;
  protected $mediaPlayMediaDataType = '';
  protected $mediaPreviousType = AssistantDevicesPlatformProtoMediaPreviousCapability::class;
  protected $mediaPreviousDataType = '';
  protected $mediaResumeType = AssistantDevicesPlatformProtoMediaResumeCapability::class;
  protected $mediaResumeDataType = '';
  protected $mediaStopType = AssistantDevicesPlatformProtoMediaStopCapability::class;
  protected $mediaStopDataType = '';
  protected $providerOpenType = AssistantDevicesPlatformProtoProviderOpenCapability::class;
  protected $providerOpenDataType = '';
  protected $sendChatMessageType = AssistantDevicesPlatformProtoSendChatMessageCapability::class;
  protected $sendChatMessageDataType = '';

  /**
   * @param AssistantDevicesPlatformProtoCallCallCapability
   */
  public function setCallCall(AssistantDevicesPlatformProtoCallCallCapability $callCall)
  {
    $this->callCall = $callCall;
  }
  /**
   * @return AssistantDevicesPlatformProtoCallCallCapability
   */
  public function getCallCall()
  {
    return $this->callCall;
  }
  /**
   * @param AssistantDevicesPlatformProtoClientReconnectCapability
   */
  public function setClientReconnect(AssistantDevicesPlatformProtoClientReconnectCapability $clientReconnect)
  {
    $this->clientReconnect = $clientReconnect;
  }
  /**
   * @return AssistantDevicesPlatformProtoClientReconnectCapability
   */
  public function getClientReconnect()
  {
    return $this->clientReconnect;
  }
  /**
   * @param AssistantDevicesPlatformProtoDeviceModifySettingCapability
   */
  public function setDeviceModifySetting(AssistantDevicesPlatformProtoDeviceModifySettingCapability $deviceModifySetting)
  {
    $this->deviceModifySetting = $deviceModifySetting;
  }
  /**
   * @return AssistantDevicesPlatformProtoDeviceModifySettingCapability
   */
  public function getDeviceModifySetting()
  {
    return $this->deviceModifySetting;
  }
  /**
   * @param AssistantDevicesPlatformProtoMediaNextCapability
   */
  public function setMediaNext(AssistantDevicesPlatformProtoMediaNextCapability $mediaNext)
  {
    $this->mediaNext = $mediaNext;
  }
  /**
   * @return AssistantDevicesPlatformProtoMediaNextCapability
   */
  public function getMediaNext()
  {
    return $this->mediaNext;
  }
  /**
   * @param AssistantDevicesPlatformProtoMediaPauseCapability
   */
  public function setMediaPause(AssistantDevicesPlatformProtoMediaPauseCapability $mediaPause)
  {
    $this->mediaPause = $mediaPause;
  }
  /**
   * @return AssistantDevicesPlatformProtoMediaPauseCapability
   */
  public function getMediaPause()
  {
    return $this->mediaPause;
  }
  /**
   * @param AssistantDevicesPlatformProtoMediaPlayMediaCapability
   */
  public function setMediaPlayMedia(AssistantDevicesPlatformProtoMediaPlayMediaCapability $mediaPlayMedia)
  {
    $this->mediaPlayMedia = $mediaPlayMedia;
  }
  /**
   * @return AssistantDevicesPlatformProtoMediaPlayMediaCapability
   */
  public function getMediaPlayMedia()
  {
    return $this->mediaPlayMedia;
  }
  /**
   * @param AssistantDevicesPlatformProtoMediaPreviousCapability
   */
  public function setMediaPrevious(AssistantDevicesPlatformProtoMediaPreviousCapability $mediaPrevious)
  {
    $this->mediaPrevious = $mediaPrevious;
  }
  /**
   * @return AssistantDevicesPlatformProtoMediaPreviousCapability
   */
  public function getMediaPrevious()
  {
    return $this->mediaPrevious;
  }
  /**
   * @param AssistantDevicesPlatformProtoMediaResumeCapability
   */
  public function setMediaResume(AssistantDevicesPlatformProtoMediaResumeCapability $mediaResume)
  {
    $this->mediaResume = $mediaResume;
  }
  /**
   * @return AssistantDevicesPlatformProtoMediaResumeCapability
   */
  public function getMediaResume()
  {
    return $this->mediaResume;
  }
  /**
   * @param AssistantDevicesPlatformProtoMediaStopCapability
   */
  public function setMediaStop(AssistantDevicesPlatformProtoMediaStopCapability $mediaStop)
  {
    $this->mediaStop = $mediaStop;
  }
  /**
   * @return AssistantDevicesPlatformProtoMediaStopCapability
   */
  public function getMediaStop()
  {
    return $this->mediaStop;
  }
  /**
   * @param AssistantDevicesPlatformProtoProviderOpenCapability
   */
  public function setProviderOpen(AssistantDevicesPlatformProtoProviderOpenCapability $providerOpen)
  {
    $this->providerOpen = $providerOpen;
  }
  /**
   * @return AssistantDevicesPlatformProtoProviderOpenCapability
   */
  public function getProviderOpen()
  {
    return $this->providerOpen;
  }
  /**
   * @param AssistantDevicesPlatformProtoSendChatMessageCapability
   */
  public function setSendChatMessage(AssistantDevicesPlatformProtoSendChatMessageCapability $sendChatMessage)
  {
    $this->sendChatMessage = $sendChatMessage;
  }
  /**
   * @return AssistantDevicesPlatformProtoSendChatMessageCapability
   */
  public function getSendChatMessage()
  {
    return $this->sendChatMessage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantDevicesPlatformProtoSupportedDeviceOps::class, 'Google_Service_Contentwarehouse_AssistantDevicesPlatformProtoSupportedDeviceOps');
