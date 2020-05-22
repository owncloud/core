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

class Google_Service_Apigee_GoogleCloudApigeeV1Access extends Google_Model
{
  protected $internal_gapi_mappings = array(
        "get" => "Get",
        "remove" => "Remove",
        "set" => "Set",
  );
  protected $getType = 'Google_Service_Apigee_GoogleCloudApigeeV1AccessGet';
  protected $getDataType = '';
  protected $removeType = 'Google_Service_Apigee_GoogleCloudApigeeV1AccessRemove';
  protected $removeDataType = '';
  protected $setType = 'Google_Service_Apigee_GoogleCloudApigeeV1AccessSet';
  protected $setDataType = '';

  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1AccessGet
   */
  public function setGet(Google_Service_Apigee_GoogleCloudApigeeV1AccessGet $get)
  {
    $this->get = $get;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1AccessGet
   */
  public function getGet()
  {
    return $this->get;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1AccessRemove
   */
  public function setRemove(Google_Service_Apigee_GoogleCloudApigeeV1AccessRemove $remove)
  {
    $this->remove = $remove;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1AccessRemove
   */
  public function getRemove()
  {
    return $this->remove;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1AccessSet
   */
  public function setSet(Google_Service_Apigee_GoogleCloudApigeeV1AccessSet $set)
  {
    $this->set = $set;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1AccessSet
   */
  public function getSet()
  {
    return $this->set;
  }
}
