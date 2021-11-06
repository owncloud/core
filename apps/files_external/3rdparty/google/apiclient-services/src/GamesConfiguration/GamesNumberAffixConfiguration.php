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

namespace Google\Service\GamesConfiguration;

class GamesNumberAffixConfiguration extends \Google\Model
{
  protected $fewType = LocalizedStringBundle::class;
  protected $fewDataType = '';
  protected $manyType = LocalizedStringBundle::class;
  protected $manyDataType = '';
  protected $oneType = LocalizedStringBundle::class;
  protected $oneDataType = '';
  protected $otherType = LocalizedStringBundle::class;
  protected $otherDataType = '';
  protected $twoType = LocalizedStringBundle::class;
  protected $twoDataType = '';
  protected $zeroType = LocalizedStringBundle::class;
  protected $zeroDataType = '';

  /**
   * @param LocalizedStringBundle
   */
  public function setFew(LocalizedStringBundle $few)
  {
    $this->few = $few;
  }
  /**
   * @return LocalizedStringBundle
   */
  public function getFew()
  {
    return $this->few;
  }
  /**
   * @param LocalizedStringBundle
   */
  public function setMany(LocalizedStringBundle $many)
  {
    $this->many = $many;
  }
  /**
   * @return LocalizedStringBundle
   */
  public function getMany()
  {
    return $this->many;
  }
  /**
   * @param LocalizedStringBundle
   */
  public function setOne(LocalizedStringBundle $one)
  {
    $this->one = $one;
  }
  /**
   * @return LocalizedStringBundle
   */
  public function getOne()
  {
    return $this->one;
  }
  /**
   * @param LocalizedStringBundle
   */
  public function setOther(LocalizedStringBundle $other)
  {
    $this->other = $other;
  }
  /**
   * @return LocalizedStringBundle
   */
  public function getOther()
  {
    return $this->other;
  }
  /**
   * @param LocalizedStringBundle
   */
  public function setTwo(LocalizedStringBundle $two)
  {
    $this->two = $two;
  }
  /**
   * @return LocalizedStringBundle
   */
  public function getTwo()
  {
    return $this->two;
  }
  /**
   * @param LocalizedStringBundle
   */
  public function setZero(LocalizedStringBundle $zero)
  {
    $this->zero = $zero;
  }
  /**
   * @return LocalizedStringBundle
   */
  public function getZero()
  {
    return $this->zero;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GamesNumberAffixConfiguration::class, 'Google_Service_GamesConfiguration_GamesNumberAffixConfiguration');
