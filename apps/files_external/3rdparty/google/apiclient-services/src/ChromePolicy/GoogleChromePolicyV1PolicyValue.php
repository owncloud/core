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

namespace Google\Service\ChromePolicy;

class GoogleChromePolicyV1PolicyValue extends \Google\Model
{
  /**
   * @var string
   */
  public $policySchema;
  /**
   * @var array[]
   */
  public $value;

  /**
   * @param string
   */
  public function setPolicySchema($policySchema)
  {
    $this->policySchema = $policySchema;
  }
  /**
   * @return string
   */
  public function getPolicySchema()
  {
    return $this->policySchema;
  }
  /**
   * @param array[]
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return array[]
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromePolicyV1PolicyValue::class, 'Google_Service_ChromePolicy_GoogleChromePolicyV1PolicyValue');
