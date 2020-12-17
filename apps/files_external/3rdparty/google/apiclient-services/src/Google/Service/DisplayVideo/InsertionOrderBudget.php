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

class Google_Service_DisplayVideo_InsertionOrderBudget extends Google_Collection
{
  protected $collection_key = 'budgetSegments';
  public $automationType;
  protected $budgetSegmentsType = 'Google_Service_DisplayVideo_InsertionOrderBudgetSegment';
  protected $budgetSegmentsDataType = 'array';
  public $budgetUnit;

  public function setAutomationType($automationType)
  {
    $this->automationType = $automationType;
  }
  public function getAutomationType()
  {
    return $this->automationType;
  }
  /**
   * @param Google_Service_DisplayVideo_InsertionOrderBudgetSegment[]
   */
  public function setBudgetSegments($budgetSegments)
  {
    $this->budgetSegments = $budgetSegments;
  }
  /**
   * @return Google_Service_DisplayVideo_InsertionOrderBudgetSegment[]
   */
  public function getBudgetSegments()
  {
    return $this->budgetSegments;
  }
  public function setBudgetUnit($budgetUnit)
  {
    $this->budgetUnit = $budgetUnit;
  }
  public function getBudgetUnit()
  {
    return $this->budgetUnit;
  }
}
