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

namespace Google\Service\Bigquery;

class BigtableColumn extends \Google\Model
{
  /**
   * @var string
   */
  public $encoding;
  /**
   * @var string
   */
  public $fieldName;
  /**
   * @var bool
   */
  public $onlyReadLatest;
  /**
   * @var string
   */
  public $qualifierEncoded;
  /**
   * @var string
   */
  public $qualifierString;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setEncoding($encoding)
  {
    $this->encoding = $encoding;
  }
  /**
   * @return string
   */
  public function getEncoding()
  {
    return $this->encoding;
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
   * @param bool
   */
  public function setOnlyReadLatest($onlyReadLatest)
  {
    $this->onlyReadLatest = $onlyReadLatest;
  }
  /**
   * @return bool
   */
  public function getOnlyReadLatest()
  {
    return $this->onlyReadLatest;
  }
  /**
   * @param string
   */
  public function setQualifierEncoded($qualifierEncoded)
  {
    $this->qualifierEncoded = $qualifierEncoded;
  }
  /**
   * @return string
   */
  public function getQualifierEncoded()
  {
    return $this->qualifierEncoded;
  }
  /**
   * @param string
   */
  public function setQualifierString($qualifierString)
  {
    $this->qualifierString = $qualifierString;
  }
  /**
   * @return string
   */
  public function getQualifierString()
  {
    return $this->qualifierString;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BigtableColumn::class, 'Google_Service_Bigquery_BigtableColumn');
