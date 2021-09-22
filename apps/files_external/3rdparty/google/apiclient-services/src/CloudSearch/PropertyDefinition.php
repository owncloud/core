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

namespace Google\Service\CloudSearch;

class PropertyDefinition extends \Google\Model
{
  protected $booleanPropertyOptionsType = BooleanPropertyOptions::class;
  protected $booleanPropertyOptionsDataType = '';
  protected $datePropertyOptionsType = DatePropertyOptions::class;
  protected $datePropertyOptionsDataType = '';
  protected $displayOptionsType = PropertyDisplayOptions::class;
  protected $displayOptionsDataType = '';
  protected $doublePropertyOptionsType = DoublePropertyOptions::class;
  protected $doublePropertyOptionsDataType = '';
  protected $enumPropertyOptionsType = EnumPropertyOptions::class;
  protected $enumPropertyOptionsDataType = '';
  protected $htmlPropertyOptionsType = HtmlPropertyOptions::class;
  protected $htmlPropertyOptionsDataType = '';
  protected $integerPropertyOptionsType = IntegerPropertyOptions::class;
  protected $integerPropertyOptionsDataType = '';
  public $isFacetable;
  public $isRepeatable;
  public $isReturnable;
  public $isSortable;
  public $isSuggestable;
  public $isWildcardSearchable;
  public $name;
  protected $objectPropertyOptionsType = ObjectPropertyOptions::class;
  protected $objectPropertyOptionsDataType = '';
  protected $textPropertyOptionsType = TextPropertyOptions::class;
  protected $textPropertyOptionsDataType = '';
  protected $timestampPropertyOptionsType = TimestampPropertyOptions::class;
  protected $timestampPropertyOptionsDataType = '';

  /**
   * @param BooleanPropertyOptions
   */
  public function setBooleanPropertyOptions(BooleanPropertyOptions $booleanPropertyOptions)
  {
    $this->booleanPropertyOptions = $booleanPropertyOptions;
  }
  /**
   * @return BooleanPropertyOptions
   */
  public function getBooleanPropertyOptions()
  {
    return $this->booleanPropertyOptions;
  }
  /**
   * @param DatePropertyOptions
   */
  public function setDatePropertyOptions(DatePropertyOptions $datePropertyOptions)
  {
    $this->datePropertyOptions = $datePropertyOptions;
  }
  /**
   * @return DatePropertyOptions
   */
  public function getDatePropertyOptions()
  {
    return $this->datePropertyOptions;
  }
  /**
   * @param PropertyDisplayOptions
   */
  public function setDisplayOptions(PropertyDisplayOptions $displayOptions)
  {
    $this->displayOptions = $displayOptions;
  }
  /**
   * @return PropertyDisplayOptions
   */
  public function getDisplayOptions()
  {
    return $this->displayOptions;
  }
  /**
   * @param DoublePropertyOptions
   */
  public function setDoublePropertyOptions(DoublePropertyOptions $doublePropertyOptions)
  {
    $this->doublePropertyOptions = $doublePropertyOptions;
  }
  /**
   * @return DoublePropertyOptions
   */
  public function getDoublePropertyOptions()
  {
    return $this->doublePropertyOptions;
  }
  /**
   * @param EnumPropertyOptions
   */
  public function setEnumPropertyOptions(EnumPropertyOptions $enumPropertyOptions)
  {
    $this->enumPropertyOptions = $enumPropertyOptions;
  }
  /**
   * @return EnumPropertyOptions
   */
  public function getEnumPropertyOptions()
  {
    return $this->enumPropertyOptions;
  }
  /**
   * @param HtmlPropertyOptions
   */
  public function setHtmlPropertyOptions(HtmlPropertyOptions $htmlPropertyOptions)
  {
    $this->htmlPropertyOptions = $htmlPropertyOptions;
  }
  /**
   * @return HtmlPropertyOptions
   */
  public function getHtmlPropertyOptions()
  {
    return $this->htmlPropertyOptions;
  }
  /**
   * @param IntegerPropertyOptions
   */
  public function setIntegerPropertyOptions(IntegerPropertyOptions $integerPropertyOptions)
  {
    $this->integerPropertyOptions = $integerPropertyOptions;
  }
  /**
   * @return IntegerPropertyOptions
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
   * @param ObjectPropertyOptions
   */
  public function setObjectPropertyOptions(ObjectPropertyOptions $objectPropertyOptions)
  {
    $this->objectPropertyOptions = $objectPropertyOptions;
  }
  /**
   * @return ObjectPropertyOptions
   */
  public function getObjectPropertyOptions()
  {
    return $this->objectPropertyOptions;
  }
  /**
   * @param TextPropertyOptions
   */
  public function setTextPropertyOptions(TextPropertyOptions $textPropertyOptions)
  {
    $this->textPropertyOptions = $textPropertyOptions;
  }
  /**
   * @return TextPropertyOptions
   */
  public function getTextPropertyOptions()
  {
    return $this->textPropertyOptions;
  }
  /**
   * @param TimestampPropertyOptions
   */
  public function setTimestampPropertyOptions(TimestampPropertyOptions $timestampPropertyOptions)
  {
    $this->timestampPropertyOptions = $timestampPropertyOptions;
  }
  /**
   * @return TimestampPropertyOptions
   */
  public function getTimestampPropertyOptions()
  {
    return $this->timestampPropertyOptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PropertyDefinition::class, 'Google_Service_CloudSearch_PropertyDefinition');
