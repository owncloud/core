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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1ZoneDiscoverySpecCsvOptions extends \Google\Model
{
  /**
   * @var string
   */
  public $delimiter;
  /**
   * @var bool
   */
  public $disableTypeInference;
  /**
   * @var string
   */
  public $encoding;
  /**
   * @var int
   */
  public $headerRows;

  /**
   * @param string
   */
  public function setDelimiter($delimiter)
  {
    $this->delimiter = $delimiter;
  }
  /**
   * @return string
   */
  public function getDelimiter()
  {
    return $this->delimiter;
  }
  /**
   * @param bool
   */
  public function setDisableTypeInference($disableTypeInference)
  {
    $this->disableTypeInference = $disableTypeInference;
  }
  /**
   * @return bool
   */
  public function getDisableTypeInference()
  {
    return $this->disableTypeInference;
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
   * @param int
   */
  public function setHeaderRows($headerRows)
  {
    $this->headerRows = $headerRows;
  }
  /**
   * @return int
   */
  public function getHeaderRows()
  {
    return $this->headerRows;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1ZoneDiscoverySpecCsvOptions::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1ZoneDiscoverySpecCsvOptions');
