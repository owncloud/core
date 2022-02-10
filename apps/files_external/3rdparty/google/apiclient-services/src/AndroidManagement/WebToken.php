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

namespace Google\Service\AndroidManagement;

class WebToken extends \Google\Collection
{
  protected $collection_key = 'permissions';
  /**
   * @var string[]
   */
  public $enabledFeatures;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $parentFrameUrl;
  /**
   * @var string[]
   */
  public $permissions;
  /**
   * @var string
   */
  public $value;

  /**
   * @param string[]
   */
  public function setEnabledFeatures($enabledFeatures)
  {
    $this->enabledFeatures = $enabledFeatures;
  }
  /**
   * @return string[]
   */
  public function getEnabledFeatures()
  {
    return $this->enabledFeatures;
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
   * @param string
   */
  public function setParentFrameUrl($parentFrameUrl)
  {
    $this->parentFrameUrl = $parentFrameUrl;
  }
  /**
   * @return string
   */
  public function getParentFrameUrl()
  {
    return $this->parentFrameUrl;
  }
  /**
   * @param string[]
   */
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return string[]
   */
  public function getPermissions()
  {
    return $this->permissions;
  }
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WebToken::class, 'Google_Service_AndroidManagement_WebToken');
