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

class Google_Service_Apigee_GoogleCloudApigeeV1ThemeEditorSchema extends Google_Model
{
  protected $defaultVariablesType = 'Google_Service_Apigee_GoogleCloudApigeeV1CustomStyleConfig';
  protected $defaultVariablesDataType = '';
  protected $schemaInfoType = 'Google_Service_Apigee_GoogleCloudApigeeV1CustomStyleSchemaInfo';
  protected $schemaInfoDataType = '';

  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1CustomStyleConfig
   */
  public function setDefaultVariables(Google_Service_Apigee_GoogleCloudApigeeV1CustomStyleConfig $defaultVariables)
  {
    $this->defaultVariables = $defaultVariables;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CustomStyleConfig
   */
  public function getDefaultVariables()
  {
    return $this->defaultVariables;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1CustomStyleSchemaInfo
   */
  public function setSchemaInfo(Google_Service_Apigee_GoogleCloudApigeeV1CustomStyleSchemaInfo $schemaInfo)
  {
    $this->schemaInfo = $schemaInfo;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1CustomStyleSchemaInfo
   */
  public function getSchemaInfo()
  {
    return $this->schemaInfo;
  }
}
