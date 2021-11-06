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
  public $allowJaggedRows;
  public $allowQuotedNewlines;
  public $encoding;
  public $fieldDelimiter;
  public $nullMarker;
  public $quote;
  public $skipLeadingRows;

  public function setAllowJaggedRows($allowJaggedRows)
  {
    $this->allowJaggedRows = $allowJaggedRows;
  }
  public function getAllowJaggedRows()
  {
    return $this->allowJaggedRows;
  }
  public function setAllowQuotedNewlines($allowQuotedNewlines)
  {
    $this->allowQuotedNewlines = $allowQuotedNewlines;
  }
  public function getAllowQuotedNewlines()
  {
    return $this->allowQuotedNewlines;
  }
  public function setEncoding($encoding)
  {
    $this->encoding = $encoding;
  }
  public function getEncoding()
  {
    return $this->encoding;
  }
  public function setFieldDelimiter($fieldDelimiter)
  {
    $this->fieldDelimiter = $fieldDelimiter;
  }
  public function getFieldDelimiter()
  {
    return $this->fieldDelimiter;
  }
  public function setNullMarker($nullMarker)
  {
    $this->nullMarker = $nullMarker;
  }
  public function getNullMarker()
  {
    return $this->nullMarker;
  }
  public function setQuote($quote)
  {
    $this->quote = $quote;
  }
  public function getQuote()
  {
    return $this->quote;
  }
  public function setSkipLeadingRows($skipLeadingRows)
  {
    $this->skipLeadingRows = $skipLeadingRows;
  }
  public function getSkipLeadingRows()
  {
    return $this->skipLeadingRows;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CsvOptions::class, 'Google_Service_Bigquery_CsvOptions');
