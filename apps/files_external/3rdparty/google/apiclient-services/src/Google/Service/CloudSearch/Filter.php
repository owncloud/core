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

class Google_Service_CloudSearch_Filter extends Google_Model
{
  protected $compositeFilterType = 'Google_Service_CloudSearch_CompositeFilter';
  protected $compositeFilterDataType = '';
  protected $valueFilterType = 'Google_Service_CloudSearch_ValueFilter';
  protected $valueFilterDataType = '';

  /**
   * @param Google_Service_CloudSearch_CompositeFilter
   */
  public function setCompositeFilter(Google_Service_CloudSearch_CompositeFilter $compositeFilter)
  {
    $this->compositeFilter = $compositeFilter;
  }
  /**
   * @return Google_Service_CloudSearch_CompositeFilter
   */
  public function getCompositeFilter()
  {
    return $this->compositeFilter;
  }
  /**
   * @param Google_Service_CloudSearch_ValueFilter
   */
  public function setValueFilter(Google_Service_CloudSearch_ValueFilter $valueFilter)
  {
    $this->valueFilter = $valueFilter;
  }
  /**
   * @return Google_Service_CloudSearch_ValueFilter
   */
  public function getValueFilter()
  {
    return $this->valueFilter;
  }
}
