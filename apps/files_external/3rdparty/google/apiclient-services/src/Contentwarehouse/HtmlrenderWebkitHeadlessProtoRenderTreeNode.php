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

class HtmlrenderWebkitHeadlessProtoRenderTreeNode extends \Google\Collection
{
  protected $collection_key = 'inlineTextBox';
  protected $boxType = HtmlrenderWebkitHeadlessProtoBox::class;
  protected $boxDataType = '';
  /**
   * @var int[]
   */
  public $childRenderTreeNodeIndex;
  /**
   * @var int
   */
  public $domTreeNodeIndex;
  protected $inlineTextBoxType = HtmlrenderWebkitHeadlessProtoRenderTreeNodeInlineTextBox::class;
  protected $inlineTextBoxDataType = 'array';
  /**
   * @var string
   */
  public $renderedText;
  /**
   * @var int
   */
  public $styleIndex;

  /**
   * @param HtmlrenderWebkitHeadlessProtoBox
   */
  public function setBox(HtmlrenderWebkitHeadlessProtoBox $box)
  {
    $this->box = $box;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoBox
   */
  public function getBox()
  {
    return $this->box;
  }
  /**
   * @param int[]
   */
  public function setChildRenderTreeNodeIndex($childRenderTreeNodeIndex)
  {
    $this->childRenderTreeNodeIndex = $childRenderTreeNodeIndex;
  }
  /**
   * @return int[]
   */
  public function getChildRenderTreeNodeIndex()
  {
    return $this->childRenderTreeNodeIndex;
  }
  /**
   * @param int
   */
  public function setDomTreeNodeIndex($domTreeNodeIndex)
  {
    $this->domTreeNodeIndex = $domTreeNodeIndex;
  }
  /**
   * @return int
   */
  public function getDomTreeNodeIndex()
  {
    return $this->domTreeNodeIndex;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoRenderTreeNodeInlineTextBox[]
   */
  public function setInlineTextBox($inlineTextBox)
  {
    $this->inlineTextBox = $inlineTextBox;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoRenderTreeNodeInlineTextBox[]
   */
  public function getInlineTextBox()
  {
    return $this->inlineTextBox;
  }
  /**
   * @param string
   */
  public function setRenderedText($renderedText)
  {
    $this->renderedText = $renderedText;
  }
  /**
   * @return string
   */
  public function getRenderedText()
  {
    return $this->renderedText;
  }
  /**
   * @param int
   */
  public function setStyleIndex($styleIndex)
  {
    $this->styleIndex = $styleIndex;
  }
  /**
   * @return int
   */
  public function getStyleIndex()
  {
    return $this->styleIndex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HtmlrenderWebkitHeadlessProtoRenderTreeNode::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoRenderTreeNode');
