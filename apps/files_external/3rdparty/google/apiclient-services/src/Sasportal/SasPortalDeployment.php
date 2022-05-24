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

namespace Google\Service\Sasportal;

class SasPortalDeployment extends \Google\Collection
{
  protected $collection_key = 'sasUserIds';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $frns;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $sasUserIds;

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string[]
   */
  public function setFrns($frns)
  {
    $this->frns = $frns;
  }
  /**
   * @return string[]
   */
  public function getFrns()
  {
    return $this->frns;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setSasUserIds($sasUserIds)
  {
    $this->sasUserIds = $sasUserIds;
  }
  /**
   * @return string[]
   */
  public function getSasUserIds()
  {
    return $this->sasUserIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SasPortalDeployment::class, 'Google_Service_Sasportal_SasPortalDeployment');
