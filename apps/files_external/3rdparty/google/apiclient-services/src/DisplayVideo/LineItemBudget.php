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

namespace Google\Service\DisplayVideo;

class LineItemBudget extends \Google\Model
{
  /**
   * @var string
   */
  public $budgetAllocationType;
  /**
   * @var string
   */
  public $budgetUnit;
  /**
   * @var string
   */
  public $maxAmount;

  /**
   * @param string
   */
  public function setBudgetAllocationType($budgetAllocationType)
  {
    $this->budgetAllocationType = $budgetAllocationType;
  }
  /**
   * @return string
   */
  public function getBudgetAllocationType()
  {
    return $this->budgetAllocationType;
  }
  /**
   * @param string
   */
  public function setBudgetUnit($budgetUnit)
  {
    $this->budgetUnit = $budgetUnit;
  }
  /**
   * @return string
   */
  public function getBudgetUnit()
  {
    return $this->budgetUnit;
  }
  /**
   * @param string
   */
  public function setMaxAmount($maxAmount)
  {
    $this->maxAmount = $maxAmount;
  }
  /**
   * @return string
   */
  public function getMaxAmount()
  {
    return $this->maxAmount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LineItemBudget::class, 'Google_Service_DisplayVideo_LineItemBudget');
