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

class DirectorySite extends \Google\Collection
{
  protected $collection_key = 'interstitialTagFormats';
  /**
   * @var string
   */
  public $id;
  protected $idDimensionValueType = DimensionValue::class;
  protected $idDimensionValueDataType = '';
  /**
   * @var string[]
   */
  public $inpageTagFormats;
  /**
   * @var string[]
   */
  public $interstitialTagFormats;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $name;
  protected $settingsType = DirectorySiteSettings::class;
  protected $settingsDataType = '';
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param DimensionValue
   */
  public function setIdDimensionValue(DimensionValue $idDimensionValue)
  {
    $this->idDimensionValue = $idDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getIdDimensionValue()
  {
    return $this->idDimensionValue;
  }
  /**
   * @param string[]
   */
  public function setInpageTagFormats($inpageTagFormats)
  {
    $this->inpageTagFormats = $inpageTagFormats;
  }
  /**
   * @return string[]
   */
  public function getInpageTagFormats()
  {
    return $this->inpageTagFormats;
  }
  /**
   * @param string[]
   */
  public function setInterstitialTagFormats($interstitialTagFormats)
  {
    $this->interstitialTagFormats = $interstitialTagFormats;
  }
  /**
   * @return string[]
   */
  public function getInterstitialTagFormats()
  {
    return $this->interstitialTagFormats;
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
   * @param DirectorySiteSettings
   */
  public function setSettings(DirectorySiteSettings $settings)
  {
    $this->settings = $settings;
  }
  /**
   * @return DirectorySiteSettings
   */
  public function getSettings()
  {
    return $this->settings;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DirectorySite::class, 'Google_Service_Dfareporting_DirectorySite');
