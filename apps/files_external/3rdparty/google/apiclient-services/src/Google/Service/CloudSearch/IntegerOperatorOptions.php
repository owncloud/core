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

class Google_Service_CloudSearch_IntegerOperatorOptions extends Google_Model
{
  public $greaterThanOperatorName;
  public $lessThanOperatorName;
  public $operatorName;

  public function setGreaterThanOperatorName($greaterThanOperatorName)
  {
    $this->greaterThanOperatorName = $greaterThanOperatorName;
  }
  public function getGreaterThanOperatorName()
  {
    return $this->greaterThanOperatorName;
  }
  public function setLessThanOperatorName($lessThanOperatorName)
  {
    $this->lessThanOperatorName = $lessThanOperatorName;
  }
  public function getLessThanOperatorName()
  {
    return $this->lessThanOperatorName;
  }
  public function setOperatorName($operatorName)
  {
    $this->operatorName = $operatorName;
  }
  public function getOperatorName()
  {
    return $this->operatorName;
  }
}
