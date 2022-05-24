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

namespace Google\Service\Compute;

class ForwardingRulesScopedList extends \Google\Collection
{
  protected $collection_key = 'forwardingRules';
  protected $forwardingRulesType = ForwardingRule::class;
  protected $forwardingRulesDataType = 'array';
  protected $warningType = ForwardingRulesScopedListWarning::class;
  protected $warningDataType = '';

  /**
   * @param ForwardingRule[]
   */
  public function setForwardingRules($forwardingRules)
  {
    $this->forwardingRules = $forwardingRules;
  }
  /**
   * @return ForwardingRule[]
   */
  public function getForwardingRules()
  {
    return $this->forwardingRules;
  }
  /**
   * @param ForwardingRulesScopedListWarning
   */
  public function setWarning(ForwardingRulesScopedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return ForwardingRulesScopedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ForwardingRulesScopedList::class, 'Google_Service_Compute_ForwardingRulesScopedList');
