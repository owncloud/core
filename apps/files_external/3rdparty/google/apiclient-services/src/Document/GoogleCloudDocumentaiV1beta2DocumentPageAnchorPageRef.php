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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1beta2DocumentPageAnchorPageRef extends \Google\Model
{
  protected $boundingPolyType = GoogleCloudDocumentaiV1beta2BoundingPoly::class;
  protected $boundingPolyDataType = '';
  public $confidence;
  public $layoutId;
  public $layoutType;
  public $page;

  /**
   * @param GoogleCloudDocumentaiV1beta2BoundingPoly
   */
  public function setBoundingPoly(GoogleCloudDocumentaiV1beta2BoundingPoly $boundingPoly)
  {
    $this->boundingPoly = $boundingPoly;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2BoundingPoly
   */
  public function getBoundingPoly()
  {
    return $this->boundingPoly;
  }
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  public function setLayoutId($layoutId)
  {
    $this->layoutId = $layoutId;
  }
  public function getLayoutId()
  {
    return $this->layoutId;
  }
  public function setLayoutType($layoutType)
  {
    $this->layoutType = $layoutType;
  }
  public function getLayoutType()
  {
    return $this->layoutType;
  }
  public function setPage($page)
  {
    $this->page = $page;
  }
  public function getPage()
  {
    return $this->page;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1beta2DocumentPageAnchorPageRef::class, 'Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageAnchorPageRef');
