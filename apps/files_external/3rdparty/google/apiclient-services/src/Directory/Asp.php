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

namespace Google\Service\Directory;

class Asp extends \Google\Model
{
  /**
   * @var int
   */
  public $codeId;
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $lastTimeUsed;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $userKey;

  /**
   * @param int
   */
  public function setCodeId($codeId)
  {
    $this->codeId = $codeId;
  }
  /**
   * @return int
   */
  public function getCodeId()
  {
    return $this->codeId;
  }
  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLastTimeUsed($lastTimeUsed)
  {
    $this->lastTimeUsed = $lastTimeUsed;
  }
  /**
   * @return string
   */
  public function getLastTimeUsed()
  {
    return $this->lastTimeUsed;
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
  public function setUserKey($userKey)
  {
    $this->userKey = $userKey;
  }
  /**
   * @return string
   */
  public function getUserKey()
  {
    return $this->userKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Asp::class, 'Google_Service_Directory_Asp');
