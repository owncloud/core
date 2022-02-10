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

namespace Google\Service\Drive;

class ChangeList extends \Google\Collection
{
  protected $collection_key = 'changes';
  protected $changesType = Change::class;
  protected $changesDataType = 'array';
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $newStartPageToken;
  /**
   * @var string
   */
  public $nextPageToken;

  /**
   * @param Change[]
   */
  public function setChanges($changes)
  {
    $this->changes = $changes;
  }
  /**
   * @return Change[]
   */
  public function getChanges()
  {
    return $this->changes;
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
  public function setNewStartPageToken($newStartPageToken)
  {
    $this->newStartPageToken = $newStartPageToken;
  }
  /**
   * @return string
   */
  public function getNewStartPageToken()
  {
    return $this->newStartPageToken;
  }
  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChangeList::class, 'Google_Service_Drive_ChangeList');
