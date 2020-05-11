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

class Google_Service_CloudSearch_PropertyDefinition extends Google_Model
{
  protected $booleanPropertyOptionsType = 'Google_Service_CloudSearch_BooleanPropertyOptions';
  protected $booleanPropertyOptionsDataType = '';
  protected $datePropertyOptionsType = 'Google_Service_CloudSearch_DatePropertyOptions';
  protected $datePropertyOptionsDataType = '';
  protected $displayOptionsType = 'Google_Service_CloudSearch_PropertyDisplayOptions';
  protected $displayOptionsDataType = '';
  protected $doublePropertyOptionsType = 'Google_Service_CloudSearch_DoublePropertyOptions';
  protected $doublePropertyOptionsDataType = '';
  protected $enumPropertyOptionsType = 'Google_Service_CloudSearch_EnumPropertyOptions';
  protected $enumPropertyOptionsDataType = '';
  protected $htmlPropertyOptionsType = 'Google_Service_CloudSearch_HtmlPropertyOptions';
  protected $htmlPropertyOptionsDataType = '';
  protected $integerPropertyOptionsType = 'Google_Service_CloudSearch_IntegerPropertyOptions';
  protected $integerPropertyOptionsDataType = '';
  public $isFacetable;
  public $isRepeatable;
  public $isReturnable;
  public $isSortable;
  public $isSuggestable;
  public $isWildcardSearchable;
  public $name;
  protected $objectPropertyOptionsType = 'Google_Service_CloudSearch_ObjectPropertyOptions';
  protected $objectPropertyOptionsDataType = '';
  protected $textPropertyOptionsType = 'Google_Service_CloudSearch_TextPropertyOptions';
  protected $textPropertyOptionsDataType = '';
  protected $timestampPropertyOptionsType = 'Google_Service_CloudSearch_TimestampPropertyOptions';
  protected $timestampPropertyOptionsDataType = '';

