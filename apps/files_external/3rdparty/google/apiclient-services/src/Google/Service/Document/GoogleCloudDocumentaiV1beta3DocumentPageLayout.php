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

class Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentPageLayout extends Google_Model
{
  protected $boundingPolyType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3BoundingPoly';
  protected $boundingPolyDataType = '';
  public $confidence;
  public $orientation;
  protected $textAnchorType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentTextAnchor';
  protected $textAnchorDataType = '';

  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3BoundingPoly
   */
  public function setBoundingPoly(Google_Service_Document_GoogleCloudDocumentaiV1beta3BoundingPoly $boundingPoly)
  {
    $this->boundingPoly = $boundingPoly;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta3BoundingPoly
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
  public function setOrientation($orientation)
  {
    $this->orientation = $orientation;
  }
  public function getOrientation()
  {
    return $this->orientation;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentTextAnchor
   */
  public function setTextAnchor(Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentTextAnchor $textAnchor)
  {
    $this->textAnchor = $textAnchor;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta3DocumentTextAnchor
   */
  public function getTextAnchor()
  {
    return $this->textAnchor;
  }
}
