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

class Google_Service_Docs_EmbeddedObject extends Google_Model
{
  public $description;
  protected $embeddedDrawingPropertiesType = 'Google_Service_Docs_EmbeddedDrawingProperties';
  protected $embeddedDrawingPropertiesDataType = '';
  protected $embeddedObjectBorderType = 'Google_Service_Docs_EmbeddedObjectBorder';
  protected $embeddedObjectBorderDataType = '';
  protected $imagePropertiesType = 'Google_Service_Docs_ImageProperties';
  protected $imagePropertiesDataType = '';
  protected $linkedContentReferenceType = 'Google_Service_Docs_LinkedContentReference';
  protected $linkedContentReferenceDataType = '';
  protected $marginBottomType = 'Google_Service_Docs_Dimension';
  protected $marginBottomDataType = '';
  protected $marginLeftType = 'Google_Service_Docs_Dimension';
  protected $marginLeftDataType = '';
  protected $marginRightType = 'Google_Service_Docs_Dimension';
  protected $marginRightDataType = '';
  protected $marginTopType = 'Google_Service_Docs_Dimension';
  protected $marginTopDataType = '';
  protected $sizeType = 'Google_Service_Docs_Size';
  protected $sizeDataType = '';
  public $title;

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_Docs_EmbeddedDrawingProperties
   */
  public function setEmbeddedDrawingProperties(Google_Service_Docs_EmbeddedDrawingProperties $embeddedDrawingProperties)
  {
    $this->embeddedDrawingProperties = $embeddedDrawingProperties;
  }
  /**
   * @return Google_Service_Docs_EmbeddedDrawingProperties
   */
  public function getEmbeddedDrawingProperties()
  {
    return $this->embeddedDrawingProperties;
  }
  /**
   * @param Google_Service_Docs_EmbeddedObjectBorder
   */
  public function setEmbeddedObjectBorder(Google_Service_Docs_EmbeddedObjectBorder $embeddedObjectBorder)
  {
    $this->embeddedObjectBorder = $embeddedObjectBorder;
  }
  /**
   * @return Google_Service_Docs_EmbeddedObjectBorder
   */
  public function getEmbeddedObjectBorder()
  {
    return $this->embeddedObjectBorder;
  }
  /**
   * @param Google_Service_Docs_ImageProperties
   */
  public function setImageProperties(Google_Service_Docs_ImageProperties $imageProperties)
  {
    $this->imageProperties = $imageProperties;
  }
  /**
   * @return Google_Service_Docs_ImageProperties
   */
  public function getImageProperties()
  {
    return $this->imageProperties;
  }
  /**
   * @param Google_Service_Docs_LinkedContentReference
   */
  public function setLinkedContentReference(Google_Service_Docs_LinkedContentReference $linkedContentReference)
  {
    $this->linkedContentReference = $linkedContentReference;
  }
  /**
   * @return Google_Service_Docs_LinkedContentReference
   */
  public function getLinkedContentReference()
  {
    return $this->linkedContentReference;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setMarginBottom(Google_Service_Docs_Dimension $marginBottom)
  {
    $this->marginBottom = $marginBottom;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getMarginBottom()
  {
    return $this->marginBottom;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setMarginLeft(Google_Service_Docs_Dimension $marginLeft)
  {
    $this->marginLeft = $marginLeft;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getMarginLeft()
  {
    return $this->marginLeft;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setMarginRight(Google_Service_Docs_Dimension $marginRight)
  {
    $this->marginRight = $marginRight;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getMarginRight()
  {
    return $this->marginRight;
  }
  /**
   * @param Google_Service_Docs_Dimension
   */
  public function setMarginTop(Google_Service_Docs_Dimension $marginTop)
  {
    $this->marginTop = $marginTop;
  }
  /**
   * @return Google_Service_Docs_Dimension
   */
  public function getMarginTop()
  {
    return $this->marginTop;
  }
  /**
   * @param Google_Service_Docs_Size
   */
  public function setSize(Google_Service_Docs_Size $size)
  {
    $this->size = $size;
  }
  /**
   * @return Google_Service_Docs_Size
   */
  public function getSize()
  {
    return $this->size;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
