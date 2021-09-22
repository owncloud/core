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

namespace Google\Service\CloudRun;

class StatusDetails extends \Google\Collection
{
  protected $collection_key = 'causes';
  protected $causesType = StatusCause::class;
  protected $causesDataType = 'array';
  public $group;
  public $kind;
  public $name;
  public $retryAfterSeconds;
  public $uid;

  /**
   * @param StatusCause[]
   */
  public function setCauses($causes)
  {
    $this->causes = $causes;
  }
  /**
   * @return StatusCause[]
   */
  public function getCauses()
  {
    return $this->causes;
  }
  public function setGroup($group)
  {
    $this->group = $group;
  }
  public function getGroup()
  {
    return $this->group;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRetryAfterSeconds($retryAfterSeconds)
  {
    $this->retryAfterSeconds = $retryAfterSeconds;
  }
  public function getRetryAfterSeconds()
  {
    return $this->retryAfterSeconds;
  }
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  public function getUid()
  {
    return $this->uid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StatusDetails::class, 'Google_Service_CloudRun_StatusDetails');
