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

namespace Google\Service\Forms;

class CreateItemRequest extends \Google\Model
{
  protected $itemType = Item::class;
  protected $itemDataType = '';
  protected $locationType = Location::class;
  protected $locationDataType = '';

  /**
   * @param Item
   */
  public function setItem(Item $item)
  {
    $this->item = $item;
  }
  /**
   * @return Item
   */
  public function getItem()
  {
    return $this->item;
  }
  /**
   * @param Location
   */
  public function setLocation(Location $location)
  {
    $this->location = $location;
  }
  /**
   * @return Location
   */
  public function getLocation()
  {
    return $this->location;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreateItemRequest::class, 'Google_Service_Forms_CreateItemRequest');
