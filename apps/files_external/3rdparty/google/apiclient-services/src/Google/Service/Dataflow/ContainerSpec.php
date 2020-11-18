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

class Google_Service_Dataflow_ContainerSpec extends Google_Model
{
  protected $defaultEnvironmentType = 'Google_Service_Dataflow_FlexTemplateRuntimeEnvironment';
  protected $defaultEnvironmentDataType = '';
  public $image;
  protected $metadataType = 'Google_Service_Dataflow_TemplateMetadata';
  protected $metadataDataType = '';
  protected $sdkInfoType = 'Google_Service_Dataflow_SDKInfo';
  protected $sdkInfoDataType = '';

  /**
   * @param Google_Service_Dataflow_FlexTemplateRuntimeEnvironment
   */
  public function setDefaultEnvironment(Google_Service_Dataflow_FlexTemplateRuntimeEnvironment $defaultEnvironment)
  {
    $this->defaultEnvironment = $defaultEnvironment;
  }
  /**
   * @return Google_Service_Dataflow_FlexTemplateRuntimeEnvironment
   */
  public function getDefaultEnvironment()
  {
    return $this->defaultEnvironment;
  }
  public function setImage($image)
  {
    $this->image = $image;
  }
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Google_Service_Dataflow_TemplateMetadata
   */
  public function setMetadata(Google_Service_Dataflow_TemplateMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return Google_Service_Dataflow_TemplateMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param Google_Service_Dataflow_SDKInfo
   */
  public function setSdkInfo(Google_Service_Dataflow_SDKInfo $sdkInfo)
  {
    $this->sdkInfo = $sdkInfo;
  }
  /**
   * @return Google_Service_Dataflow_SDKInfo
   */
  public function getSdkInfo()
  {
    return $this->sdkInfo;
  }
}
