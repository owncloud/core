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

namespace Google\Service\OSConfig;

class OSPolicyResource extends \Google\Model
{
  protected $execType = OSPolicyResourceExecResource::class;
  protected $execDataType = '';
  protected $fileType = OSPolicyResourceFileResource::class;
  protected $fileDataType = '';
  public $id;
  protected $pkgType = OSPolicyResourcePackageResource::class;
  protected $pkgDataType = '';
  protected $repositoryType = OSPolicyResourceRepositoryResource::class;
  protected $repositoryDataType = '';

  /**
   * @param OSPolicyResourceExecResource
   */
  public function setExec(OSPolicyResourceExecResource $exec)
  {
    $this->exec = $exec;
  }
  /**
   * @return OSPolicyResourceExecResource
   */
  public function getExec()
  {
    return $this->exec;
  }
  /**
   * @param OSPolicyResourceFileResource
   */
  public function setFile(OSPolicyResourceFileResource $file)
  {
    $this->file = $file;
  }
  /**
   * @return OSPolicyResourceFileResource
   */
  public function getFile()
  {
    return $this->file;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param OSPolicyResourcePackageResource
   */
  public function setPkg(OSPolicyResourcePackageResource $pkg)
  {
    $this->pkg = $pkg;
  }
  /**
   * @return OSPolicyResourcePackageResource
   */
  public function getPkg()
  {
    return $this->pkg;
  }
  /**
   * @param OSPolicyResourceRepositoryResource
   */
  public function setRepository(OSPolicyResourceRepositoryResource $repository)
  {
    $this->repository = $repository;
  }
  /**
   * @return OSPolicyResourceRepositoryResource
   */
  public function getRepository()
  {
    return $this->repository;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OSPolicyResource::class, 'Google_Service_OSConfig_OSPolicyResource');
