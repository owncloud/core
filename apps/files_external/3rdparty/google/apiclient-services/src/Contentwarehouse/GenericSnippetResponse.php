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

class GenericSnippetResponse extends \Google\Collection
{
  protected $collection_key = 'snippet';
  /**
   * @var string[]
   */
  public $debugInfo;
  protected $infoType = Proto2BridgeMessageSet::class;
  protected $infoDataType = '';
  /**
   * @var string[]
   */
  public $snippet;
  /**
   * @var string
   */
  public $title;
  protected $wwwSnippetResponseType = WWWSnippetResponse::class;
  protected $wwwSnippetResponseDataType = '';

  /**
   * @param string[]
   */
  public function setDebugInfo($debugInfo)
  {
    $this->debugInfo = $debugInfo;
  }
  /**
   * @return string[]
   */
  public function getDebugInfo()
  {
    return $this->debugInfo;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setInfo(Proto2BridgeMessageSet $info)
  {
    $this->info = $info;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param string[]
   */
  public function setSnippet($snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return string[]
   */
  public function getSnippet()
  {
    return $this->snippet;
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
   * @param WWWSnippetResponse
   */
  public function setWwwSnippetResponse(WWWSnippetResponse $wwwSnippetResponse)
  {
    $this->wwwSnippetResponse = $wwwSnippetResponse;
  }
  /**
   * @return WWWSnippetResponse
   */
  public function getWwwSnippetResponse()
  {
    return $this->wwwSnippetResponse;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GenericSnippetResponse::class, 'Google_Service_Contentwarehouse_GenericSnippetResponse');
