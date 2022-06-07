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

class PasswordRequirements extends \Google\Model
{
  /**
   * @var int
   */
  public $maximumFailedPasswordsForWipe;
  /**
   * @var string
   */
  public $passwordExpirationTimeout;
  /**
   * @var int
   */
  public $passwordHistoryLength;
  /**
   * @var int
   */
  public $passwordMinimumLength;
  /**
   * @var int
   */
  public $passwordMinimumLetters;
  /**
   * @var int
   */
  public $passwordMinimumLowerCase;
  /**
   * @var int
   */
  public $passwordMinimumNonLetter;
  /**
   * @var int
   */
  public $passwordMinimumNumeric;
  /**
   * @var int
   */
  public $passwordMinimumSymbols;
  /**
   * @var int
   */
  public $passwordMinimumUpperCase;
  /**
   * @var string
   */
  public $passwordQuality;
  /**
   * @var string
   */
  public $passwordScope;
  /**
   * @var string
   */
  public $requirePasswordUnlock;
  /**
   * @var string
   */
  public $unifiedLockSettings;

  /**
   * @param int
   */
  public function setMaximumFailedPasswordsForWipe($maximumFailedPasswordsForWipe)
  {
    $this->maximumFailedPasswordsForWipe = $maximumFailedPasswordsForWipe;
  }
  /**
   * @return int
   */
  public function getMaximumFailedPasswordsForWipe()
  {
    return $this->maximumFailedPasswordsForWipe;
  }
  /**
   * @param string
   */
  public function setPasswordExpirationTimeout($passwordExpirationTimeout)
  {
    $this->passwordExpirationTimeout = $passwordExpirationTimeout;
  }
  /**
   * @return string
   */
  public function getPasswordExpirationTimeout()
  {
    return $this->passwordExpirationTimeout;
  }
  /**
   * @param int
   */
  public function setPasswordHistoryLength($passwordHistoryLength)
  {
    $this->passwordHistoryLength = $passwordHistoryLength;
  }
  /**
   * @return int
   */
  public function getPasswordHistoryLength()
  {
    return $this->passwordHistoryLength;
  }
  /**
   * @param int
   */
  public function setPasswordMinimumLength($passwordMinimumLength)
  {
    $this->passwordMinimumLength = $passwordMinimumLength;
  }
  /**
   * @return int
   */
  public function getPasswordMinimumLength()
  {
    return $this->passwordMinimumLength;
  }
  /**
   * @param int
   */
  public function setPasswordMinimumLetters($passwordMinimumLetters)
  {
    $this->passwordMinimumLetters = $passwordMinimumLetters;
  }
  /**
   * @return int
   */
  public function getPasswordMinimumLetters()
  {
    return $this->passwordMinimumLetters;
  }
  /**
   * @param int
   */
  public function setPasswordMinimumLowerCase($passwordMinimumLowerCase)
  {
    $this->passwordMinimumLowerCase = $passwordMinimumLowerCase;
  }
  /**
   * @return int
   */
  public function getPasswordMinimumLowerCase()
  {
    return $this->passwordMinimumLowerCase;
  }
  /**
   * @param int
   */
  public function setPasswordMinimumNonLetter($passwordMinimumNonLetter)
  {
    $this->passwordMinimumNonLetter = $passwordMinimumNonLetter;
  }
  /**
   * @return int
   */
  public function getPasswordMinimumNonLetter()
  {
    return $this->passwordMinimumNonLetter;
  }
  /**
   * @param int
   */
  public function setPasswordMinimumNumeric($passwordMinimumNumeric)
  {
    $this->passwordMinimumNumeric = $passwordMinimumNumeric;
  }
  /**
   * @return int
   */
  public function getPasswordMinimumNumeric()
  {
    return $this->passwordMinimumNumeric;
  }
  /**
   * @param int
   */
  public function setPasswordMinimumSymbols($passwordMinimumSymbols)
  {
    $this->passwordMinimumSymbols = $passwordMinimumSymbols;
  }
  /**
   * @return int
   */
  public function getPasswordMinimumSymbols()
  {
    return $this->passwordMinimumSymbols;
  }
  /**
   * @param int
   */
  public function setPasswordMinimumUpperCase($passwordMinimumUpperCase)
  {
    $this->passwordMinimumUpperCase = $passwordMinimumUpperCase;
  }
  /**
   * @return int
   */
  public function getPasswordMinimumUpperCase()
  {
    return $this->passwordMinimumUpperCase;
  }
  /**
   * @param string
   */
  public function setPasswordQuality($passwordQuality)
  {
    $this->passwordQuality = $passwordQuality;
  }
  /**
   * @return string
   */
  public function getPasswordQuality()
  {
    return $this->passwordQuality;
  }
  /**
   * @param string
   */
  public function setPasswordScope($passwordScope)
  {
    $this->passwordScope = $passwordScope;
  }
  /**
   * @return string
   */
  public function getPasswordScope()
  {
    return $this->passwordScope;
  }
  /**
   * @param string
   */
  public function setRequirePasswordUnlock($requirePasswordUnlock)
  {
    $this->requirePasswordUnlock = $requirePasswordUnlock;
  }
  /**
   * @return string
   */
  public function getRequirePasswordUnlock()
  {
    return $this->requirePasswordUnlock;
  }
  /**
   * @param string
   */
  public function setUnifiedLockSettings($unifiedLockSettings)
  {
    $this->unifiedLockSettings = $unifiedLockSettings;
  }
  /**
   * @return string
   */
  public function getUnifiedLockSettings()
  {
    return $this->unifiedLockSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PasswordRequirements::class, 'Google_Service_AndroidManagement_PasswordRequirements');
