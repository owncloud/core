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

class HtmlrenderWebkitHeadlessProtoDOMTreeNode extends \Google\Collection
{
  protected $collection_key = 'renderTreeNodeIndex';
  protected $attributeType = HtmlrenderWebkitHeadlessProtoDOMTreeNodeAttribute::class;
  protected $attributeDataType = 'array';
  /**
   * @var int[]
   */
  public $childDomTreeNodeIndex;
  /**
   * @var string
   */
  public $currentSourceUrl;
  protected $documentType = HtmlrenderWebkitHeadlessProtoDocument::class;
  protected $documentDataType = '';
  /**
   * @var int
   */
  public $htmlTagType;
  /**
   * @var bool
   */
  public $isClickable;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $originUrl;
  /**
   * @var int[]
   */
  public $referencedResourceIndex;
  /**
   * @var int[]
   */
  public $renderTreeNodeIndex;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $value;

  /**
   * @param HtmlrenderWebkitHeadlessProtoDOMTreeNodeAttribute[]
   */
  public function setAttribute($attribute)
  {
    $this->attribute = $attribute;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoDOMTreeNodeAttribute[]
   */
  public function getAttribute()
  {
    return $this->attribute;
  }
  /**
   * @param int[]
   */
  public function setChildDomTreeNodeIndex($childDomTreeNodeIndex)
  {
    $this->childDomTreeNodeIndex = $childDomTreeNodeIndex;
  }
  /**
   * @return int[]
   */
  public function getChildDomTreeNodeIndex()
  {
    return $this->childDomTreeNodeIndex;
  }
  /**
   * @param string
   */
  public function setCurrentSourceUrl($currentSourceUrl)
  {
    $this->currentSourceUrl = $currentSourceUrl;
  }
  /**
   * @return string
   */
  public function getCurrentSourceUrl()
  {
    return $this->currentSourceUrl;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoDocument
   */
  public function setDocument(HtmlrenderWebkitHeadlessProtoDocument $document)
  {
    $this->document = $document;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoDocument
   */
  public function getDocument()
  {
    return $this->document;
  }
  /**
   * @param int
   */
  public function setHtmlTagType($htmlTagType)
  {
    $this->htmlTagType = $htmlTagType;
  }
  /**
   * @return int
   */
  public function getHtmlTagType()
  {
    return $this->htmlTagType;
  }
  /**
   * @param bool
   */
  public function setIsClickable($isClickable)
  {
    $this->isClickable = $isClickable;
  }
  /**
   * @return bool
   */
  public function getIsClickable()
  {
    return $this->isClickable;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setOriginUrl($originUrl)
  {
    $this->originUrl = $originUrl;
  }
  /**
   * @return string
   */
  public function getOriginUrl()
  {
    return $this->originUrl;
  }
  /**
   * @param int[]
   */
  public function setReferencedResourceIndex($referencedResourceIndex)
  {
    $this->referencedResourceIndex = $referencedResourceIndex;
  }
  /**
   * @return int[]
   */
  public function getReferencedResourceIndex()
  {
    return $this->referencedResourceIndex;
  }
  /**
   * @param int[]
   */
  public function setRenderTreeNodeIndex($renderTreeNodeIndex)
  {
    $this->renderTreeNodeIndex = $renderTreeNodeIndex;
  }
  /**
   * @return int[]
   */
  public function getRenderTreeNodeIndex()
  {
    return $this->renderTreeNodeIndex;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HtmlrenderWebkitHeadlessProtoDOMTreeNode::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoDOMTreeNode');
