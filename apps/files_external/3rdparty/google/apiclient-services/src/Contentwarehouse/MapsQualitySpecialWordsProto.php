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

namespace Google\Service\Contentwarehouse;

class MapsQualitySpecialWordsProto extends \Google\Collection
{
  protected $collection_key = 'visibleTypeId';
  /**
   * @var string[]
   */
  public $alternate;
  /**
   * @var string[]
   */
  public $canonical;
  /**
   * @var string[]
   */
  public $country;
  protected $flagsType = MapsQualitySpecialWordsFlags::class;
  protected $flagsDataType = '';
  /**
   * @var string[]
   */
  public $language;
  /**
   * @var string
   */
  public $position;
  /**
   * @var string[]
   */
  public $visibleTypeId;

  /**
   * @param string[]
   */
  public function setAlternate($alternate)
  {
    $this->alternate = $alternate;
  }
  /**
   * @return string[]
   */
  public function getAlternate()
  {
    return $this->alternate;
  }
  /**
   * @param string[]
   */
  public function setCanonical($canonical)
  {
    $this->canonical = $canonical;
  }
  /**
   * @return string[]
   */
  public function getCanonical()
  {
    return $this->canonical;
  }
  /**
   * @param string[]
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string[]
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param MapsQualitySpecialWordsFlags
   */
  public function setFlags(MapsQualitySpecialWordsFlags $flags)
  {
    $this->flags = $flags;
  }
  /**
   * @return MapsQualitySpecialWordsFlags
   */
  public function getFlags()
  {
    return $this->flags;
  }
  /**
   * @param string[]
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string[]
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setPosition($position)
  {
    $this->position = $position;
  }
  /**
   * @return string
   */
  public function getPosition()
  {
    return $this->position;
  }
  /**
   * @param string[]
   */
  public function setVisibleTypeId($visibleTypeId)
  {
    $this->visibleTypeId = $visibleTypeId;
  }
  /**
   * @return string[]
   */
  public function getVisibleTypeId()
  {
    return $this->visibleTypeId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MapsQualitySpecialWordsProto::class, 'Google_Service_Contentwarehouse_MapsQualitySpecialWordsProto');
