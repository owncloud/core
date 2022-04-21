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

namespace Google\Service\Datastore;

class MutationResult extends \Google\Model
{
  /**
   * @var bool
   */
  public $conflictDetected;
  protected $keyType = Key::class;
  protected $keyDataType = '';
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $version;

  /**
   * @param bool
   */
  public function setConflictDetected($conflictDetected)
  {
    $this->conflictDetected = $conflictDetected;
  }
  /**
   * @return bool
   */
  public function getConflictDetected()
  {
    return $this->conflictDetected;
  }
  /**
   * @param Key
   */
  public function setKey(Key $key)
  {
    $this->key = $key;
  }
  /**
   * @return Key
   */
  public function getKey()
  {
    return $this->key;
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
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MutationResult::class, 'Google_Service_Datastore_MutationResult');
