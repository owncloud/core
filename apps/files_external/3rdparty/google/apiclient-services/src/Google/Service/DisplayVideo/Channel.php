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

class Google_Service_DisplayVideo_Channel extends Google_Model
{
  public $advertiserId;
  public $channelId;
  public $displayName;
  public $name;
  public $negativelyTargetedLineItemCount;
  public $partnerId;
  public $positivelyTargetedLineItemCount;

  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  public function setChannelId($channelId)
  {
    $this->channelId = $channelId;
  }
  public function getChannelId()
  {
    return $this->channelId;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNegativelyTargetedLineItemCount($negativelyTargetedLineItemCount)
  {
    $this->negativelyTargetedLineItemCount = $negativelyTargetedLineItemCount;
  }
  public function getNegativelyTargetedLineItemCount()
  {
    return $this->negativelyTargetedLineItemCount;
  }
  public function setPartnerId($partnerId)
  {
    $this->partnerId = $partnerId;
  }
  public function getPartnerId()
  {
    return $this->partnerId;
  }
  public function setPositivelyTargetedLineItemCount($positivelyTargetedLineItemCount)
  {
    $this->positivelyTargetedLineItemCount = $positivelyTargetedLineItemCount;
  }
  public function getPositivelyTargetedLineItemCount()
  {
    return $this->positivelyTargetedLineItemCount;
  }
}
