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

namespace Google\Service\Dataflow;

class ContainerSpec extends \Google\Model
{
  protected $defaultEnvironmentType = FlexTemplateRuntimeEnvironment::class;
  protected $defaultEnvironmentDataType = '';
  /**
   * @var string
   */
  public $image;
  /**
   * @var string
   */
  public $imageRepositoryCertPath;
  /**
   * @var string
   */
  public $imageRepositoryPasswordSecretId;
  /**
   * @var string
   */
  public $imageRepositoryUsernameSecretId;
  protected $metadataType = TemplateMetadata::class;
  protected $metadataDataType = '';
  protected $sdkInfoType = SDKInfo::class;
  protected $sdkInfoDataType = '';

  /**
   * @param FlexTemplateRuntimeEnvironment
   */
  public function setDefaultEnvironment(FlexTemplateRuntimeEnvironment $defaultEnvironment)
  {
    $this->defaultEnvironment = $defaultEnvironment;
  }
  /**
   * @return FlexTemplateRuntimeEnvironment
   */
  public function getDefaultEnvironment()
  {
    return $this->defaultEnvironment;
  }
  /**
   * @param string
   */
  public function setImage($image)
  {
    $this->image = $image;
  }
  /**
   * @return string
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param string
   */
  public function setImageRepositoryCertPath($imageRepositoryCertPath)
  {
    $this->imageRepositoryCertPath = $imageRepositoryCertPath;
  }
  /**
   * @return string
   */
  public function getImageRepositoryCertPath()
  {
    return $this->imageRepositoryCertPath;
  }
  /**
   * @param string
   */
  public function setImageRepositoryPasswordSecretId($imageRepositoryPasswordSecretId)
  {
    $this->imageRepositoryPasswordSecretId = $imageRepositoryPasswordSecretId;
  }
  /**
   * @return string
   */
  public function getImageRepositoryPasswordSecretId()
  {
    return $this->imageRepositoryPasswordSecretId;
  }
  /**
   * @param string
   */
  public function setImageRepositoryUsernameSecretId($imageRepositoryUsernameSecretId)
  {
    $this->imageRepositoryUsernameSecretId = $imageRepositoryUsernameSecretId;
  }
  /**
   * @return string
   */
  public function getImageRepositoryUsernameSecretId()
  {
    return $this->imageRepositoryUsernameSecretId;
  }
  /**
   * @param TemplateMetadata
   */
  public function setMetadata(TemplateMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return TemplateMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param SDKInfo
   */
  public function setSdkInfo(SDKInfo $sdkInfo)
  {
    $this->sdkInfo = $sdkInfo;
  }
  /**
   * @return SDKInfo
   */
  public function getSdkInfo()
  {
    return $this->sdkInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContainerSpec::class, 'Google_Service_Dataflow_ContainerSpec');
