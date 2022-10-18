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

class HtmlrenderWebkitHeadlessProtoDocument extends \Google\Collection
{
  protected $collection_key = 'renderTreeNode';
  /**
   * @var string
   */
  public $baseUri;
  /**
   * @var string
   */
  public $charset;
  /**
   * @var int
   */
  public $contentHeight;
  /**
   * @var string
   */
  public $contentLanguage;
  /**
   * @var int
   */
  public $contentWidth;
  protected $domTreeNodeType = HtmlrenderWebkitHeadlessProtoDOMTreeNode::class;
  protected $domTreeNodeDataType = 'array';
  /**
   * @var string
   */
  public $frameId;
  /**
   * @var string
   */
  public $frameName;
  public $javascriptTimeOfDay;
  protected $redirectHopType = HtmlrenderWebkitHeadlessProtoRedirectHop::class;
  protected $redirectHopDataType = 'array';
  protected $referencedResourceType = HtmlrenderWebkitHeadlessProtoReferencedResource::class;
  protected $referencedResourceDataType = 'array';
  protected $renderEventType = HtmlrenderWebkitHeadlessProtoRenderEvent::class;
  protected $renderEventDataType = 'array';
  protected $renderStyleType = HtmlrenderWebkitHeadlessProtoStyle::class;
  protected $renderStyleDataType = 'array';
  protected $renderTreeNodeType = HtmlrenderWebkitHeadlessProtoRenderTreeNode::class;
  protected $renderTreeNodeDataType = 'array';
  public $renderTreeQualityScore;
  protected $renderedContentAreaType = HtmlrenderWebkitHeadlessProtoBox::class;
  protected $renderedContentAreaDataType = '';
  /**
   * @var int
   */
  public $scrollX;
  /**
   * @var int
   */
  public $scrollY;
  public $snapshotQualityScore;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $uri;
  protected $viewportType = HtmlrenderWebkitHeadlessProtoBox::class;
  protected $viewportDataType = '';

  /**
   * @param string
   */
  public function setBaseUri($baseUri)
  {
    $this->baseUri = $baseUri;
  }
  /**
   * @return string
   */
  public function getBaseUri()
  {
    return $this->baseUri;
  }
  /**
   * @param string
   */
  public function setCharset($charset)
  {
    $this->charset = $charset;
  }
  /**
   * @return string
   */
  public function getCharset()
  {
    return $this->charset;
  }
  /**
   * @param int
   */
  public function setContentHeight($contentHeight)
  {
    $this->contentHeight = $contentHeight;
  }
  /**
   * @return int
   */
  public function getContentHeight()
  {
    return $this->contentHeight;
  }
  /**
   * @param string
   */
  public function setContentLanguage($contentLanguage)
  {
    $this->contentLanguage = $contentLanguage;
  }
  /**
   * @return string
   */
  public function getContentLanguage()
  {
    return $this->contentLanguage;
  }
  /**
   * @param int
   */
  public function setContentWidth($contentWidth)
  {
    $this->contentWidth = $contentWidth;
  }
  /**
   * @return int
   */
  public function getContentWidth()
  {
    return $this->contentWidth;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoDOMTreeNode[]
   */
  public function setDomTreeNode($domTreeNode)
  {
    $this->domTreeNode = $domTreeNode;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoDOMTreeNode[]
   */
  public function getDomTreeNode()
  {
    return $this->domTreeNode;
  }
  /**
   * @param string
   */
  public function setFrameId($frameId)
  {
    $this->frameId = $frameId;
  }
  /**
   * @return string
   */
  public function getFrameId()
  {
    return $this->frameId;
  }
  /**
   * @param string
   */
  public function setFrameName($frameName)
  {
    $this->frameName = $frameName;
  }
  /**
   * @return string
   */
  public function getFrameName()
  {
    return $this->frameName;
  }
  public function setJavascriptTimeOfDay($javascriptTimeOfDay)
  {
    $this->javascriptTimeOfDay = $javascriptTimeOfDay;
  }
  public function getJavascriptTimeOfDay()
  {
    return $this->javascriptTimeOfDay;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoRedirectHop[]
   */
  public function setRedirectHop($redirectHop)
  {
    $this->redirectHop = $redirectHop;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoRedirectHop[]
   */
  public function getRedirectHop()
  {
    return $this->redirectHop;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoReferencedResource[]
   */
  public function setReferencedResource($referencedResource)
  {
    $this->referencedResource = $referencedResource;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoReferencedResource[]
   */
  public function getReferencedResource()
  {
    return $this->referencedResource;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoRenderEvent[]
   */
  public function setRenderEvent($renderEvent)
  {
    $this->renderEvent = $renderEvent;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoRenderEvent[]
   */
  public function getRenderEvent()
  {
    return $this->renderEvent;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoStyle[]
   */
  public function setRenderStyle($renderStyle)
  {
    $this->renderStyle = $renderStyle;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoStyle[]
   */
  public function getRenderStyle()
  {
    return $this->renderStyle;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoRenderTreeNode[]
   */
  public function setRenderTreeNode($renderTreeNode)
  {
    $this->renderTreeNode = $renderTreeNode;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoRenderTreeNode[]
   */
  public function getRenderTreeNode()
  {
    return $this->renderTreeNode;
  }
  public function setRenderTreeQualityScore($renderTreeQualityScore)
  {
    $this->renderTreeQualityScore = $renderTreeQualityScore;
  }
  public function getRenderTreeQualityScore()
  {
    return $this->renderTreeQualityScore;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoBox
   */
  public function setRenderedContentArea(HtmlrenderWebkitHeadlessProtoBox $renderedContentArea)
  {
    $this->renderedContentArea = $renderedContentArea;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoBox
   */
  public function getRenderedContentArea()
  {
    return $this->renderedContentArea;
  }
  /**
   * @param int
   */
  public function setScrollX($scrollX)
  {
    $this->scrollX = $scrollX;
  }
  /**
   * @return int
   */
  public function getScrollX()
  {
    return $this->scrollX;
  }
  /**
   * @param int
   */
  public function setScrollY($scrollY)
  {
    $this->scrollY = $scrollY;
  }
  /**
   * @return int
   */
  public function getScrollY()
  {
    return $this->scrollY;
  }
  public function setSnapshotQualityScore($snapshotQualityScore)
  {
    $this->snapshotQualityScore = $snapshotQualityScore;
  }
  public function getSnapshotQualityScore()
  {
    return $this->snapshotQualityScore;
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
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoBox
   */
  public function setViewport(HtmlrenderWebkitHeadlessProtoBox $viewport)
  {
    $this->viewport = $viewport;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoBox
   */
  public function getViewport()
  {
    return $this->viewport;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HtmlrenderWebkitHeadlessProtoDocument::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoDocument');
