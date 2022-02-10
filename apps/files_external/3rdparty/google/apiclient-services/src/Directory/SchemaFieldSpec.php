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

namespace Google\Service\Directory;

class SchemaFieldSpec extends \Google\Model
{
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $fieldId;
  /**
   * @var string
   */
  public $fieldName;
  /**
   * @var string
   */
  public $fieldType;
  /**
   * @var bool
   */
  public $indexed;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var bool
   */
  public $multiValued;
  protected $numericIndexingSpecType = SchemaFieldSpecNumericIndexingSpec::class;
  protected $numericIndexingSpecDataType = '';
  /**
   * @var string
   */
  public $readAccessType;

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
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setFieldId($fieldId)
  {
    $this->fieldId = $fieldId;
  }
  /**
   * @return string
   */
  public function getFieldId()
  {
    return $this->fieldId;
  }
  /**
   * @param string
   */
  public function setFieldName($fieldName)
  {
    $this->fieldName = $fieldName;
  }
  /**
   * @return string
   */
  public function getFieldName()
  {
    return $this->fieldName;
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
   * @param bool
   */
  public function setIndexed($indexed)
  {
    $this->indexed = $indexed;
  }
  /**
   * @return bool
   */
  public function getIndexed()
  {
    return $this->indexed;
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
   * @param bool
   */
  public function setMultiValued($multiValued)
  {
    $this->multiValued = $multiValued;
  }
  /**
   * @return bool
   */
  public function getMultiValued()
  {
    return $this->multiValued;
  }
  /**
   * @param SchemaFieldSpecNumericIndexingSpec
   */
  public function setNumericIndexingSpec(SchemaFieldSpecNumericIndexingSpec $numericIndexingSpec)
  {
    $this->numericIndexingSpec = $numericIndexingSpec;
  }
  /**
   * @return SchemaFieldSpecNumericIndexingSpec
   */
  public function getNumericIndexingSpec()
  {
    return $this->numericIndexingSpec;
  }
  /**
   * @param string
   */
  public function setReadAccessType($readAccessType)
  {
    $this->readAccessType = $readAccessType;
  }
  /**
   * @return string
   */
  public function getReadAccessType()
  {
    return $this->readAccessType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SchemaFieldSpec::class, 'Google_Service_Directory_SchemaFieldSpec');
