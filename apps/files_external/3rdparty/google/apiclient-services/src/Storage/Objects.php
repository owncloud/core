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

namespace Google\Service\Storage;

class Objects extends \Google\Collection
{
  protected $collection_key = 'prefixes';
  protected $itemsType = StorageObject::class;
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;
  public $prefixes;

  /**
   * @param StorageObject[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return StorageObject[]
   */
  public function getItems()
  {
    return $this->items;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  public function setPrefixes($prefixes)
  {
    $this->prefixes = $prefixes;
  }
  public function getPrefixes()
  {
    return $this->prefixes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Objects::class, 'Google_Service_Storage_Objects');
