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

namespace Google\Service\ShoppingContent;

class DatafeedFormat extends \Google\Model
{
  /**
   * @var string
   */
  public $columnDelimiter;
  /**
   * @var string
   */
  public $fileEncoding;
  /**
   * @var string
   */
  public $quotingMode;

  /**
   * @param string
   */
  public function setColumnDelimiter($columnDelimiter)
  {
    $this->columnDelimiter = $columnDelimiter;
  }
  /**
   * @return string
   */
  public function getColumnDelimiter()
  {
    return $this->columnDelimiter;
  }
  /**
   * @param string
   */
  public function setFileEncoding($fileEncoding)
  {
    $this->fileEncoding = $fileEncoding;
  }
  /**
   * @return string
   */
  public function getFileEncoding()
  {
    return $this->fileEncoding;
  }
  /**
   * @param string
   */
  public function setQuotingMode($quotingMode)
  {
    $this->quotingMode = $quotingMode;
  }
  /**
   * @return string
   */
  public function getQuotingMode()
  {
    return $this->quotingMode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DatafeedFormat::class, 'Google_Service_ShoppingContent_DatafeedFormat');
