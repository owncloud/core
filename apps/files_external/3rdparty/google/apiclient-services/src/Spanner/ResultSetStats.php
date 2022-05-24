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

namespace Google\Service\Spanner;

class ResultSetStats extends \Google\Model
{
  protected $queryPlanType = QueryPlan::class;
  protected $queryPlanDataType = '';
  /**
   * @var array[]
   */
  public $queryStats;
  /**
   * @var string
   */
  public $rowCountExact;
  /**
   * @var string
   */
  public $rowCountLowerBound;

  /**
   * @param QueryPlan
   */
  public function setQueryPlan(QueryPlan $queryPlan)
  {
    $this->queryPlan = $queryPlan;
  }
  /**
   * @return QueryPlan
   */
  public function getQueryPlan()
  {
    return $this->queryPlan;
  }
  /**
   * @param array[]
   */
  public function setQueryStats($queryStats)
  {
    $this->queryStats = $queryStats;
  }
  /**
   * @return array[]
   */
  public function getQueryStats()
  {
    return $this->queryStats;
  }
  /**
   * @param string
   */
  public function setRowCountExact($rowCountExact)
  {
    $this->rowCountExact = $rowCountExact;
  }
  /**
   * @return string
   */
  public function getRowCountExact()
  {
    return $this->rowCountExact;
  }
  /**
   * @param string
   */
  public function setRowCountLowerBound($rowCountLowerBound)
  {
    $this->rowCountLowerBound = $rowCountLowerBound;
  }
  /**
   * @return string
   */
  public function getRowCountLowerBound()
  {
    return $this->rowCountLowerBound;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResultSetStats::class, 'Google_Service_Spanner_ResultSetStats');
