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

class GeostoreFieldWithRightsProto extends \Google\Model
{
  /**
   * @var string
   */
  public $attributeId;
  protected $featurePropertyIdType = GeostoreFeaturePropertyIdProto::class;
  protected $featurePropertyIdDataType = '';
  /**
   * @var int
   */
  public $fieldType;
  /**
   * @var string
   */
  public $minRightsLevel;

  /**
   * @param string
   */
  public function setAttributeId($attributeId)
  {
    $this->attributeId = $attributeId;
  }
  /**
   * @return string
   */
  public function getAttributeId()
  {
    return $this->attributeId;
  }
  /**
   * @param GeostoreFeaturePropertyIdProto
   */
  public function setFeaturePropertyId(GeostoreFeaturePropertyIdProto $featurePropertyId)
  {
    $this->featurePropertyId = $featurePropertyId;
  }
  /**
   * @return GeostoreFeaturePropertyIdProto
   */
  public function getFeaturePropertyId()
  {
    return $this->featurePropertyId;
  }
  /**
   * @param int
   */
  public function setFieldType($fieldType)
  {
    $this->fieldType = $fieldType;
  }
  /**
   * @return int
   */
  public function getFieldType()
  {
    return $this->fieldType;
  }
  /**
   * @param string
   */
  public function setMinRightsLevel($minRightsLevel)
  {
    $this->minRightsLevel = $minRightsLevel;
  }
  /**
   * @return string
   */
  public function getMinRightsLevel()
  {
    return $this->minRightsLevel;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreFieldWithRightsProto::class, 'Google_Service_Contentwarehouse_GeostoreFieldWithRightsProto');
