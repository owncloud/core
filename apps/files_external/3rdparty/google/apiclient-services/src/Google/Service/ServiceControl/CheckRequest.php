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

class Google_Service_ServiceControl_CheckRequest extends Google_Collection
{
  protected $collection_key = 'resources';
  protected $attributesType = 'Google_Service_ServiceControl_AttributeContext';
  protected $attributesDataType = '';
  protected $resourcesType = 'Google_Service_ServiceControl_ResourceInfo';
  protected $resourcesDataType = 'array';
  public $serviceConfigId;

  /**
   * @param Google_Service_ServiceControl_AttributeContext
   */
  public function setAttributes(Google_Service_ServiceControl_AttributeContext $attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return Google_Service_ServiceControl_AttributeContext
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param Google_Service_ServiceControl_ResourceInfo[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return Google_Service_ServiceControl_ResourceInfo[]
   */
  public function getResources()
  {
    return $this->resources;
  }
  public function setServiceConfigId($serviceConfigId)
  {
    $this->serviceConfigId = $serviceConfigId;
  }
  public function getServiceConfigId()
  {
    return $this->serviceConfigId;
  }
}
