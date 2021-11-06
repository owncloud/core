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

namespace Google\Service\Appengine;

class Deployment extends \Google\Model
{
  protected $cloudBuildOptionsType = CloudBuildOptions::class;
  protected $cloudBuildOptionsDataType = '';
  protected $containerType = ContainerInfo::class;
  protected $containerDataType = '';
  protected $filesType = FileInfo::class;
  protected $filesDataType = 'map';
  protected $zipType = ZipInfo::class;
  protected $zipDataType = '';

  /**
   * @param CloudBuildOptions
   */
  public function setCloudBuildOptions(CloudBuildOptions $cloudBuildOptions)
  {
    $this->cloudBuildOptions = $cloudBuildOptions;
  }
  /**
   * @return CloudBuildOptions
   */
  public function getCloudBuildOptions()
  {
    return $this->cloudBuildOptions;
  }
  /**
   * @param ContainerInfo
   */
  public function setContainer(ContainerInfo $container)
  {
    $this->container = $container;
  }
  /**
   * @return ContainerInfo
   */
  public function getContainer()
  {
    return $this->container;
  }
  /**
   * @param FileInfo[]
   */
  public function setFiles($files)
  {
    $this->files = $files;
  }
  /**
   * @return FileInfo[]
   */
  public function getFiles()
  {
    return $this->files;
  }
  /**
   * @param ZipInfo
   */
  public function setZip(ZipInfo $zip)
  {
    $this->zip = $zip;
  }
  /**
   * @return ZipInfo
   */
  public function getZip()
  {
    return $this->zip;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Deployment::class, 'Google_Service_Appengine_Deployment');
