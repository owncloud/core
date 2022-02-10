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

namespace Google\Service\Books;

class ReadingPosition extends \Google\Model
{
  /**
   * @var string
   */
  public $epubCfiPosition;
  /**
   * @var string
   */
  public $gbImagePosition;
  /**
   * @var string
   */
  public $gbTextPosition;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $pdfPosition;
  /**
   * @var string
   */
  public $updated;
  /**
   * @var string
   */
  public $volumeId;

  /**
   * @param string
   */
  public function setEpubCfiPosition($epubCfiPosition)
  {
    $this->epubCfiPosition = $epubCfiPosition;
  }
  /**
   * @return string
   */
  public function getEpubCfiPosition()
  {
    return $this->epubCfiPosition;
  }
  /**
   * @param string
   */
  public function setGbImagePosition($gbImagePosition)
  {
    $this->gbImagePosition = $gbImagePosition;
  }
  /**
   * @return string
   */
  public function getGbImagePosition()
  {
    return $this->gbImagePosition;
  }
  /**
   * @param string
   */
  public function setGbTextPosition($gbTextPosition)
  {
    $this->gbTextPosition = $gbTextPosition;
  }
  /**
   * @return string
   */
  public function getGbTextPosition()
  {
    return $this->gbTextPosition;
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
   * @param string
   */
  public function setPdfPosition($pdfPosition)
  {
    $this->pdfPosition = $pdfPosition;
  }
  /**
   * @return string
   */
  public function getPdfPosition()
  {
    return $this->pdfPosition;
  }
  /**
   * @param string
   */
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  /**
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
  }
  /**
   * @param string
   */
  public function setVolumeId($volumeId)
  {
    $this->volumeId = $volumeId;
  }
  /**
   * @return string
   */
  public function getVolumeId()
  {
    return $this->volumeId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReadingPosition::class, 'Google_Service_Books_ReadingPosition');
