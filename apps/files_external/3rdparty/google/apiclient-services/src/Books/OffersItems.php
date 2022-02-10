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

namespace Google\Service\Books;

class OffersItems extends \Google\Collection
{
  protected $collection_key = 'items';
  /**
   * @var string
   */
  public $artUrl;
  /**
   * @var string
   */
  public $gservicesKey;
  /**
   * @var string
   */
  public $id;
  protected $itemsType = OffersItemsItems::class;
  protected $itemsDataType = 'array';

  /**
   * @param string
   */
  public function setArtUrl($artUrl)
  {
    $this->artUrl = $artUrl;
  }
  /**
   * @return string
   */
  public function getArtUrl()
  {
    return $this->artUrl;
  }
  /**
   * @param string
   */
  public function setGservicesKey($gservicesKey)
  {
    $this->gservicesKey = $gservicesKey;
  }
  /**
   * @return string
   */
  public function getGservicesKey()
  {
    return $this->gservicesKey;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param OffersItemsItems[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return OffersItemsItems[]
   */
  public function getItems()
  {
    return $this->items;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OffersItems::class, 'Google_Service_Books_OffersItems');
