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

namespace Google\Service\Dataproc;

class ParameterValidation extends \Google\Model
{
  protected $regexType = RegexValidation::class;
  protected $regexDataType = '';
  protected $valuesType = ValueValidation::class;
  protected $valuesDataType = '';

  /**
   * @param RegexValidation
   */
  public function setRegex(RegexValidation $regex)
  {
    $this->regex = $regex;
  }
  /**
   * @return RegexValidation
   */
  public function getRegex()
  {
    return $this->regex;
  }
  /**
   * @param ValueValidation
   */
  public function setValues(ValueValidation $values)
  {
    $this->values = $values;
  }
  /**
   * @return ValueValidation
   */
  public function getValues()
  {
    return $this->values;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ParameterValidation::class, 'Google_Service_Dataproc_ParameterValidation');
