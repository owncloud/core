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

namespace Google\Service\CloudHealthcare;

class FhirConfig extends \Google\Collection
{
  protected $collection_key = 'fieldMetadataList';
  /**
   * @var bool
   */
  public $defaultKeepExtensions;
  protected $fieldMetadataListType = FieldMetadata::class;
  protected $fieldMetadataListDataType = 'array';

  /**
   * @param bool
   */
  public function setDefaultKeepExtensions($defaultKeepExtensions)
  {
    $this->defaultKeepExtensions = $defaultKeepExtensions;
  }
  /**
   * @return bool
   */
  public function getDefaultKeepExtensions()
  {
    return $this->defaultKeepExtensions;
  }
  /**
   * @param FieldMetadata[]
   */
  public function setFieldMetadataList($fieldMetadataList)
  {
    $this->fieldMetadataList = $fieldMetadataList;
  }
  /**
   * @return FieldMetadata[]
   */
  public function getFieldMetadataList()
  {
    return $this->fieldMetadataList;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FhirConfig::class, 'Google_Service_CloudHealthcare_FhirConfig');
