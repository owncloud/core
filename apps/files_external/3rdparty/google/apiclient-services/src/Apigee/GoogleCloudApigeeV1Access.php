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

class GoogleCloudApigeeV1Access extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "get" => "Get",
        "remove" => "Remove",
        "set" => "Set",
  ];
  protected $getType = GoogleCloudApigeeV1AccessGet::class;
  protected $getDataType = '';
  protected $removeType = GoogleCloudApigeeV1AccessRemove::class;
  protected $removeDataType = '';
  protected $setType = GoogleCloudApigeeV1AccessSet::class;
  protected $setDataType = '';

  /**
   * @param GoogleCloudApigeeV1AccessGet
   */
  public function setGet(GoogleCloudApigeeV1AccessGet $get)
  {
    $this->get = $get;
  }
  /**
   * @return GoogleCloudApigeeV1AccessGet
   */
  public function getGet()
  {
    return $this->get;
  }
  /**
   * @param GoogleCloudApigeeV1AccessRemove
   */
  public function setRemove(GoogleCloudApigeeV1AccessRemove $remove)
  {
    $this->remove = $remove;
  }
  /**
   * @return GoogleCloudApigeeV1AccessRemove
   */
  public function getRemove()
  {
    return $this->remove;
  }
  /**
   * @param GoogleCloudApigeeV1AccessSet
   */
  public function setSet(GoogleCloudApigeeV1AccessSet $set)
  {
    $this->set = $set;
  }
  /**
   * @return GoogleCloudApigeeV1AccessSet
   */
  public function getSet()
  {
    return $this->set;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1Access::class, 'Google_Service_Apigee_GoogleCloudApigeeV1Access');
