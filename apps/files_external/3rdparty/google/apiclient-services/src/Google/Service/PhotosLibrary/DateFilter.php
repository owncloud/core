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

class Google_Service_PhotosLibrary_DateFilter extends Google_Collection
{
  protected $collection_key = 'ranges';
  protected $datesType = 'Google_Service_PhotosLibrary_Date';
  protected $datesDataType = 'array';
  protected $rangesType = 'Google_Service_PhotosLibrary_DateRange';
  protected $rangesDataType = 'array';

  /**
   * @param Google_Service_PhotosLibrary_Date
   */
  public function setDates($dates)
  {
    $this->dates = $dates;
  }
  /**
   * @return Google_Service_PhotosLibrary_Date
   */
  public function getDates()
  {
    return $this->dates;
  }
  /**
   * @param Google_Service_PhotosLibrary_DateRange
   */
  public function setRanges($ranges)
  {
    $this->ranges = $ranges;
  }
  /**
   * @return Google_Service_PhotosLibrary_DateRange
   */
  public function getRanges()
  {
    return $this->ranges;
  }
}
