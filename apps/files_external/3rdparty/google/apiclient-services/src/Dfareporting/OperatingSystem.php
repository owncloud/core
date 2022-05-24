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

namespace Google\Service\Dfareporting;

class OperatingSystem extends \Google\Model
{
  /**
   * @var string
   */
  public $dartId;
  /**
   * @var bool
   */
  public $desktop;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var bool
   */
  public $mobile;
  /**
   * @var string
   */
  public $name;

  /**
   * @param string
   */
  public function setDartId($dartId)
  {
    $this->dartId = $dartId;
  }
  /**
   * @return string
   */
  public function getDartId()
  {
    return $this->dartId;
  }
  /**
   * @param bool
   */
  public function setDesktop($desktop)
  {
    $this->desktop = $desktop;
  }
  /**
   * @return bool
   */
  public function getDesktop()
  {
    return $this->desktop;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param bool
   */
  public function setMobile($mobile)
  {
    $this->mobile = $mobile;
  }
  /**
   * @return bool
   */
  public function getMobile()
  {
    return $this->mobile;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OperatingSystem::class, 'Google_Service_Dfareporting_OperatingSystem');
