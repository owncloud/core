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

namespace Google\Service\Texttospeech;

class Voice extends \Google\Collection
{
  protected $collection_key = 'languageCodes';
  /**
   * @var string[]
   */
  public $languageCodes;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $naturalSampleRateHertz;
  /**
   * @var string
   */
  public $ssmlGender;

  /**
   * @param string[]
   */
  public function setLanguageCodes($languageCodes)
  {
    $this->languageCodes = $languageCodes;
  }
  /**
   * @return string[]
   */
  public function getLanguageCodes()
  {
    return $this->languageCodes;
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
   * @param int
   */
  public function setNaturalSampleRateHertz($naturalSampleRateHertz)
  {
    $this->naturalSampleRateHertz = $naturalSampleRateHertz;
  }
  /**
   * @return int
   */
  public function getNaturalSampleRateHertz()
  {
    return $this->naturalSampleRateHertz;
  }
  /**
   * @param string
   */
  public function setSsmlGender($ssmlGender)
  {
    $this->ssmlGender = $ssmlGender;
  }
  /**
   * @return string
   */
  public function getSsmlGender()
  {
    return $this->ssmlGender;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Voice::class, 'Google_Service_Texttospeech_Voice');
