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

class Google_Service_AIPlatformNotebooks_Environment extends Google_Model
{
  protected $containerImageType = 'Google_Service_AIPlatformNotebooks_ContainerImage';
  protected $containerImageDataType = '';
  public $createTime;
  public $description;
  public $displayName;
  public $name;
  public $postStartupScript;
  protected $vmImageType = 'Google_Service_AIPlatformNotebooks_VmImage';
  protected $vmImageDataType = '';

  /**
   * @param Google_Service_AIPlatformNotebooks_ContainerImage
   */
  public function setContainerImage(Google_Service_AIPlatformNotebooks_ContainerImage $containerImage)
  {
    $this->containerImage = $containerImage;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_ContainerImage
   */
  public function getContainerImage()
  {
    return $this->containerImage;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPostStartupScript($postStartupScript)
  {
    $this->postStartupScript = $postStartupScript;
  }
  public function getPostStartupScript()
  {
    return $this->postStartupScript;
  }
  /**
   * @param Google_Service_AIPlatformNotebooks_VmImage
   */
  public function setVmImage(Google_Service_AIPlatformNotebooks_VmImage $vmImage)
  {
    $this->vmImage = $vmImage;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_VmImage
   */
  public function getVmImage()
  {
    return $this->vmImage;
  }
}
