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

class Google_Service_CloudRun_ConfigMapKeySelector extends Google_Model
{
  public $key;
  protected $localObjectReferenceType = 'Google_Service_CloudRun_LocalObjectReference';
  protected $localObjectReferenceDataType = '';
  public $name;
  public $optional;

  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param Google_Service_CloudRun_LocalObjectReference
   */
  public function setLocalObjectReference(Google_Service_CloudRun_LocalObjectReference $localObjectReference)
  {
    $this->localObjectReference = $localObjectReference;
  }
  /**
   * @return Google_Service_CloudRun_LocalObjectReference
   */
  public function getLocalObjectReference()
  {
    return $this->localObjectReference;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOptional($optional)
  {
    $this->optional = $optional;
  }
  public function getOptional()
  {
    return $this->optional;
  }
}
