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

class GeostoreFeaturePropertyIdProto extends \Google\Model
{
  /**
   * @var string
   */
  public $attachmentTypeId;
  /**
   * @var string
   */
  public $attributeId;
  /**
   * @var string
   */
  public $fieldType;
  /**
   * @var string
   */
  public $kgPropertyId;

  /**
   * @param string
   */
  public function setAttachmentTypeId($attachmentTypeId)
  {
    $this->attachmentTypeId = $attachmentTypeId;
  }
  /**
   * @return string
   */
  public function getAttachmentTypeId()
  {
    return $this->attachmentTypeId;
  }
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
   * @param string
   */
  public function setFieldType($fieldType)
  {
    $this->fieldType = $fieldType;
  }
  /**
   * @return string
   */
  public function getFieldType()
  {
    return $this->fieldType;
  }
  /**
   * @param string
   */
  public function setKgPropertyId($kgPropertyId)
  {
    $this->kgPropertyId = $kgPropertyId;
  }
  /**
   * @return string
   */
  public function getKgPropertyId()
  {
    return $this->kgPropertyId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreFeaturePropertyIdProto::class, 'Google_Service_Contentwarehouse_GeostoreFeaturePropertyIdProto');
