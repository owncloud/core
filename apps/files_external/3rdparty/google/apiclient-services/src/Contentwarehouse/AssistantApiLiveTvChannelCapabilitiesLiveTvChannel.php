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

class AssistantApiLiveTvChannelCapabilitiesLiveTvChannel extends \Google\Collection
{
  protected $collection_key = 'channelName';
  /**
   * @var string
   */
  public $channelId;
  /**
   * @var string[]
   */
  public $channelName;
  /**
   * @var string
   */
  public $channelNumber;
  /**
   * @var string
   */
  public $deeplink;
  /**
   * @var string
   */
  public $mid;
  /**
   * @var string
   */
  public $networkMid;

  /**
   * @param string
   */
  public function setChannelId($channelId)
  {
    $this->channelId = $channelId;
  }
  /**
   * @return string
   */
  public function getChannelId()
  {
    return $this->channelId;
  }
  /**
   * @param string[]
   */
  public function setChannelName($channelName)
  {
    $this->channelName = $channelName;
  }
  /**
   * @return string[]
   */
  public function getChannelName()
  {
    return $this->channelName;
  }
  /**
   * @param string
   */
  public function setChannelNumber($channelNumber)
  {
    $this->channelNumber = $channelNumber;
  }
  /**
   * @return string
   */
  public function getChannelNumber()
  {
    return $this->channelNumber;
  }
  /**
   * @param string
   */
  public function setDeeplink($deeplink)
  {
    $this->deeplink = $deeplink;
  }
  /**
   * @return string
   */
  public function getDeeplink()
  {
    return $this->deeplink;
  }
  /**
   * @param string
   */
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  /**
   * @return string
   */
  public function getMid()
  {
    return $this->mid;
  }
  /**
   * @param string
   */
  public function setNetworkMid($networkMid)
  {
    $this->networkMid = $networkMid;
  }
  /**
   * @return string
   */
  public function getNetworkMid()
  {
    return $this->networkMid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiLiveTvChannelCapabilitiesLiveTvChannel::class, 'Google_Service_Contentwarehouse_AssistantApiLiveTvChannelCapabilitiesLiveTvChannel');
