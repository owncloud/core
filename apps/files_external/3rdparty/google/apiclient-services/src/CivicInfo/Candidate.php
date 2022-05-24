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
  /**
   * @var string
   */
  public $candidateUrl;
  protected $channelsType = Channel::class;
  protected $channelsDataType = 'array';
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $orderOnBallot;
  /**
   * @var string
   */
  public $party;
  /**
   * @var string
   */
  public $phone;
  /**
   * @var string
   */
  public $photoUrl;

  /**
   * @param string
   */
  public function setCandidateUrl($candidateUrl)
  {
    $this->candidateUrl = $candidateUrl;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
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
  public function setOrderOnBallot($orderOnBallot)
  {
    $this->orderOnBallot = $orderOnBallot;
  }
  /**
   * @return string
   */
  public function getOrderOnBallot()
  {
    return $this->orderOnBallot;
  }
  /**
   * @param string
   */
  public function setParty($party)
  {
    $this->party = $party;
  }
  /**
   * @return string
   */
  public function getParty()
  {
    return $this->party;
  }
  /**
   * @param string
   */
  public function setPhone($phone)
  {
    $this->phone = $phone;
  }
  /**
   * @return string
   */
  public function getPhone()
  {
    return $this->phone;
  }
  /**
   * @param string
   */
  public function setPhotoUrl($photoUrl)
  {
    $this->photoUrl = $photoUrl;
  }
  /**
   * @return string
   */
  public function getPhotoUrl()
  {
    return $this->photoUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Candidate::class, 'Google_Service_CivicInfo_Candidate');
