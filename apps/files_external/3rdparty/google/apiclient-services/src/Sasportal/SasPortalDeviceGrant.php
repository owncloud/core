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

namespace Google\Service\Sasportal;

class SasPortalDeviceGrant extends \Google\Collection
{
  protected $collection_key = 'suspensionReason';
  /**
   * @var string
   */
  public $channelType;
  /**
   * @var string
   */
  public $expireTime;
  protected $frequencyRangeType = SasPortalFrequencyRange::class;
  protected $frequencyRangeDataType = '';
  /**
   * @var string
   */
  public $grantId;
  /**
   * @var string
   */
  public $lastHeartbeatTransmitExpireTime;
  public $maxEirp;
  protected $moveListType = SasPortalDpaMoveList::class;
  protected $moveListDataType = 'array';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string[]
   */
  public $suspensionReason;

  /**
   * @param string
   */
  public function setChannelType($channelType)
  {
    $this->channelType = $channelType;
  }
  /**
   * @return string
   */
  public function getChannelType()
  {
    return $this->channelType;
  }
  /**
   * @param string
   */
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  /**
   * @return string
   */
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  /**
   * @param SasPortalFrequencyRange
   */
  public function setFrequencyRange(SasPortalFrequencyRange $frequencyRange)
  {
    $this->frequencyRange = $frequencyRange;
  }
  /**
   * @return SasPortalFrequencyRange
   */
  public function getFrequencyRange()
  {
    return $this->frequencyRange;
  }
  /**
   * @param string
   */
  public function setGrantId($grantId)
  {
    $this->grantId = $grantId;
  }
  /**
   * @return string
   */
  public function getGrantId()
  {
    return $this->grantId;
  }
  /**
   * @param string
   */
  public function setLastHeartbeatTransmitExpireTime($lastHeartbeatTransmitExpireTime)
  {
    $this->lastHeartbeatTransmitExpireTime = $lastHeartbeatTransmitExpireTime;
  }
  /**
   * @return string
   */
  public function getLastHeartbeatTransmitExpireTime()
  {
    return $this->lastHeartbeatTransmitExpireTime;
  }
  public function setMaxEirp($maxEirp)
  {
    $this->maxEirp = $maxEirp;
  }
  public function getMaxEirp()
  {
    return $this->maxEirp;
  }
  /**
   * @param SasPortalDpaMoveList[]
   */
  public function setMoveList($moveList)
  {
    $this->moveList = $moveList;
  }
  /**
   * @return SasPortalDpaMoveList[]
   */
  public function getMoveList()
  {
    return $this->moveList;
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
   * @param string[]
   */
  public function setSuspensionReason($suspensionReason)
  {
    $this->suspensionReason = $suspensionReason;
  }
  /**
   * @return string[]
   */
  public function getSuspensionReason()
  {
    return $this->suspensionReason;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SasPortalDeviceGrant::class, 'Google_Service_Sasportal_SasPortalDeviceGrant');
