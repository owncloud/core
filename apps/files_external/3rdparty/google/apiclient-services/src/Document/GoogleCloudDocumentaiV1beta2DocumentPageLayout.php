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

class GoogleCloudDocumentaiV1beta2DocumentPageLayout extends \Google\Model
{
  protected $boundingPolyType = GoogleCloudDocumentaiV1beta2BoundingPoly::class;
  protected $boundingPolyDataType = '';
  /**
   * @var float
   */
  public $confidence;
  /**
   * @var string
   */
  public $orientation;
  protected $textAnchorType = GoogleCloudDocumentaiV1beta2DocumentTextAnchor::class;
  protected $textAnchorDataType = '';

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
  public function setOrientation($orientation)
  {
    $this->orientation = $orientation;
  }
  /**
   * @return string
   */
  public function getOrientation()
  {
    return $this->orientation;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentTextAnchor
   */
  public function setTextAnchor(GoogleCloudDocumentaiV1beta2DocumentTextAnchor $textAnchor)
  {
    $this->textAnchor = $textAnchor;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentTextAnchor
   */
  public function getTextAnchor()
  {
    return $this->textAnchor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1beta2DocumentPageLayout::class, 'Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageLayout');
