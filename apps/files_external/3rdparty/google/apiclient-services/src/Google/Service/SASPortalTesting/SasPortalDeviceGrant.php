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

class Google_Service_SASPortalTesting_SasPortalDeviceGrant extends Google_Collection
{
  protected $collection_key = 'moveList';
  public $channelType;
  public $expireTime;
  protected $frequencyRangeType = 'Google_Service_SASPortalTesting_SasPortalFrequencyRange';
  protected $frequencyRangeDataType = '';
  public $maxEirp;
  protected $moveListType = 'Google_Service_SASPortalTesting_SasPortalDpaMoveList';
  protected $moveListDataType = 'array';
  public $state;

  public function setChannelType($channelType)
  {
    $this->channelType = $channelType;
  }
  public function getChannelType()
  {
    return $this->channelType;
  }
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  /**
   * @param Google_Service_SASPortalTesting_SasPortalFrequencyRange
   */
  public function setFrequencyRange(Google_Service_SASPortalTesting_SasPortalFrequencyRange $frequencyRange)
  {
    $this->frequencyRange = $frequencyRange;
  }
  /**
   * @return Google_Service_SASPortalTesting_SasPortalFrequencyRange
   */
  public function getFrequencyRange()
  {
    return $this->frequencyRange;
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
   * @param Google_Service_SASPortalTesting_SasPortalDpaMoveList
   */
  public function setMoveList($moveList)
  {
    $this->moveList = $moveList;
  }
  /**
   * @return Google_Service_SASPortalTesting_SasPortalDpaMoveList
   */
  public function getMoveList()
  {
    return $this->moveList;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
