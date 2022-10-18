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

namespace Google\Service\Contentwarehouse;

class OcrPhotoTextBox extends \Google\Collection
{
  protected $collection_key = 'symbolWidths';
  /**
   * @var int
   */
  public $blockId;
  protected $boxType = OcrPhotoBoundingBox::class;
  protected $boxDataType = '';
  /**
   * @var string
   */
  public $contentType;
  /**
   * @var int[]
   */
  public $symbolWidths;
  /**
   * @var string
   */
  public $text;

  /**
   * @param int
   */
  public function setBlockId($blockId)
  {
    $this->blockId = $blockId;
  }
  /**
   * @return int
   */
  public function getBlockId()
  {
    return $this->blockId;
  }
  /**
   * @param OcrPhotoBoundingBox
   */
  public function setBox(OcrPhotoBoundingBox $box)
  {
    $this->box = $box;
  }
  /**
   * @return OcrPhotoBoundingBox
   */
  public function getBox()
  {
    return $this->box;
  }
  /**
   * @param string
   */
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  /**
   * @return string
   */
  public function getContentType()
  {
    return $this->contentType;
  }
  /**
   * @param int[]
   */
  public function setSymbolWidths($symbolWidths)
  {
    $this->symbolWidths = $symbolWidths;
  }
  /**
   * @return int[]
   */
  public function getSymbolWidths()
  {
    return $this->symbolWidths;
  }
  /**
   * @param string
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string
   */
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OcrPhotoTextBox::class, 'Google_Service_Contentwarehouse_OcrPhotoTextBox');
