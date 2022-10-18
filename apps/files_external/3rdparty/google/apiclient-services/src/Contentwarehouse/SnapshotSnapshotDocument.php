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

class SnapshotSnapshotDocument extends \Google\Collection
{
  protected $collection_key = 'textNode';
  protected $imageNodeType = SnapshotImageNode::class;
  protected $imageNodeDataType = 'array';
  /**
   * @var bool
   */
  public $metaNoPreview;
  /**
   * @var bool
   */
  public $metaNoSnippet;
  protected $teradocType = TeragoogleDocumentInfo::class;
  protected $teradocDataType = '';
  protected $textNodeType = SnapshotTextNode::class;
  protected $textNodeDataType = 'array';
  /**
   * @var string
   */
  public $title;

  /**
   * @param SnapshotImageNode[]
   */
  public function setImageNode($imageNode)
  {
    $this->imageNode = $imageNode;
  }
  /**
   * @return SnapshotImageNode[]
   */
  public function getImageNode()
  {
    return $this->imageNode;
  }
  /**
   * @param bool
   */
  public function setMetaNoPreview($metaNoPreview)
  {
    $this->metaNoPreview = $metaNoPreview;
  }
  /**
   * @return bool
   */
  public function getMetaNoPreview()
  {
    return $this->metaNoPreview;
  }
  /**
   * @param bool
   */
  public function setMetaNoSnippet($metaNoSnippet)
  {
    $this->metaNoSnippet = $metaNoSnippet;
  }
  /**
   * @return bool
   */
  public function getMetaNoSnippet()
  {
    return $this->metaNoSnippet;
  }
  /**
   * @param TeragoogleDocumentInfo
   */
  public function setTeradoc(TeragoogleDocumentInfo $teradoc)
  {
    $this->teradoc = $teradoc;
  }
  /**
   * @return TeragoogleDocumentInfo
   */
  public function getTeradoc()
  {
    return $this->teradoc;
  }
  /**
   * @param SnapshotTextNode[]
   */
  public function setTextNode($textNode)
  {
    $this->textNode = $textNode;
  }
  /**
   * @return SnapshotTextNode[]
   */
  public function getTextNode()
  {
    return $this->textNode;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SnapshotSnapshotDocument::class, 'Google_Service_Contentwarehouse_SnapshotSnapshotDocument');
