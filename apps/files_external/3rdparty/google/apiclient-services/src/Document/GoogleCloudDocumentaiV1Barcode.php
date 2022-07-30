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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1Barcode extends \Google\Model
{
  /**
   * @var string
   */
  public $format;
  /**
   * @var string
   */
  public $rawValue;
  /**
   * @var string
   */
  public $valueFormat;

  /**
   * @param string
   */
  public function setFormat($format)
  {
    $this->format = $format;
  }
  /**
   * @return string
   */
  public function getFormat()
  {
    return $this->format;
  }
  /**
   * @param string
   */
  public function setRawValue($rawValue)
  {
    $this->rawValue = $rawValue;
  }
  /**
   * @return string
   */
  public function getRawValue()
  {
    return $this->rawValue;
  }
  /**
   * @param string
   */
  public function setValueFormat($valueFormat)
  {
    $this->valueFormat = $valueFormat;
  }
  /**
   * @return string
   */
  public function getValueFormat()
  {
    return $this->valueFormat;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1Barcode::class, 'Google_Service_Document_GoogleCloudDocumentaiV1Barcode');
