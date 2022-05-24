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

namespace Google\Service\AnalyticsReporting;

class CohortGroup extends \Google\Collection
{
  protected $collection_key = 'cohorts';
  protected $cohortsType = Cohort::class;
  protected $cohortsDataType = 'array';
  /**
   * @var bool
   */
  public $lifetimeValue;

  /**
   * @param Cohort[]
   */
  public function setCohorts($cohorts)
  {
    $this->cohorts = $cohorts;
  }
  /**
   * @return Cohort[]
   */
  public function getCohorts()
  {
    return $this->cohorts;
  }
  /**
   * @param bool
   */
  public function setLifetimeValue($lifetimeValue)
  {
    $this->lifetimeValue = $lifetimeValue;
  }
  /**
   * @return bool
   */
  public function getLifetimeValue()
  {
    return $this->lifetimeValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CohortGroup::class, 'Google_Service_AnalyticsReporting_CohortGroup');
