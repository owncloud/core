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

class Google_Service_CloudRun_EnvVar extends Google_Model
{
  public $name;
  public $value;
  protected $valueFromType = 'Google_Service_CloudRun_EnvVarSource';
  protected $valueFromDataType = '';

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setValue($value)
  {
    $this->value = $value;
  }
  public function getValue()
  {
    return $this->value;
  }
  /**
   * @param Google_Service_CloudRun_EnvVarSource
   */
  public function setValueFrom(Google_Service_CloudRun_EnvVarSource $valueFrom)
  {
    $this->valueFrom = $valueFrom;
  }
  /**
   * @return Google_Service_CloudRun_EnvVarSource
   */
  public function getValueFrom()
  {
    return $this->valueFrom;
  }
}
