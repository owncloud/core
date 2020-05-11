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

class Google_Service_CloudSearch_Schema extends Google_Collection
{
  protected $collection_key = 'operationIds';
  protected $objectDefinitionsType = 'Google_Service_CloudSearch_ObjectDefinition';
  protected $objectDefinitionsDataType = 'array';
  public $operationIds;

  /**
   * @param Google_Service_CloudSearch_ObjectDefinition
   */
  public function setObjectDefinitions($objectDefinitions)
  {
    $this->objectDefinitions = $objectDefinitions;
  }
  /**
   * @return Google_Service_CloudSearch_ObjectDefinition
   */
  public function getObjectDefinitions()
  {
    return $this->objectDefinitions;
  }
  public function setOperationIds($operationIds)
  {
    $this->operationIds = $operationIds;
  }
  public function getOperationIds()
  {
    return $this->operationIds;
  }
}
