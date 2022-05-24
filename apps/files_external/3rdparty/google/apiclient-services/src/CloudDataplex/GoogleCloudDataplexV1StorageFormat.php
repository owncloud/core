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

class GoogleCloudDataplexV1StorageFormat extends \Google\Model
{
  /**
   * @var string
   */
  public $compressionFormat;
  protected $csvType = GoogleCloudDataplexV1StorageFormatCsvOptions::class;
  protected $csvDataType = '';
  /**
   * @var string
   */
  public $format;
  protected $jsonType = GoogleCloudDataplexV1StorageFormatJsonOptions::class;
  protected $jsonDataType = '';
  /**
   * @var string
   */
  public $mimeType;

  /**
   * @param string
   */
  public function setCompressionFormat($compressionFormat)
  {
    $this->compressionFormat = $compressionFormat;
  }
  /**
   * @return string
   */
  public function getCompressionFormat()
  {
    return $this->compressionFormat;
  }
  /**
   * @param GoogleCloudDataplexV1StorageFormatCsvOptions
   */
  public function setCsv(GoogleCloudDataplexV1StorageFormatCsvOptions $csv)
  {
    $this->csv = $csv;
  }
  /**
   * @return GoogleCloudDataplexV1StorageFormatCsvOptions
   */
  public function getCsv()
  {
    return $this->csv;
  }
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
   * @param GoogleCloudDataplexV1StorageFormatJsonOptions
   */
  public function setJson(GoogleCloudDataplexV1StorageFormatJsonOptions $json)
  {
    $this->json = $json;
  }
  /**
   * @return GoogleCloudDataplexV1StorageFormatJsonOptions
   */
  public function getJson()
  {
    return $this->json;
  }
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1StorageFormat::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1StorageFormat');
