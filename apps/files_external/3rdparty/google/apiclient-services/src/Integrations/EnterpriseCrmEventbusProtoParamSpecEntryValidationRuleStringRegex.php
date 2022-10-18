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

class EnterpriseCrmEventbusProtoParamSpecEntryValidationRuleStringRegex extends \Google\Model
{
  /**
   * @var bool
   */
  public $exclusive;
  /**
   * @var string
   */
  public $regex;

  /**
   * @param bool
   */
  public function setExclusive($exclusive)
  {
    $this->exclusive = $exclusive;
  }
  /**
   * @return bool
   */
  public function getExclusive()
  {
    return $this->exclusive;
  }
  /**
   * @param string
   */
  public function setRegex($regex)
  {
    $this->regex = $regex;
  }
  /**
   * @return string
   */
  public function getRegex()
  {
    return $this->regex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnterpriseCrmEventbusProtoParamSpecEntryValidationRuleStringRegex::class, 'Google_Service_Integrations_EnterpriseCrmEventbusProtoParamSpecEntryValidationRuleStringRegex');
