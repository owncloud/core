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

namespace Google\Service\CloudSupport;

class Escalation extends \Google\Model
{
  protected $actorType = Actor::class;
  protected $actorDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $justification;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $reason;

  /**
   * @param Actor
   */
  public function setActor(Actor $actor)
  {
    $this->actor = $actor;
  }
  /**
   * @return Actor
   */
  public function getActor()
  {
    return $this->actor;
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
  public function setJustification($justification)
  {
    $this->justification = $justification;
  }
  /**
   * @return string
   */
  public function getJustification()
  {
    return $this->justification;
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
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  /**
   * @return string
   */
  public function getReason()
  {
    return $this->reason;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Escalation::class, 'Google_Service_CloudSupport_Escalation');
