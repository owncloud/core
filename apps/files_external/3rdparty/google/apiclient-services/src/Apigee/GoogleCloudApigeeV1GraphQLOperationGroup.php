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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1GraphQLOperationGroup extends \Google\Collection
{
  protected $collection_key = 'operationConfigs';
  public $operationConfigType;
  protected $operationConfigsType = GoogleCloudApigeeV1GraphQLOperationConfig::class;
  protected $operationConfigsDataType = 'array';

  public function setOperationConfigType($operationConfigType)
  {
    $this->operationConfigType = $operationConfigType;
  }
  public function getOperationConfigType()
  {
    return $this->operationConfigType;
  }
  /**
   * @param GoogleCloudApigeeV1GraphQLOperationConfig[]
   */
  public function setOperationConfigs($operationConfigs)
  {
    $this->operationConfigs = $operationConfigs;
  }
  /**
   * @return GoogleCloudApigeeV1GraphQLOperationConfig[]
   */
  public function getOperationConfigs()
  {
    return $this->operationConfigs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1GraphQLOperationGroup::class, 'Google_Service_Apigee_GoogleCloudApigeeV1GraphQLOperationGroup');
