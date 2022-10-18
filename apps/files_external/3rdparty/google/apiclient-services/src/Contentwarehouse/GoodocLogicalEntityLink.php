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

class GoodocLogicalEntityLink extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "anchor" => "Anchor",
        "blockId" => "BlockId",
        "docId" => "DocId",
        "pageId" => "PageId",
        "paragraphId" => "ParagraphId",
        "routeId" => "RouteId",
        "symbolId" => "SymbolId",
        "url" => "Url",
        "wordId" => "WordId",
  ];
  /**
   * @var string
   */
  public $anchor;
  /**
   * @var int
   */
  public $blockId;
  /**
   * @var int
   */
  public $docId;
  /**
   * @var int
   */
  public $pageId;
  /**
   * @var int
   */
  public $paragraphId;
  /**
   * @var int
   */
  public $routeId;
  /**
   * @var int
   */
  public $symbolId;
  /**
   * @var string
   */
  public $url;
  /**
   * @var int
   */
  public $wordId;

  /**
   * @param string
   */
  public function setAnchor($anchor)
  {
    $this->anchor = $anchor;
  }
  /**
   * @return string
   */
  public function getAnchor()
  {
    return $this->anchor;
  }
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
   * @param int
   */
  public function setDocId($docId)
  {
    $this->docId = $docId;
  }
  /**
   * @return int
   */
  public function getDocId()
  {
    return $this->docId;
  }
  /**
   * @param int
   */
  public function setPageId($pageId)
  {
    $this->pageId = $pageId;
  }
  /**
   * @return int
   */
  public function getPageId()
  {
    return $this->pageId;
  }
  /**
   * @param int
   */
  public function setParagraphId($paragraphId)
  {
    $this->paragraphId = $paragraphId;
  }
  /**
   * @return int
   */
  public function getParagraphId()
  {
    return $this->paragraphId;
  }
  /**
   * @param int
   */
  public function setRouteId($routeId)
  {
    $this->routeId = $routeId;
  }
  /**
   * @return int
   */
  public function getRouteId()
  {
    return $this->routeId;
  }
  /**
   * @param int
   */
  public function setSymbolId($symbolId)
  {
    $this->symbolId = $symbolId;
  }
  /**
   * @return int
   */
  public function getSymbolId()
  {
    return $this->symbolId;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param int
   */
  public function setWordId($wordId)
  {
    $this->wordId = $wordId;
  }
  /**
   * @return int
   */
  public function getWordId()
  {
    return $this->wordId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoodocLogicalEntityLink::class, 'Google_Service_Contentwarehouse_GoodocLogicalEntityLink');
