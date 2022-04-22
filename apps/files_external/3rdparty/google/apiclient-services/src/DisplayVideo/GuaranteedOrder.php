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

class GuaranteedOrder extends \Google\Collection
{
  protected $collection_key = 'readAdvertiserIds';
  /**
   * @var string
   */
  public $defaultAdvertiserId;
  /**
   * @var string
   */
  public $defaultCampaignId;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $exchange;
  /**
   * @var string
   */
  public $guaranteedOrderId;
  /**
   * @var string
   */
  public $legacyGuaranteedOrderId;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $publisherName;
  /**
   * @var bool
   */
  public $readAccessInherited;
  /**
   * @var string[]
   */
  public $readAdvertiserIds;
  /**
   * @var string
   */
  public $readWriteAdvertiserId;
  /**
   * @var string
   */
  public $readWritePartnerId;
  protected $statusType = GuaranteedOrderStatus::class;
  protected $statusDataType = '';
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setDefaultAdvertiserId($defaultAdvertiserId)
  {
    $this->defaultAdvertiserId = $defaultAdvertiserId;
  }
  /**
   * @return string
   */
  public function getDefaultAdvertiserId()
  {
    return $this->defaultAdvertiserId;
  }
  /**
   * @param string
   */
  public function setDefaultCampaignId($defaultCampaignId)
  {
    $this->defaultCampaignId = $defaultCampaignId;
  }
  /**
   * @return string
   */
  public function getDefaultCampaignId()
  {
    return $this->defaultCampaignId;
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
  public function setExchange($exchange)
  {
    $this->exchange = $exchange;
  }
  /**
   * @return string
   */
  public function getExchange()
  {
    return $this->exchange;
  }
  /**
   * @param string
   */
  public function setGuaranteedOrderId($guaranteedOrderId)
  {
    $this->guaranteedOrderId = $guaranteedOrderId;
  }
  /**
   * @return string
   */
  public function getGuaranteedOrderId()
  {
    return $this->guaranteedOrderId;
  }
  /**
   * @param string
   */
  public function setLegacyGuaranteedOrderId($legacyGuaranteedOrderId)
  {
    $this->legacyGuaranteedOrderId = $legacyGuaranteedOrderId;
  }
  /**
   * @return string
   */
  public function getLegacyGuaranteedOrderId()
  {
    return $this->legacyGuaranteedOrderId;
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
  public function setPublisherName($publisherName)
  {
    $this->publisherName = $publisherName;
  }
  /**
   * @return string
   */
  public function getPublisherName()
  {
    return $this->publisherName;
  }
  /**
   * @param bool
   */
  public function setReadAccessInherited($readAccessInherited)
  {
    $this->readAccessInherited = $readAccessInherited;
  }
  /**
   * @return bool
   */
  public function getReadAccessInherited()
  {
    return $this->readAccessInherited;
  }
  /**
   * @param string[]
   */
  public function setReadAdvertiserIds($readAdvertiserIds)
  {
    $this->readAdvertiserIds = $readAdvertiserIds;
  }
  /**
   * @return string[]
   */
  public function getReadAdvertiserIds()
  {
    return $this->readAdvertiserIds;
  }
  /**
   * @param string
   */
  public function setReadWriteAdvertiserId($readWriteAdvertiserId)
  {
    $this->readWriteAdvertiserId = $readWriteAdvertiserId;
  }
  /**
   * @return string
   */
  public function getReadWriteAdvertiserId()
  {
    return $this->readWriteAdvertiserId;
  }
  /**
   * @param string
   */
  public function setReadWritePartnerId($readWritePartnerId)
  {
    $this->readWritePartnerId = $readWritePartnerId;
  }
  /**
   * @return string
   */
  public function getReadWritePartnerId()
  {
    return $this->readWritePartnerId;
  }
  /**
   * @param GuaranteedOrderStatus
   */
  public function setStatus(GuaranteedOrderStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return GuaranteedOrderStatus
   */
  public function getStatus()
  {
    return $this->status;
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
class_alias(GuaranteedOrder::class, 'Google_Service_DisplayVideo_GuaranteedOrder');
