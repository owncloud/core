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

namespace Google\Service\Directory;

class UserIm extends \Google\Model
{
  /**
   * @var string
   */
  public $customProtocol;
  /**
   * @var string
   */
  public $customType;
  /**
   * @var string
   */
  public $im;
  /**
   * @var bool
   */
  public $primary;
  /**
   * @var string
   */
  public $protocol;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setCustomProtocol($customProtocol)
  {
    $this->customProtocol = $customProtocol;
  }
  /**
   * @return string
   */
  public function getCustomProtocol()
  {
    return $this->customProtocol;
  }
  /**
   * @param string
   */
  public function setCustomType($customType)
  {
    $this->customType = $customType;
  }
  /**
   * @return string
   */
  public function getCustomType()
  {
    return $this->customType;
  }
  /**
   * @param string
   */
  public function setIm($im)
  {
    $this->im = $im;
  }
  /**
   * @return string
   */
  public function getIm()
  {
    return $this->im;
  }
  /**
   * @param bool
   */
  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }
  /**
   * @return bool
   */
  public function getPrimary()
  {
    return $this->primary;
  }
  /**
   * @param string
   */
  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }
  /**
   * @return string
   */
  public function getProtocol()
  {
    return $this->protocol;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserIm::class, 'Google_Service_Directory_UserIm');
