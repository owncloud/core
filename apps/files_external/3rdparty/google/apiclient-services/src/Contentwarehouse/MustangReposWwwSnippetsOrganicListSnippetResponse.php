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

class MustangReposWwwSnippetsOrganicListSnippetResponse extends \Google\Collection
{
  protected $collection_key = 'items';
  /**
   * @var string
   */
  public $header;
  /**
   * @var float
   */
  public $headerTitleRedundancy;
  /**
   * @var bool
   */
  public $headerUsedInSnippet;
  /**
   * @var string[]
   */
  public $items;
  /**
   * @var int
   */
  public $originalTotalItems;
  /**
   * @var float
   */
  public $radishScore;

  /**
   * @param string
   */
  public function setHeader($header)
  {
    $this->header = $header;
  }
  /**
   * @return string
   */
  public function getHeader()
  {
    return $this->header;
  }
  /**
   * @param float
   */
  public function setHeaderTitleRedundancy($headerTitleRedundancy)
  {
    $this->headerTitleRedundancy = $headerTitleRedundancy;
  }
  /**
   * @return float
   */
  public function getHeaderTitleRedundancy()
  {
    return $this->headerTitleRedundancy;
  }
  /**
   * @param bool
   */
  public function setHeaderUsedInSnippet($headerUsedInSnippet)
  {
    $this->headerUsedInSnippet = $headerUsedInSnippet;
  }
  /**
   * @return bool
   */
  public function getHeaderUsedInSnippet()
  {
    return $this->headerUsedInSnippet;
  }
  /**
   * @param string[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return string[]
   */
  public function getItems()
  {
    return $this->items;
  }
  /**
   * @param int
   */
  public function setOriginalTotalItems($originalTotalItems)
  {
    $this->originalTotalItems = $originalTotalItems;
  }
  /**
   * @return int
   */
  public function getOriginalTotalItems()
  {
    return $this->originalTotalItems;
  }
  /**
   * @param float
   */
  public function setRadishScore($radishScore)
  {
    $this->radishScore = $radishScore;
  }
  /**
   * @return float
   */
  public function getRadishScore()
  {
    return $this->radishScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MustangReposWwwSnippetsOrganicListSnippetResponse::class, 'Google_Service_Contentwarehouse_MustangReposWwwSnippetsOrganicListSnippetResponse');
