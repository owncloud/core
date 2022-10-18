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

class GoogleCloudContentwarehouseV1Property extends \Google\Model
{
  protected $dateTimeValuesType = GoogleCloudContentwarehouseV1DateTimeArray::class;
  protected $dateTimeValuesDataType = '';
  protected $enumValuesType = GoogleCloudContentwarehouseV1EnumArray::class;
  protected $enumValuesDataType = '';
  protected $floatValuesType = GoogleCloudContentwarehouseV1FloatArray::class;
  protected $floatValuesDataType = '';
  protected $integerValuesType = GoogleCloudContentwarehouseV1IntegerArray::class;
  protected $integerValuesDataType = '';
  protected $mapPropertyType = GoogleCloudContentwarehouseV1MapProperty::class;
  protected $mapPropertyDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $propertyValuesType = GoogleCloudContentwarehouseV1PropertyArray::class;
  protected $propertyValuesDataType = '';
  protected $textValuesType = GoogleCloudContentwarehouseV1TextArray::class;
  protected $textValuesDataType = '';
  protected $timestampValuesType = GoogleCloudContentwarehouseV1TimestampArray::class;
  protected $timestampValuesDataType = '';

  /**
   * @param GoogleCloudContentwarehouseV1DateTimeArray
   */
  public function setDateTimeValues(GoogleCloudContentwarehouseV1DateTimeArray $dateTimeValues)
  {
    $this->dateTimeValues = $dateTimeValues;
  }
  /**
   * @return GoogleCloudContentwarehouseV1DateTimeArray
   */
  public function getDateTimeValues()
  {
    return $this->dateTimeValues;
  }
  /**
   * @param GoogleCloudContentwarehouseV1EnumArray
   */
  public function setEnumValues(GoogleCloudContentwarehouseV1EnumArray $enumValues)
  {
    $this->enumValues = $enumValues;
  }
  /**
   * @return GoogleCloudContentwarehouseV1EnumArray
   */
  public function getEnumValues()
  {
    return $this->enumValues;
  }
  /**
   * @param GoogleCloudContentwarehouseV1FloatArray
   */
  public function setFloatValues(GoogleCloudContentwarehouseV1FloatArray $floatValues)
  {
    $this->floatValues = $floatValues;
  }
  /**
   * @return GoogleCloudContentwarehouseV1FloatArray
   */
  public function getFloatValues()
  {
    return $this->floatValues;
  }
  /**
   * @param GoogleCloudContentwarehouseV1IntegerArray
   */
  public function setIntegerValues(GoogleCloudContentwarehouseV1IntegerArray $integerValues)
  {
    $this->integerValues = $integerValues;
  }
  /**
   * @return GoogleCloudContentwarehouseV1IntegerArray
   */
  public function getIntegerValues()
  {
    return $this->integerValues;
  }
  /**
   * @param GoogleCloudContentwarehouseV1MapProperty
   */
  public function setMapProperty(GoogleCloudContentwarehouseV1MapProperty $mapProperty)
  {
    $this->mapProperty = $mapProperty;
  }
  /**
   * @return GoogleCloudContentwarehouseV1MapProperty
   */
  public function getMapProperty()
  {
    return $this->mapProperty;
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
   * @param GoogleCloudContentwarehouseV1PropertyArray
   */
  public function setPropertyValues(GoogleCloudContentwarehouseV1PropertyArray $propertyValues)
  {
    $this->propertyValues = $propertyValues;
  }
  /**
   * @return GoogleCloudContentwarehouseV1PropertyArray
   */
  public function getPropertyValues()
  {
    return $this->propertyValues;
  }
  /**
   * @param GoogleCloudContentwarehouseV1TextArray
   */
  public function setTextValues(GoogleCloudContentwarehouseV1TextArray $textValues)
  {
    $this->textValues = $textValues;
  }
  /**
   * @return GoogleCloudContentwarehouseV1TextArray
   */
  public function getTextValues()
  {
    return $this->textValues;
  }
  /**
   * @param GoogleCloudContentwarehouseV1TimestampArray
   */
  public function setTimestampValues(GoogleCloudContentwarehouseV1TimestampArray $timestampValues)
  {
    $this->timestampValues = $timestampValues;
  }
  /**
   * @return GoogleCloudContentwarehouseV1TimestampArray
   */
  public function getTimestampValues()
  {
    return $this->timestampValues;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudContentwarehouseV1Property::class, 'Google_Service_Contentwarehouse_GoogleCloudContentwarehouseV1Property');
