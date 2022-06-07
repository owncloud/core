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

class CustomEmoji extends \Google\Model
{
  /**
   * @var string
   */
  public $blobId;
  /**
   * @var string
   */
  public $contentType;
  /**
   * @var string
   */
  public $createTimeMicros;
  protected $creatorUserIdType = UserId::class;
  protected $creatorUserIdDataType = '';
  /**
   * @var string
   */
  public $deleteTimeMicros;
  /**
   * @var string
   */
  public $ephemeralUrl;
  protected $ownerCustomerIdType = CustomerId::class;
  protected $ownerCustomerIdDataType = '';
  /**
   * @var string
   */
  public $readToken;
  /**
   * @var string
   */
  public $shortcode;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $updateTimeMicros;
  /**
   * @var string
   */
  public $uuid;

  /**
   * @param string
   */
  public function setBlobId($blobId)
  {
    $this->blobId = $blobId;
  }
  /**
   * @return string
   */
  public function getBlobId()
  {
    return $this->blobId;
  }
  /**
   * @param string
   */
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  /**
   * @return string
   */
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param string
   */
  public function setCreateTimeMicros($createTimeMicros)
  {
    $this->createTimeMicros = $createTimeMicros;
  }
  /**
   * @return string
   */
  public function getCreateTimeMicros()
  {
    return $this->createTimeMicros;
  }
  /**
   * @param UserId
   */
  public function setCreatorUserId(UserId $creatorUserId)
  {
    $this->creatorUserId = $creatorUserId;
  }
  /**
   * @return UserId
   */
  public function getCreatorUserId()
  {
    return $this->creatorUserId;
  }
  /**
   * @param string
   */
  public function setDeleteTimeMicros($deleteTimeMicros)
  {
    $this->deleteTimeMicros = $deleteTimeMicros;
  }
  /**
   * @return string
   */
  public function getDeleteTimeMicros()
  {
    return $this->deleteTimeMicros;
  }
  /**
   * @param string
   */
  public function setEphemeralUrl($ephemeralUrl)
  {
    $this->ephemeralUrl = $ephemeralUrl;
  }
  /**
   * @return string
   */
  public function getEphemeralUrl()
  {
    return $this->ephemeralUrl;
  }
  /**
   * @param CustomerId
   */
  public function setOwnerCustomerId(CustomerId $ownerCustomerId)
  {
    $this->ownerCustomerId = $ownerCustomerId;
  }
  /**
   * @return CustomerId
   */
  public function getOwnerCustomerId()
  {
    return $this->ownerCustomerId;
  }
  /**
   * @param string
   */
  public function setReadToken($readToken)
  {
    $this->readToken = $readToken;
  }
  /**
   * @return string
   */
  public function getReadToken()
  {
    return $this->readToken;
  }
  /**
   * @param string
   */
  public function setShortcode($shortcode)
  {
    $this->shortcode = $shortcode;
  }
  /**
   * @return string
   */
  public function getShortcode()
  {
    return $this->shortcode;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setUpdateTimeMicros($updateTimeMicros)
  {
    $this->updateTimeMicros = $updateTimeMicros;
  }
  /**
   * @return string
   */
  public function getUpdateTimeMicros()
  {
    return $this->updateTimeMicros;
  }
  /**
   * @param string
   */
  public function setUuid($uuid)
  {
    $this->uuid = $uuid;
  }
  /**
   * @return string
   */
  public function getUuid()
  {
    return $this->uuid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomEmoji::class, 'Google_Service_CloudSearch_CustomEmoji');
