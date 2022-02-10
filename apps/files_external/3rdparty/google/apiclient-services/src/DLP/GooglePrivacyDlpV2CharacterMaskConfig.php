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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2CharacterMaskConfig extends \Google\Collection
{
  protected $collection_key = 'charactersToIgnore';
  protected $charactersToIgnoreType = GooglePrivacyDlpV2CharsToIgnore::class;
  protected $charactersToIgnoreDataType = 'array';
  /**
   * @var string
   */
  public $maskingCharacter;
  /**
   * @var int
   */
  public $numberToMask;
  /**
   * @var bool
   */
  public $reverseOrder;

  /**
   * @param GooglePrivacyDlpV2CharsToIgnore[]
   */
  public function setCharactersToIgnore($charactersToIgnore)
  {
    $this->charactersToIgnore = $charactersToIgnore;
  }
  /**
   * @return GooglePrivacyDlpV2CharsToIgnore[]
   */
  public function getCharactersToIgnore()
  {
    return $this->charactersToIgnore;
  }
  /**
   * @param string
   */
  public function setMaskingCharacter($maskingCharacter)
  {
    $this->maskingCharacter = $maskingCharacter;
  }
  /**
   * @return string
   */
  public function getMaskingCharacter()
  {
    return $this->maskingCharacter;
  }
  /**
   * @param int
   */
  public function setNumberToMask($numberToMask)
  {
    $this->numberToMask = $numberToMask;
  }
  /**
   * @return int
   */
  public function getNumberToMask()
  {
    return $this->numberToMask;
  }
  /**
   * @param bool
   */
  public function setReverseOrder($reverseOrder)
  {
    $this->reverseOrder = $reverseOrder;
  }
  /**
   * @return bool
   */
  public function getReverseOrder()
  {
    return $this->reverseOrder;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2CharacterMaskConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2CharacterMaskConfig');
