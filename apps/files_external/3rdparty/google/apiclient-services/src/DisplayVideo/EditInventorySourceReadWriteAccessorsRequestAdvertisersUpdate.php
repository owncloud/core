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

namespace Google\Service\DisplayVideo;

class EditInventorySourceReadWriteAccessorsRequestAdvertisersUpdate extends \Google\Collection
{
  protected $collection_key = 'removedAdvertisers';
  /**
   * @var string[]
   */
  public $addedAdvertisers;
  /**
   * @var string[]
   */
  public $removedAdvertisers;

  /**
   * @param string[]
   */
  public function setAddedAdvertisers($addedAdvertisers)
  {
    $this->addedAdvertisers = $addedAdvertisers;
  }
  /**
   * @return string[]
   */
  public function getAddedAdvertisers()
  {
    return $this->addedAdvertisers;
  }
  /**
   * @param string[]
   */
  public function setRemovedAdvertisers($removedAdvertisers)
  {
    $this->removedAdvertisers = $removedAdvertisers;
  }
  /**
   * @return string[]
   */
  public function getRemovedAdvertisers()
  {
    return $this->removedAdvertisers;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EditInventorySourceReadWriteAccessorsRequestAdvertisersUpdate::class, 'Google_Service_DisplayVideo_EditInventorySourceReadWriteAccessorsRequestAdvertisersUpdate');
