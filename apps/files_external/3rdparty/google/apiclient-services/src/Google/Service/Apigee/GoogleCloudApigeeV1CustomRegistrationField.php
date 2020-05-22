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

class Google_Service_Apigee_GoogleCloudApigeeV1CustomRegistrationField extends Google_Model
{
  public $active;
  public $fieldName;
  public $fieldType;
  public $required;
  public $sortOrder;

  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  public function setFieldName($fieldName)
  {
    $this->fieldName = $fieldName;
  }
  public function getFieldName()
  {
    return $this->fieldName;
  }
  public function setFieldType($fieldType)
  {
    $this->fieldType = $fieldType;
  }
  public function getFieldType()
  {
    return $this->fieldType;
  }
  public function setRequired($required)
  {
    $this->required = $required;
  }
  public function getRequired()
  {
    return $this->required;
  }
  public function setSortOrder($sortOrder)
  {
    $this->sortOrder = $sortOrder;
  }
  public function getSortOrder()
  {
    return $this->sortOrder;
  }
}
