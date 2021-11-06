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

namespace Google\Service\PubsubLite;

class PartitionCursor extends \Google\Model
{
  protected $cursorType = Cursor::class;
  protected $cursorDataType = '';
  public $partition;

  /**
   * @param Cursor
   */
  public function setCursor(Cursor $cursor)
  {
    $this->cursor = $cursor;
  }
  /**
   * @return Cursor
   */
  public function getCursor()
  {
    return $this->cursor;
  }
  public function setPartition($partition)
  {
    $this->partition = $partition;
  }
  public function getPartition()
  {
    return $this->partition;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartitionCursor::class, 'Google_Service_PubsubLite_PartitionCursor');
