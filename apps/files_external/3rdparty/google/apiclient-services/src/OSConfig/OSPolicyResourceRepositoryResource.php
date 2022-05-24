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

class OSPolicyResourceRepositoryResource extends \Google\Model
{
  protected $aptType = OSPolicyResourceRepositoryResourceAptRepository::class;
  protected $aptDataType = '';
  protected $gooType = OSPolicyResourceRepositoryResourceGooRepository::class;
  protected $gooDataType = '';
  protected $yumType = OSPolicyResourceRepositoryResourceYumRepository::class;
  protected $yumDataType = '';
  protected $zypperType = OSPolicyResourceRepositoryResourceZypperRepository::class;
  protected $zypperDataType = '';

  /**
   * @param OSPolicyResourceRepositoryResourceAptRepository
   */
  public function setApt(OSPolicyResourceRepositoryResourceAptRepository $apt)
  {
    $this->apt = $apt;
  }
  /**
   * @return OSPolicyResourceRepositoryResourceAptRepository
   */
  public function getApt()
  {
    return $this->apt;
  }
  /**
   * @param OSPolicyResourceRepositoryResourceGooRepository
   */
  public function setGoo(OSPolicyResourceRepositoryResourceGooRepository $goo)
  {
    $this->goo = $goo;
  }
  /**
   * @return OSPolicyResourceRepositoryResourceGooRepository
   */
  public function getGoo()
  {
    return $this->goo;
  }
  /**
   * @param OSPolicyResourceRepositoryResourceYumRepository
   */
  public function setYum(OSPolicyResourceRepositoryResourceYumRepository $yum)
  {
    $this->yum = $yum;
  }
  /**
   * @return OSPolicyResourceRepositoryResourceYumRepository
   */
  public function getYum()
  {
    return $this->yum;
  }
  /**
   * @param OSPolicyResourceRepositoryResourceZypperRepository
   */
  public function setZypper(OSPolicyResourceRepositoryResourceZypperRepository $zypper)
  {
    $this->zypper = $zypper;
  }
  /**
   * @return OSPolicyResourceRepositoryResourceZypperRepository
   */
  public function getZypper()
  {
    return $this->zypper;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OSPolicyResourceRepositoryResource::class, 'Google_Service_OSConfig_OSPolicyResourceRepositoryResource');
