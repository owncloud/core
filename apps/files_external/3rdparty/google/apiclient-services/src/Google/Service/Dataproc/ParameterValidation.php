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

class Google_Service_Dataproc_ParameterValidation extends Google_Model
{
  protected $regexType = 'Google_Service_Dataproc_RegexValidation';
  protected $regexDataType = '';
  protected $valuesType = 'Google_Service_Dataproc_ValueValidation';
  protected $valuesDataType = '';

  /**
   * @param Google_Service_Dataproc_RegexValidation
   */
  public function setRegex(Google_Service_Dataproc_RegexValidation $regex)
  {
    $this->regex = $regex;
  }
  /**
   * @return Google_Service_Dataproc_RegexValidation
   */
  public function getRegex()
  {
    return $this->regex;
  }
  /**
   * @param Google_Service_Dataproc_ValueValidation
   */
  public function setValues(Google_Service_Dataproc_ValueValidation $values)
  {
    $this->values = $values;
  }
  /**
   * @return Google_Service_Dataproc_ValueValidation
   */
  public function getValues()
  {
    return $this->values;
  }
}
