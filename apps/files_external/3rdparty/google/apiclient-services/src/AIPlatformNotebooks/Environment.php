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

namespace Google\Service\AIPlatformNotebooks;

class Environment extends \Google\Model
{
  protected $containerImageType = ContainerImage::class;
  protected $containerImageDataType = '';
  public $createTime;
  public $description;
  public $displayName;
  public $name;
  public $postStartupScript;
  protected $vmImageType = VmImage::class;
  protected $vmImageDataType = '';

  /**
   * @param ContainerImage
   */
  public function setContainerImage(ContainerImage $containerImage)
  {
    $this->containerImage = $containerImage;
  }
  /**
   * @return ContainerImage
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
   * @param VmImage
   */
  public function setVmImage(VmImage $vmImage)
  {
    $this->vmImage = $vmImage;
  }
  /**
   * @return VmImage
   */
  public function getVmImage()
  {
    return $this->vmImage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Environment::class, 'Google_Service_AIPlatformNotebooks_Environment');
