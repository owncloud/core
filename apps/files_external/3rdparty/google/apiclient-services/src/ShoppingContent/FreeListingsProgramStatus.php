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

namespace Google\Service\ShoppingContent;

class FreeListingsProgramStatus extends \Google\Collection
{
  protected $collection_key = 'regionStatuses';
  /**
   * @var string
   */
  public $globalState;
  protected $regionStatusesType = FreeListingsProgramStatusRegionStatus::class;
  protected $regionStatusesDataType = 'array';

  /**
   * @param string
   */
  public function setGlobalState($globalState)
  {
    $this->globalState = $globalState;
  }
  /**
   * @return string
   */
  public function getGlobalState()
  {
    return $this->globalState;
  }
  /**
   * @param FreeListingsProgramStatusRegionStatus[]
   */
  public function setRegionStatuses($regionStatuses)
  {
    $this->regionStatuses = $regionStatuses;
  }
  /**
   * @return FreeListingsProgramStatusRegionStatus[]
   */
  public function getRegionStatuses()
  {
    return $this->regionStatuses;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FreeListingsProgramStatus::class, 'Google_Service_ShoppingContent_FreeListingsProgramStatus');
