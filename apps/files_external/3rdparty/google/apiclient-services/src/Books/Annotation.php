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

namespace Google\Service\Books;

class Annotation extends \Google\Collection
{
  protected $collection_key = 'pageIds';
  /**
   * @var string
   */
  public $afterSelectedText;
  /**
   * @var string
   */
  public $beforeSelectedText;
  protected $clientVersionRangesType = AnnotationClientVersionRanges::class;
  protected $clientVersionRangesDataType = '';
  /**
   * @var string
   */
  public $created;
  protected $currentVersionRangesType = AnnotationCurrentVersionRanges::class;
  protected $currentVersionRangesDataType = '';
  /**
   * @var string
   */
  public $data;
  /**
   * @var bool
   */
  public $deleted;
  /**
   * @var string
   */
  public $highlightStyle;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $layerId;
  protected $layerSummaryType = AnnotationLayerSummary::class;
  protected $layerSummaryDataType = '';
  /**
   * @var string[]
   */
  public $pageIds;
  /**
   * @var string
   */
  public $selectedText;
  /**
   * @var string
   */
  public $selfLink;
  /**
   * @var string
   */
  public $updated;
  /**
   * @var string
   */
  public $volumeId;

  /**
   * @param string
   */
  public function setAfterSelectedText($afterSelectedText)
  {
    $this->afterSelectedText = $afterSelectedText;
  }
  /**
   * @return string
   */
  public function getAfterSelectedText()
  {
    return $this->afterSelectedText;
  }
  /**
   * @param string
   */
  public function setBeforeSelectedText($beforeSelectedText)
  {
    $this->beforeSelectedText = $beforeSelectedText;
  }
  /**
   * @return string
   */
  public function getBeforeSelectedText()
  {
    return $this->beforeSelectedText;
  }
  /**
   * @param AnnotationClientVersionRanges
   */
  public function setClientVersionRanges(AnnotationClientVersionRanges $clientVersionRanges)
  {
    $this->clientVersionRanges = $clientVersionRanges;
  }
  /**
   * @return AnnotationClientVersionRanges
   */
  public function getClientVersionRanges()
  {
    return $this->clientVersionRanges;
  }
  /**
   * @param string
   */
  public function setCreated($created)
  {
    $this->created = $created;
  }
  /**
   * @return string
   */
  public function getCreated()
  {
    return $this->created;
  }
  /**
   * @param AnnotationCurrentVersionRanges
   */
  public function setCurrentVersionRanges(AnnotationCurrentVersionRanges $currentVersionRanges)
  {
    $this->currentVersionRanges = $currentVersionRanges;
  }
  /**
   * @return AnnotationCurrentVersionRanges
   */
  public function getCurrentVersionRanges()
  {
    return $this->currentVersionRanges;
  }
  /**
   * @param string
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return string
   */
  public function getData()
  {
    return $this->data;
  }
  /**
   * @param bool
   */
  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }
  /**
   * @return bool
   */
  public function getDeleted()
  {
    return $this->deleted;
  }
  /**
   * @param string
   */
  public function setHighlightStyle($highlightStyle)
  {
    $this->highlightStyle = $highlightStyle;
  }
  /**
   * @return string
   */
  public function getHighlightStyle()
  {
    return $this->highlightStyle;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLayerId($layerId)
  {
    $this->layerId = $layerId;
  }
  /**
   * @return string
   */
  public function getLayerId()
  {
    return $this->layerId;
  }
  /**
   * @param AnnotationLayerSummary
   */
  public function setLayerSummary(AnnotationLayerSummary $layerSummary)
  {
    $this->layerSummary = $layerSummary;
  }
  /**
   * @return AnnotationLayerSummary
   */
  public function getLayerSummary()
  {
    return $this->layerSummary;
  }
  /**
   * @param string[]
   */
  public function setPageIds($pageIds)
  {
    $this->pageIds = $pageIds;
  }
  /**
   * @return string[]
   */
  public function getPageIds()
  {
    return $this->pageIds;
  }
  /**
   * @param string
   */
  public function setSelectedText($selectedText)
  {
    $this->selectedText = $selectedText;
  }
  /**
   * @return string
   */
  public function getSelectedText()
  {
    return $this->selectedText;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param string
   */
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  /**
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
  }
  /**
   * @param string
   */
  public function setVolumeId($volumeId)
  {
    $this->volumeId = $volumeId;
  }
  /**
   * @return string
   */
  public function getVolumeId()
  {
    return $this->volumeId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Annotation::class, 'Google_Service_Books_Annotation');
