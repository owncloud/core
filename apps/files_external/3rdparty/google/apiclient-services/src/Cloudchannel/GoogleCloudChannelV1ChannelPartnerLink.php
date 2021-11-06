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

namespace Google\Service\Cloudchannel;

class GoogleCloudChannelV1ChannelPartnerLink extends \Google\Model
{
  protected $channelPartnerCloudIdentityInfoType = GoogleCloudChannelV1CloudIdentityInfo::class;
  protected $channelPartnerCloudIdentityInfoDataType = '';
  public $createTime;
  public $inviteLinkUri;
  public $linkState;
  public $name;
  public $publicId;
  public $resellerCloudIdentityId;
  public $updateTime;

  /**
   * @param GoogleCloudChannelV1CloudIdentityInfo
   */
  public function setChannelPartnerCloudIdentityInfo(GoogleCloudChannelV1CloudIdentityInfo $channelPartnerCloudIdentityInfo)
  {
    $this->channelPartnerCloudIdentityInfo = $channelPartnerCloudIdentityInfo;
  }
  /**
   * @return GoogleCloudChannelV1CloudIdentityInfo
   */
  public function getChannelPartnerCloudIdentityInfo()
  {
    return $this->channelPartnerCloudIdentityInfo;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setInviteLinkUri($inviteLinkUri)
  {
    $this->inviteLinkUri = $inviteLinkUri;
  }
  public function getInviteLinkUri()
  {
    return $this->inviteLinkUri;
  }
  public function setLinkState($linkState)
  {
    $this->linkState = $linkState;
  }
  public function getLinkState()
  {
    return $this->linkState;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPublicId($publicId)
  {
    $this->publicId = $publicId;
  }
  public function getPublicId()
  {
    return $this->publicId;
  }
  public function setResellerCloudIdentityId($resellerCloudIdentityId)
  {
    $this->resellerCloudIdentityId = $resellerCloudIdentityId;
  }
  public function getResellerCloudIdentityId()
  {
    return $this->resellerCloudIdentityId;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1ChannelPartnerLink::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1ChannelPartnerLink');