  /**
   * @param Google_Service_CloudSearch_BooleanPropertyOptions
   */
  public function setBooleanPropertyOptions(Google_Service_CloudSearch_BooleanPropertyOptions $booleanPropertyOptions)
  {
    $this->booleanPropertyOptions = $booleanPropertyOptions;
  }
  /**
   * @return Google_Service_CloudSearch_BooleanPropertyOptions
   */
  public function getBooleanPropertyOptions()
  {
    return $this->booleanPropertyOptions;
  }
  /**
   * @param Google_Service_CloudSearch_DatePropertyOptions
   */
  public function setDatePropertyOptions(Google_Service_CloudSearch_DatePropertyOptions $datePropertyOptions)
  {
    $this->datePropertyOptions = $datePropertyOptions;
  }
  /**
   * @return Google_Service_CloudSearch_DatePropertyOptions
   */
  public function getDatePropertyOptions()
  {
    return $this->datePropertyOptions;
  }
  /**
   * @param Google_Service_CloudSearch_PropertyDisplayOptions
   */
  public function setDisplayOptions(Google_Service_CloudSearch_PropertyDisplayOptions $displayOptions)
  {
    $this->displayOptions = $displayOptions;
  }
  /**
   * @return Google_Service_CloudSearch_PropertyDisplayOptions
   */
  public function getDisplayOptions()
  {
    return $this->displayOptions;
  }
  /**
   * @param Google_Service_CloudSearch_DoublePropertyOptions
   */
  public function setDoublePropertyOptions(Google_Service_CloudSearch_DoublePropertyOptions $doublePropertyOptions)
  {
    $this->doublePropertyOptions = $doublePropertyOptions;
  }
  /**
   * @return Google_Service_CloudSearch_DoublePropertyOptions
   */
  public function getDoublePropertyOptions()
  {
    return $this->doublePropertyOptions;
  }
  /**
   * @param Google_Service_CloudSearch_EnumPropertyOptions
   */
  public function setEnumPropertyOptions(Google_Service_CloudSearch_EnumPropertyOptions $enumPropertyOptions)
  {
    $this->enumPropertyOptions = $enumPropertyOptions;
  }
  /**
   * @return Google_Service_CloudSearch_EnumPropertyOptions
   */
  public function getEnumPropertyOptions()
  {
    return $this->enumPropertyOptions;
  }
  /**
   * @param Google_Service_CloudSearch_HtmlPropertyOptions
   */
  public function setHtmlPropertyOptions(Google_Service_CloudSearch_HtmlPropertyOptions $htmlPropertyOptions)
  {
    $this->htmlPropertyOptions = $htmlPropertyOptions;
  }
  /**
   * @return Google_Service_CloudSearch_HtmlPropertyOptions
   */
  public function getHtmlPropertyOptions()
  {
    return $this->htmlPropertyOptions;
  }
  /**
   * @param Google_Service_CloudSearch_IntegerPropertyOptions
   */
  public function setIntegerPropertyOptions(Google_Service_CloudSearch_IntegerPropertyOptions $integerPropertyOptions)
  {
    $this->integerPropertyOptions = $integerPropertyOptions;
  }
  /**
   * @return Google_Service_CloudSearch_IntegerPropertyOptions
   */
  public function getIntegerPropertyOptions()
  {
    return $this->integerPropertyOptions;
  }
  public function setIsFacetable($isFacetable)
  {
    $this->isFacetable = $isFacetable;
  }
  public function getIsFacetable()
  {
    return $this->isFacetable;
  }
  public function setIsRepeatable($isRepeatable)
  {
    $this->isRepeatable = $isRepeatable;
  }
  public function getIsRepeatable()
  {
    return $this->isRepeatable;
  }
  public function setIsReturnable($isReturnable)
  {
    $this->isReturnable = $isReturnable;
  }
  public function getIsReturnable()
  {
    return $this->isReturnable;
  }
  public function setIsSortable($isSortable)
  {
    $this->isSortable = $isSortable;
  }
  public function getIsSortable()
  {
    return $this->isSortable;
  }
  public function setIsSuggestable($isSuggestable)
  {
    $this->isSuggestable = $isSuggestable;
  }
  public function getIsSuggestable()
  {
    return $this->isSuggestable;
  }
  public function setIsWildcardSearchable($isWildcardSearchable)
  {
    $this->isWildcardSearchable = $isWildcardSearchable;
  }
  public function getIsWildcardSearchable()
  {
    return $this->isWildcardSearchable;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_CloudSearch_ObjectPropertyOptions
   */
  public function setObjectPropertyOptions(Google_Service_CloudSearch_ObjectPropertyOptions $objectPropertyOptions)
  {
    $this->objectPropertyOptions = $objectPropertyOptions;
  }
  /**
   * @return Google_Service_CloudSearch_ObjectPropertyOptions
   */
  public function getObjectPropertyOptions()
  {
    return $this->objectPropertyOptions;
  }
  /**
   * @param Google_Service_CloudSearch_TextPropertyOptions
   */
  public function setTextPropertyOptions(Google_Service_CloudSearch_TextPropertyOptions $textPropertyOptions)
  {
    $this->textPropertyOptions = $textPropertyOptions;
  }
  /**
   * @return Google_Service_CloudSearch_TextPropertyOptions
   */
  public function getTextPropertyOptions()
  {
    return $this->textPropertyOptions;
  }
  /**
   * @param Google_Service_CloudSearch_TimestampPropertyOptions
   */
  public function setTimestampPropertyOptions(Google_Service_CloudSearch_TimestampPropertyOptions $timestampPropertyOptions)
  {
    $this->timestampPropertyOptions = $timestampPropertyOptions;
  }
  /**
   * @return Google_Service_CloudSearch_TimestampPropertyOptions
   */
  public function getTimestampPropertyOptions()
  {
    return $this->timestampPropertyOptions;
  }
}
