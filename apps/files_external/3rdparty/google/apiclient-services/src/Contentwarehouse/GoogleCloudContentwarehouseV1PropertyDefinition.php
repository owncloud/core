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

class GoogleCloudContentwarehouseV1PropertyDefinition extends \Google\Model
{
  protected $dateTimeTypeOptionsType = GoogleCloudContentwarehouseV1DateTimeTypeOptions::class;
  protected $dateTimeTypeOptionsDataType = '';
  /**
   * @var string
   */
  public $displayName;
  protected $enumTypeOptionsType = GoogleCloudContentwarehouseV1EnumTypeOptions::class;
  protected $enumTypeOptionsDataType = '';
  protected $floatTypeOptionsType = GoogleCloudContentwarehouseV1FloatTypeOptions::class;
  protected $floatTypeOptionsDataType = '';
  protected $integerTypeOptionsType = GoogleCloudContentwarehouseV1IntegerTypeOptions::class;
  protected $integerTypeOptionsDataType = '';
  /**
   * @var bool
   */
  public $isFilterable;
  /**
   * @var bool
   */
  public $isMetadata;
  /**
   * @var bool
   */
  public $isRepeatable;
  /**
   * @var bool
   */
  public $isRequired;
  /**
   * @var bool
   */
  public $isSearchable;
  protected $mapTypeOptionsType = GoogleCloudContentwarehouseV1MapTypeOptions::class;
  protected $mapTypeOptionsDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $propertyTypeOptionsType = GoogleCloudContentwarehouseV1PropertyTypeOptions::class;
  protected $propertyTypeOptionsDataType = '';
  protected $textTypeOptionsType = GoogleCloudContentwarehouseV1TextTypeOptions::class;
  protected $textTypeOptionsDataType = '';
  protected $timestampTypeOptionsType = GoogleCloudContentwarehouseV1TimestampTypeOptions::class;
  protected $timestampTypeOptionsDataType = '';

  /**
   * @param GoogleCloudContentwarehouseV1DateTimeTypeOptions
   */
  public function setDateTimeTypeOptions(GoogleCloudContentwarehouseV1DateTimeTypeOptions $dateTimeTypeOptions)
  {
    $this->dateTimeTypeOptions = $dateTimeTypeOptions;
  }
  /**
   * @return GoogleCloudContentwarehouseV1DateTimeTypeOptions
   */
  public function getDateTimeTypeOptions()
  {
    return $this->dateTimeTypeOptions;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param GoogleCloudContentwarehouseV1EnumTypeOptions
   */
  public function setEnumTypeOptions(GoogleCloudContentwarehouseV1EnumTypeOptions $enumTypeOptions)
  {
    $this->enumTypeOptions = $enumTypeOptions;
  }
  /**
   * @return GoogleCloudContentwarehouseV1EnumTypeOptions
   */
  public function getEnumTypeOptions()
  {
    return $this->enumTypeOptions;
  }
  /**
   * @param GoogleCloudContentwarehouseV1FloatTypeOptions
   */
  public function setFloatTypeOptions(GoogleCloudContentwarehouseV1FloatTypeOptions $floatTypeOptions)
  {
    $this->floatTypeOptions = $floatTypeOptions;
  }
  /**
   * @return GoogleCloudContentwarehouseV1FloatTypeOptions
   */
  public function getFloatTypeOptions()
  {
    return $this->floatTypeOptions;
  }
  /**
   * @param GoogleCloudContentwarehouseV1IntegerTypeOptions
   */
  public function setIntegerTypeOptions(GoogleCloudContentwarehouseV1IntegerTypeOptions $integerTypeOptions)
  {
    $this->integerTypeOptions = $integerTypeOptions;
  }
  /**
   * @return GoogleCloudContentwarehouseV1IntegerTypeOptions
   */
  public function getIntegerTypeOptions()
  {
    return $this->integerTypeOptions;
  }
  /**
   * @param bool
   */
  public function setIsFilterable($isFilterable)
  {
    $this->isFilterable = $isFilterable;
  }
  /**
   * @return bool
   */
  public function getIsFilterable()
  {
    return $this->isFilterable;
  }
  /**
   * @param bool
   */
  public function setIsMetadata($isMetadata)
  {
    $this->isMetadata = $isMetadata;
  }
  /**
   * @return bool
   */
  public function getIsMetadata()
  {
    return $this->isMetadata;
  }
  /**
   * @param bool
   */
  public function setIsRepeatable($isRepeatable)
  {
    $this->isRepeatable = $isRepeatable;
  }
  /**
   * @return bool
   */
  public function getIsRepeatable()
  {
    return $this->isRepeatable;
  }
  /**
   * @param bool
   */
  public function setIsRequired($isRequired)
  {
    $this->isRequired = $isRequired;
  }
  /**
   * @return bool
   */
  public function getIsRequired()
  {
    return $this->isRequired;
  }
  /**
   * @param bool
   */
  public function setIsSearchable($isSearchable)
  {
    $this->isSearchable = $isSearchable;
  }
  /**
   * @return bool
   */
  public function getIsSearchable()
  {
    return $this->isSearchable;
  }
  /**
   * @param GoogleCloudContentwarehouseV1MapTypeOptions
   */
  public function setMapTypeOptions(GoogleCloudContentwarehouseV1MapTypeOptions $mapTypeOptions)
  {
    $this->mapTypeOptions = $mapTypeOptions;
  }
  /**
   * @return GoogleCloudContentwarehouseV1MapTypeOptions
   */
  public function getMapTypeOptions()
  {
    return $this->mapTypeOptions;
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
   * @param GoogleCloudContentwarehouseV1PropertyTypeOptions
   */
  public function setPropertyTypeOptions(GoogleCloudContentwarehouseV1PropertyTypeOptions $propertyTypeOptions)
  {
    $this->propertyTypeOptions = $propertyTypeOptions;
  }
  /**
   * @return GoogleCloudContentwarehouseV1PropertyTypeOptions
   */
  public function getPropertyTypeOptions()
  {
    return $this->propertyTypeOptions;
  }
  /**
   * @param GoogleCloudContentwarehouseV1TextTypeOptions
   */
  public function setTextTypeOptions(GoogleCloudContentwarehouseV1TextTypeOptions $textTypeOptions)
  {
    $this->textTypeOptions = $textTypeOptions;
  }
  /**
   * @return GoogleCloudContentwarehouseV1TextTypeOptions
   */
  public function getTextTypeOptions()
  {
    return $this->textTypeOptions;
  }
  /**
   * @param GoogleCloudContentwarehouseV1TimestampTypeOptions
   */
  public function setTimestampTypeOptions(GoogleCloudContentwarehouseV1TimestampTypeOptions $timestampTypeOptions)
  {
    $this->timestampTypeOptions = $timestampTypeOptions;
  }
  /**
   * @return GoogleCloudContentwarehouseV1TimestampTypeOptions
   */
  public function getTimestampTypeOptions()
  {
    return $this->timestampTypeOptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1PropertyDefinition::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1PropertyDefinition');
