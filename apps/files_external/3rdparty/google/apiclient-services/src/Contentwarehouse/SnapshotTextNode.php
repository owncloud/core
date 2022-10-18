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

class SnapshotTextNode extends \Google\Model
{
  protected $boundingBoxType = SnapshotBox::class;
  protected $boundingBoxDataType = '';
  /**
   * @var float
   */
  public $fontSize;
  /**
   * @var int
   */
  public $inLink;
  /**
   * @var int
   */
  public $maxSplit;
  /**
   * @var string
   */
  public $text;

  /**
   * @param SnapshotBox
   */
  public function setBoundingBox(SnapshotBox $boundingBox)
  {
    $this->boundingBox = $boundingBox;
  }
  /**
   * @return SnapshotBox
   */
  public function getBoundingBox()
  {
    return $this->boundingBox;
  }
  /**
   * @param float
   */
  public function setFontSize($fontSize)
  {
    $this->fontSize = $fontSize;
  }
  /**
   * @return float
   */
  public function getFontSize()
  {
    return $this->fontSize;
  }
  /**
   * @param int
   */
  public function setInLink($inLink)
  {
    $this->inLink = $inLink;
  }
  /**
   * @return int
   */
  public function getInLink()
  {
    return $this->inLink;
  }
  /**
   * @param int
   */
  public function setMaxSplit($maxSplit)
  {
    $this->maxSplit = $maxSplit;
  }
  /**
   * @return int
   */
  public function getMaxSplit()
  {
    return $this->maxSplit;
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
class_alias(SnapshotTextNode::class, 'Google_Service_Contentwarehouse_SnapshotTextNode');
