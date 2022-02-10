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

namespace Google\Service\Dfareporting;

class VideoFormat extends \Google\Model
{
  /**
   * @var string
   */
  public $fileType;
  /**
   * @var int
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $resolutionType = Size::class;
  protected $resolutionDataType = '';
  /**
   * @var int
   */
  public $targetBitRate;

  /**
   * @param string
   */
  public function setFileType($fileType)
  {
    $this->fileType = $fileType;
  }
  /**
   * @return string
   */
  public function getFileType()
  {
    return $this->fileType;
  }
  /**
   * @param int
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return int
   */
  public function getId()
  {
    return $this->id;
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
   * @param Size
   */
  public function setResolution(Size $resolution)
  {
    $this->resolution = $resolution;
  }
  /**
   * @return Size
   */
  public function getResolution()
  {
    return $this->resolution;
  }
  /**
   * @param int
   */
  public function setTargetBitRate($targetBitRate)
  {
    $this->targetBitRate = $targetBitRate;
  }
  /**
   * @return int
   */
  public function getTargetBitRate()
  {
    return $this->targetBitRate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoFormat::class, 'Google_Service_Dfareporting_VideoFormat');
