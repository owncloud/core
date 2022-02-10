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

namespace Google\Service\Datastream;

class GcsDestinationConfig extends \Google\Model
{
  protected $avroFileFormatType = AvroFileFormat::class;
  protected $avroFileFormatDataType = '';
  /**
   * @var string
   */
  public $fileRotationInterval;
  /**
   * @var int
   */
  public $fileRotationMb;
  protected $jsonFileFormatType = JsonFileFormat::class;
  protected $jsonFileFormatDataType = '';
  /**
   * @var string
   */
  public $path;

  /**
   * @param AvroFileFormat
   */
  public function setAvroFileFormat(AvroFileFormat $avroFileFormat)
  {
    $this->avroFileFormat = $avroFileFormat;
  }
  /**
   * @return AvroFileFormat
   */
  public function getAvroFileFormat()
  {
    return $this->avroFileFormat;
  }
  /**
   * @param string
   */
  public function setFileRotationInterval($fileRotationInterval)
  {
    $this->fileRotationInterval = $fileRotationInterval;
  }
  /**
   * @return string
   */
  public function getFileRotationInterval()
  {
    return $this->fileRotationInterval;
  }
  /**
   * @param int
   */
  public function setFileRotationMb($fileRotationMb)
  {
    $this->fileRotationMb = $fileRotationMb;
  }
  /**
   * @return int
   */
  public function getFileRotationMb()
  {
    return $this->fileRotationMb;
  }
  /**
   * @param JsonFileFormat
   */
  public function setJsonFileFormat(JsonFileFormat $jsonFileFormat)
  {
    $this->jsonFileFormat = $jsonFileFormat;
  }
  /**
   * @return JsonFileFormat
   */
  public function getJsonFileFormat()
  {
    return $this->jsonFileFormat;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GcsDestinationConfig::class, 'Google_Service_Datastream_GcsDestinationConfig');
