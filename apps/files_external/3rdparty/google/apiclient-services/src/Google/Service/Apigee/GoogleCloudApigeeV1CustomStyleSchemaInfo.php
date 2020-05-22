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

class Google_Service_Apigee_GoogleCloudApigeeV1CustomStyleSchemaInfo extends Google_Collection
{
  protected $collection_key = 'gui';
  public $copiedVariables;
  public $enums;
  protected $guiType = 'Google_Service_Apigee_GoogleCloudApigeeV1GuiSection';
  protected $guiDataType = 'array';
  public $properties;

  public function setCopiedVariables($copiedVariables)
  {
    $this->copiedVariables = $copiedVariables;
  }
  public function getCopiedVariables()
  {
    return $this->copiedVariables;
  }
  public function setEnums($enums)
  {
    $this->enums = $enums;
  }
  public function getEnums()
  {
    return $this->enums;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1GuiSection
   */
  public function setGui($gui)
  {
    $this->gui = $gui;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1GuiSection
   */
  public function getGui()
  {
    return $this->gui;
  }
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  public function getProperties()
  {
    return $this->properties;
  }
}
