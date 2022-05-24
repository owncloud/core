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

class GoogleCloudDocumentaiV1DocumentPageAnchorPageRef extends \Google\Model
{
  protected $boundingPolyType = GoogleCloudDocumentaiV1BoundingPoly::class;
  protected $boundingPolyDataType = '';
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var string
   */
  public $layoutId;
  /**
   * @var string
   */
  public $layoutType;
  /**
   * @var string
   */
  public $page;

  /**
   * @param GoogleCloudDocumentaiV1BoundingPoly
   */
  public function setBoundingPoly(GoogleCloudDocumentaiV1BoundingPoly $boundingPoly)
  {
    $this->boundingPoly = $boundingPoly;
  }
  /**
   * @return GoogleCloudDocumentaiV1BoundingPoly
   */
  public function getBoundingPoly()
  {
    return $this->boundingPoly;
  }
  /**
   * @param float
   */
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  /**
   * @return float
   */
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param string
   */
  public function setLayoutId($layoutId)
  {
    $this->layoutId = $layoutId;
  }
  /**
   * @return string
   */
  public function getLayoutId()
  {
    return $this->layoutId;
  }
  /**
   * @param string
   */
  public function setLayoutType($layoutType)
  {
    $this->layoutType = $layoutType;
  }
  /**
   * @return string
   */
  public function getLayoutType()
  {
    return $this->layoutType;
  }
  /**
   * @param string
   */
  public function setPage($page)
  {
    $this->page = $page;
  }
  /**
   * @return string
   */
  public function getPage()
  {
    return $this->page;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1DocumentPageAnchorPageRef::class, 'Google_Service_Document_GoogleCloudDocumentaiV1DocumentPageAnchorPageRef');
