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

namespace Google\Service\CivicInfo;

class Candidate extends \Google\Collection
{
  protected $collection_key = 'channels';
  public $candidateUrl;
  protected $channelsType = Channel::class;
  protected $channelsDataType = 'array';
  public $email;
  public $name;
  public $orderOnBallot;
  public $party;
  public $phone;
  public $photoUrl;

  public function setCandidateUrl($candidateUrl)
  {
    $this->candidateUrl = $candidateUrl;
  }
  public function getCandidateUrl()
  {
    return $this->candidateUrl;
  }
  /**
   * @param Channel[]
   */
  public function setChannels($channels)
  {
    $this->channels = $channels;
  }
  /**
   * @return Channel[]
   */
  public function getChannels()
  {
    return $this->channels;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOrderOnBallot($orderOnBallot)
  {
    $this->orderOnBallot = $orderOnBallot;
  }
  public function getOrderOnBallot()
  {
    return $this->orderOnBallot;
  }
  public function setParty($party)
  {
    $this->party = $party;
  }
  public function getParty()
  {
    return $this->party;
  }
  public function setPhone($phone)
  {
    $this->phone = $phone;
  }
  public function getPhone()
  {
    return $this->phone;
  }
  public function setPhotoUrl($photoUrl)
  {
    $this->photoUrl = $photoUrl;
  }
  public function getPhotoUrl()
  {
    return $this->photoUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Candidate::class, 'Google_Service_CivicInfo_Candidate');
