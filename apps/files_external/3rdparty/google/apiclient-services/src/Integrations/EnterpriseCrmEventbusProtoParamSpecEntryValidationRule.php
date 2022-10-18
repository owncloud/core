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

namespace Google\Service\Integrations;

class EnterpriseCrmEventbusProtoParamSpecEntryValidationRule extends \Google\Model
{
  protected $doubleRangeType = EnterpriseCrmEventbusProtoParamSpecEntryValidationRuleDoubleRange::class;
  protected $doubleRangeDataType = '';
  protected $intRangeType = EnterpriseCrmEventbusProtoParamSpecEntryValidationRuleIntRange::class;
  protected $intRangeDataType = '';
  protected $stringRegexType = EnterpriseCrmEventbusProtoParamSpecEntryValidationRuleStringRegex::class;
  protected $stringRegexDataType = '';

  /**
   * @param EnterpriseCrmEventbusProtoParamSpecEntryValidationRuleDoubleRange
   */
  public function setDoubleRange(EnterpriseCrmEventbusProtoParamSpecEntryValidationRuleDoubleRange $doubleRange)
  {
    $this->doubleRange = $doubleRange;
  }
  /**
   * @return EnterpriseCrmEventbusProtoParamSpecEntryValidationRuleDoubleRange
   */
  public function getDoubleRange()
  {
    return $this->doubleRange;
  }
  /**
   * @param EnterpriseCrmEventbusProtoParamSpecEntryValidationRuleIntRange
   */
  public function setIntRange(EnterpriseCrmEventbusProtoParamSpecEntryValidationRuleIntRange $intRange)
  {
    $this->intRange = $intRange;
  }
  /**
   * @return EnterpriseCrmEventbusProtoParamSpecEntryValidationRuleIntRange
   */
  public function getIntRange()
  {
    return $this->intRange;
  }
  /**
   * @param EnterpriseCrmEventbusProtoParamSpecEntryValidationRuleStringRegex
   */
  public function setStringRegex(EnterpriseCrmEventbusProtoParamSpecEntryValidationRuleStringRegex $stringRegex)
  {
    $this->stringRegex = $stringRegex;
  }
  /**
   * @return EnterpriseCrmEventbusProtoParamSpecEntryValidationRuleStringRegex
   */
  public function getStringRegex()
  {
    return $this->stringRegex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoParamSpecEntryValidationRule::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoParamSpecEntryValidationRule');
