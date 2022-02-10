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

namespace Google\Service\DoubleClickBidManager;

class Parameters extends \Google\Collection
{
  protected $collection_key = 'metrics';
  protected $filtersType = FilterPair::class;
  protected $filtersDataType = 'array';
  /**
   * @var string[]
   */
  public $groupBys;
  /**
   * @var bool
   */
  public $includeInviteData;
  /**
   * @var string[]
   */
  public $metrics;
  protected $optionsType = Options::class;
  protected $optionsDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param FilterPair[]
   */
  public function setFilters($filters)
  {
    $this->filters = $filters;
  }
  /**
   * @return FilterPair[]
   */
  public function getFilters()
  {
    return $this->filters;
  }
  /**
   * @param string[]
   */
  public function setGroupBys($groupBys)
  {
    $this->groupBys = $groupBys;
  }
  /**
   * @return string[]
   */
  public function getGroupBys()
  {
    return $this->groupBys;
  }
  /**
   * @param bool
   */
  public function setIncludeInviteData($includeInviteData)
  {
    $this->includeInviteData = $includeInviteData;
  }
  /**
   * @return bool
   */
  public function getIncludeInviteData()
  {
    return $this->includeInviteData;
  }
  /**
   * @param string[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return string[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param Options
   */
  public function setOptions(Options $options)
  {
    $this->options = $options;
  }
  /**
   * @return Options
   */
  public function getOptions()
  {
    return $this->options;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Parameters::class, 'Google_Service_DoubleClickBidManager_Parameters');
