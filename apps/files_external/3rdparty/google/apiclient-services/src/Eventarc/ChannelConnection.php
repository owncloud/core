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

namespace Google\Service\Eventarc;

class ChannelConnection extends \Google\Model
{
  /**
   * @var string
   */
  public $activationToken;
  /**
   * @var string
   */
  public $channel;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $uid;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setActivationToken($activationToken)
  {
    $this->activationToken = $activationToken;
  }
  /**
   * @return string
   */
  public function getActivationToken()
  {
    return $this->activationToken;
  }
  /**
   * @param string
   */
  public function setChannel($channel)
  {
    $this->channel = $channel;
  }
  /**
   * @return string
   */
  public function getChannel()
  {
    return $this->channel;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
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
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
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
class_alias(ChannelConnection::class, 'Google_Service_Eventarc_ChannelConnection');
