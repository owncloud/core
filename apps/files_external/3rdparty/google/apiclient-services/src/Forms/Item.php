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

namespace Google\Service\Forms;

class Item extends \Google\Model
{
  /**
   * @var string
   */
  public $description;
  protected $imageItemType = ImageItem::class;
  protected $imageItemDataType = '';
  /**
   * @var string
   */
  public $itemId;
  protected $pageBreakItemType = PageBreakItem::class;
  protected $pageBreakItemDataType = '';
  protected $questionGroupItemType = QuestionGroupItem::class;
  protected $questionGroupItemDataType = '';
  protected $questionItemType = QuestionItem::class;
  protected $questionItemDataType = '';
  protected $textItemType = TextItem::class;
  protected $textItemDataType = '';
  /**
   * @var string
   */
  public $title;
  protected $videoItemType = VideoItem::class;
  protected $videoItemDataType = '';

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param ImageItem
   */
  public function setImageItem(ImageItem $imageItem)
  {
    $this->imageItem = $imageItem;
  }
  /**
   * @return ImageItem
   */
  public function getImageItem()
  {
    return $this->imageItem;
  }
  /**
   * @param string
   */
  public function setItemId($itemId)
  {
    $this->itemId = $itemId;
  }
  /**
   * @return string
   */
  public function getItemId()
  {
    return $this->itemId;
  }
  /**
   * @param PageBreakItem
   */
  public function setPageBreakItem(PageBreakItem $pageBreakItem)
  {
    $this->pageBreakItem = $pageBreakItem;
  }
  /**
   * @return PageBreakItem
   */
  public function getPageBreakItem()
  {
    return $this->pageBreakItem;
  }
  /**
   * @param QuestionGroupItem
   */
  public function setQuestionGroupItem(QuestionGroupItem $questionGroupItem)
  {
    $this->questionGroupItem = $questionGroupItem;
  }
  /**
   * @return QuestionGroupItem
   */
  public function getQuestionGroupItem()
  {
    return $this->questionGroupItem;
  }
  /**
   * @param QuestionItem
   */
  public function setQuestionItem(QuestionItem $questionItem)
  {
    $this->questionItem = $questionItem;
  }
  /**
   * @return QuestionItem
   */
  public function getQuestionItem()
  {
    return $this->questionItem;
  }
  /**
   * @param TextItem
   */
  public function setTextItem(TextItem $textItem)
  {
    $this->textItem = $textItem;
  }
  /**
   * @return TextItem
   */
  public function getTextItem()
  {
    return $this->textItem;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param VideoItem
   */
  public function setVideoItem(VideoItem $videoItem)
  {
    $this->videoItem = $videoItem;
  }
  /**
   * @return VideoItem
   */
  public function getVideoItem()
  {
    return $this->videoItem;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Item::class, 'Google_Service_Forms_Item');
