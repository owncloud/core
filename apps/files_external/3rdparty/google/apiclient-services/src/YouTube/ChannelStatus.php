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

namespace Google\Service\YouTube;

class ChannelStatus extends \Google\Model
{
  public $isLinked;
  public $longUploadsStatus;
  public $madeForKids;
  public $privacyStatus;
  public $selfDeclaredMadeForKids;

  public function setIsLinked($isLinked)
  {
    $this->isLinked = $isLinked;
  }
  public function getIsLinked()
  {
    return $this->isLinked;
  }
  public function setLongUploadsStatus($longUploadsStatus)
  {
    $this->longUploadsStatus = $longUploadsStatus;
  }
  public function getLongUploadsStatus()
  {
    return $this->longUploadsStatus;
  }
  public function setMadeForKids($madeForKids)
  {
    $this->madeForKids = $madeForKids;
  }
  public function getMadeForKids()
  {
    return $this->madeForKids;
  }
  public function setPrivacyStatus($privacyStatus)
  {
    $this->privacyStatus = $privacyStatus;
  }
  public function getPrivacyStatus()
  {
    return $this->privacyStatus;
  }
  public function setSelfDeclaredMadeForKids($selfDeclaredMadeForKids)
  {
    $this->selfDeclaredMadeForKids = $selfDeclaredMadeForKids;
  }
  public function getSelfDeclaredMadeForKids()
  {
    return $this->selfDeclaredMadeForKids;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChannelStatus::class, 'Google_Service_YouTube_ChannelStatus');
