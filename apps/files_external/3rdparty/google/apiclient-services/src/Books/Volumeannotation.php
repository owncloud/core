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

class Volumeannotation extends \Google\Collection
{
  protected $collection_key = 'pageIds';
  /**
   * @var string
   */
  public $annotationDataId;
  /**
   * @var string
   */
  public $annotationDataLink;
  /**
   * @var string
   */
  public $annotationType;
  protected $contentRangesType = VolumeannotationContentRanges::class;
  protected $contentRangesDataType = '';
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
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $layerId;
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
  public function setAnnotationDataId($annotationDataId)
  {
    $this->annotationDataId = $annotationDataId;
  }
  /**
   * @return string
   */
  public function getAnnotationDataId()
  {
    return $this->annotationDataId;
  }
  /**
   * @param string
   */
  public function setAnnotationDataLink($annotationDataLink)
  {
    $this->annotationDataLink = $annotationDataLink;
  }
  /**
   * @return string
   */
  public function getAnnotationDataLink()
  {
    return $this->annotationDataLink;
  }
  /**
   * @param string
   */
  public function setAnnotationType($annotationType)
  {
    $this->annotationType = $annotationType;
  }
  /**
   * @return string
   */
  public function getAnnotationType()
  {
    return $this->annotationType;
  }
  /**
   * @param VolumeannotationContentRanges
   */
  public function setContentRanges(VolumeannotationContentRanges $contentRanges)
  {
    $this->contentRanges = $contentRanges;
  }
  /**
   * @return VolumeannotationContentRanges
   */
  public function getContentRanges()
  {
    return $this->contentRanges;
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
class_alias(Volumeannotation::class, 'Google_Service_Books_Volumeannotation');
