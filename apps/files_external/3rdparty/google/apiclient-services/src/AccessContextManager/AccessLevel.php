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

namespace Google\Service\AccessContextManager;

class AccessLevel extends \Google\Model
{
  protected $basicType = BasicLevel::class;
  protected $basicDataType = '';
  protected $customType = CustomLevel::class;
  protected $customDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $title;

  /**
   * @param BasicLevel
   */
  public function setBasic(BasicLevel $basic)
  {
    $this->basic = $basic;
  }
  /**
   * @return BasicLevel
   */
  public function getBasic()
  {
    return $this->basic;
  }
  /**
   * @param CustomLevel
   */
  public function setCustom(CustomLevel $custom)
  {
    $this->custom = $custom;
  }
  /**
   * @return CustomLevel
   */
  public function getCustom()
  {
    return $this->custom;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccessLevel::class, 'Google_Service_AccessContextManager_AccessLevel');
