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

class CompositeFilter extends \Google\Collection
{
  protected $collection_key = 'subFilters';
  public $logicOperator;
  protected $subFiltersType = Filter::class;
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
   * @param Filter[]
   */
  public function setSubFilters($subFilters)
  {
    $this->subFilters = $subFilters;
  }
  /**
   * @return Filter[]
   */
  public function getSubFilters()
  {
    return $this->subFilters;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CompositeFilter::class, 'Google_Service_CloudSearch_CompositeFilter');
