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

class CsvOptions extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "nullMarker" => "null_marker",
  ];
  /**
   * @var bool
   */
  public $allowJaggedRows;
  /**
   * @var bool
   */
  public $allowQuotedNewlines;
  /**
   * @var string
   */
  public $encoding;
  /**
   * @var string
   */
  public $fieldDelimiter;
  /**
   * @var string
   */
  public $nullMarker;
  /**
   * @var bool
   */
  public $preserveAsciiControlCharacters;
  /**
   * @var string
   */
  public $quote;
  /**
   * @var string
   */
  public $skipLeadingRows;

  /**
   * @param bool
   */
  public function setAllowJaggedRows($allowJaggedRows)
  {
    $this->allowJaggedRows = $allowJaggedRows;
  }
  /**
   * @return bool
   */
  public function getAllowJaggedRows()
  {
    return $this->allowJaggedRows;
  }
  /**
   * @param bool
   */
  public function setAllowQuotedNewlines($allowQuotedNewlines)
  {
    $this->allowQuotedNewlines = $allowQuotedNewlines;
  }
  /**
   * @return bool
   */
  public function getAllowQuotedNewlines()
  {
    return $this->allowQuotedNewlines;
  }
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
  public function setFieldDelimiter($fieldDelimiter)
  {
    $this->fieldDelimiter = $fieldDelimiter;
  }
  /**
   * @return string
   */
  public function getFieldDelimiter()
  {
    return $this->fieldDelimiter;
  }
  /**
   * @param string
   */
  public function setNullMarker($nullMarker)
  {
    $this->nullMarker = $nullMarker;
  }
  /**
   * @return string
   */
  public function getNullMarker()
  {
    return $this->nullMarker;
  }
  /**
   * @param bool
   */
  public function setPreserveAsciiControlCharacters($preserveAsciiControlCharacters)
  {
    $this->preserveAsciiControlCharacters = $preserveAsciiControlCharacters;
  }
  /**
   * @return bool
   */
  public function getPreserveAsciiControlCharacters()
  {
    return $this->preserveAsciiControlCharacters;
  }
  /**
   * @param string
   */
  public function setQuote($quote)
  {
    $this->quote = $quote;
  }
  /**
   * @return string
   */
  public function getQuote()
  {
    return $this->quote;
  }
  /**
   * @param string
   */
  public function setSkipLeadingRows($skipLeadingRows)
  {
    $this->skipLeadingRows = $skipLeadingRows;
  }
  /**
   * @return string
   */
  public function getSkipLeadingRows()
  {
    return $this->skipLeadingRows;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CsvOptions::class, 'Google_Service_Bigquery_CsvOptions');
