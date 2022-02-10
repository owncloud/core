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

namespace Google\Service\SQLAdmin;

class PasswordValidationPolicy extends \Google\Model
{
  /**
   * @var string
   */
  public $complexity;
  /**
   * @var bool
   */
  public $disallowUsernameSubstring;
  /**
   * @var int
   */
  public $minLength;
  /**
   * @var string
   */
  public $passwordChangeInterval;
  /**
   * @var int
   */
  public $reuseInterval;

  /**
   * @param string
   */
  public function setComplexity($complexity)
  {
    $this->complexity = $complexity;
  }
  /**
   * @return string
   */
  public function getComplexity()
  {
    return $this->complexity;
  }
  /**
   * @param bool
   */
  public function setDisallowUsernameSubstring($disallowUsernameSubstring)
  {
    $this->disallowUsernameSubstring = $disallowUsernameSubstring;
  }
  /**
   * @return bool
   */
  public function getDisallowUsernameSubstring()
  {
    return $this->disallowUsernameSubstring;
  }
  /**
   * @param int
   */
  public function setMinLength($minLength)
  {
    $this->minLength = $minLength;
  }
  /**
   * @return int
   */
  public function getMinLength()
  {
    return $this->minLength;
  }
  /**
   * @param string
   */
  public function setPasswordChangeInterval($passwordChangeInterval)
  {
    $this->passwordChangeInterval = $passwordChangeInterval;
  }
  /**
   * @return string
   */
  public function getPasswordChangeInterval()
  {
    return $this->passwordChangeInterval;
  }
  /**
   * @param int
   */
  public function setReuseInterval($reuseInterval)
  {
    $this->reuseInterval = $reuseInterval;
  }
  /**
   * @return int
   */
  public function getReuseInterval()
  {
    return $this->reuseInterval;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PasswordValidationPolicy::class, 'Google_Service_SQLAdmin_PasswordValidationPolicy');
