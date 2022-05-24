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

namespace Google\Service\DisplayVideo;

class Channel extends \Google\Model
{
  /**
   * @var string
   */
  public $advertiserId;
  /**
   * @var string
   */
  public $channelId;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $negativelyTargetedLineItemCount;
  /**
   * @var string
   */
  public $partnerId;
  /**
   * @var string
   */
  public $positivelyTargetedLineItemCount;

  /**
   * @param string
   */
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  /**
   * @return string
   */
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
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
  public function setNegativelyTargetedLineItemCount($negativelyTargetedLineItemCount)
  {
    $this->negativelyTargetedLineItemCount = $negativelyTargetedLineItemCount;
  }
  /**
   * @return string
   */
  public function getNegativelyTargetedLineItemCount()
  {
    return $this->negativelyTargetedLineItemCount;
  }
  /**
   * @param string
   */
  public function setPartnerId($partnerId)
  {
    $this->partnerId = $partnerId;
  }
  /**
   * @return string
   */
  public function getPartnerId()
  {
    return $this->partnerId;
  }
  /**
   * @param string
   */
  public function setPositivelyTargetedLineItemCount($positivelyTargetedLineItemCount)
  {
    $this->positivelyTargetedLineItemCount = $positivelyTargetedLineItemCount;
  }
  /**
   * @return string
   */
  public function getPositivelyTargetedLineItemCount()
  {
    return $this->positivelyTargetedLineItemCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Channel::class, 'Google_Service_DisplayVideo_Channel');
