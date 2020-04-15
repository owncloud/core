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

class Google_Service_Bigquery_Argument extends Google_Model
{
  public $argumentKind;
  protected $dataTypeType = 'Google_Service_Bigquery_StandardSqlDataType';
  protected $dataTypeDataType = '';
  public $mode;
  public $name;

  public function setArgumentKind($argumentKind)
  {
    $this->argumentKind = $argumentKind;
  }
  public function getArgumentKind()
  {
    return $this->argumentKind;
  }
  /**
   * @param Google_Service_Bigquery_StandardSqlDataType
   */
  public function setDataType(Google_Service_Bigquery_StandardSqlDataType $dataType)
  {
    $this->dataType = $dataType;
  }
  /**
   * @return Google_Service_Bigquery_StandardSqlDataType
   */
  public function getDataType()
  {
    return $this->dataType;
  }
  public function setMode($mode)
  {
    $this->mode = $mode;
  }
  public function getMode()
  {
    return $this->mode;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
