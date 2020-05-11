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

class Google_Service_CloudSearch_CompositeFilter extends Google_Collection
{
  protected $collection_key = 'subFilters';
  public $logicOperator;
  protected $subFiltersType = 'Google_Service_CloudSearch_Filter';
  protected $subFiltersDataType = 'array';

  public function setLogicOperator($logicOperator)
  {
    $this->logicOperator = $logicOperator;
  }
  public function getLogicOperator()
  {
    return $this->logicOperator;
  }
  /**
   * @param Google_Service_CloudSearch_Filter
   */
  public function setSubFilters($subFilters)
  {
    $this->subFilters = $subFilters;
  }
  /**
   * @return Google_Service_CloudSearch_Filter
   */
  public function getSubFilters()
  {
    return $this->subFilters;
  }
}
