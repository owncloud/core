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

namespace Google\Service\CloudSearch;

class DataSourceIndexStats extends \Google\Collection
{
  protected $collection_key = 'itemCountByStatus';
  protected $dateType = Date::class;
  protected $dateDataType = '';
  protected $itemCountByStatusType = ItemCountByStatus::class;
  protected $itemCountByStatusDataType = 'array';

  /**
   * @param Date
   */
  public function setDate(Date $date)
  {
    $this->date = $date;
  }
  /**
   * @return Date
   */
  public function getDate()
  {
    return $this->date;
  }
  /**
   * @param ItemCountByStatus[]
   */
  public function setItemCountByStatus($itemCountByStatus)
  {
    $this->itemCountByStatus = $itemCountByStatus;
  }
  /**
   * @return ItemCountByStatus[]
   */
  public function getItemCountByStatus()
  {
    return $this->itemCountByStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DataSourceIndexStats::class, 'Google_Service_CloudSearch_DataSourceIndexStats');
