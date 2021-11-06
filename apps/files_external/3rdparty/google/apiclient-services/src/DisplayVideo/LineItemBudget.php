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
  public $budgetAllocationType;
  public $budgetUnit;
  public $maxAmount;

  public function setBudgetAllocationType($budgetAllocationType)
  {
    $this->budgetAllocationType = $budgetAllocationType;
  }
  public function getBudgetAllocationType()
  {
    return $this->budgetAllocationType;
  }
  public function setBudgetUnit($budgetUnit)
  {
    $this->budgetUnit = $budgetUnit;
  }
  public function getBudgetUnit()
  {
    return $this->budgetUnit;
  }
  public function setMaxAmount($maxAmount)
  {
    $this->maxAmount = $maxAmount;
  }
  public function getMaxAmount()
  {
    return $this->maxAmount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LineItemBudget::class, 'Google_Service_DisplayVideo_LineItemBudget');
