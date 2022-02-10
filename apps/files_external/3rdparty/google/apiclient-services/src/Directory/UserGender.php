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

class UserGender extends \Google\Model
{
  /**
   * @var string
   */
  public $addressMeAs;
  /**
   * @var string
   */
  public $customGender;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setAddressMeAs($addressMeAs)
  {
    $this->addressMeAs = $addressMeAs;
  }
  /**
   * @return string
   */
  public function getAddressMeAs()
  {
    return $this->addressMeAs;
  }
  /**
   * @param string
   */
  public function setCustomGender($customGender)
  {
    $this->customGender = $customGender;
  }
  /**
   * @return string
   */
  public function getCustomGender()
  {
    return $this->customGender;
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
class_alias(UserGender::class, 'Google_Service_Directory_UserGender');
