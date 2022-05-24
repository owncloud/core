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

namespace Google\Service\Docs;

class EmbeddedObject extends \Google\Model
{
  /**
   * @var string
   */
  public $description;
  protected $embeddedDrawingPropertiesType = EmbeddedDrawingProperties::class;
  protected $embeddedDrawingPropertiesDataType = '';
  protected $embeddedObjectBorderType = EmbeddedObjectBorder::class;
  protected $embeddedObjectBorderDataType = '';
  protected $imagePropertiesType = ImageProperties::class;
  protected $imagePropertiesDataType = '';
  protected $linkedContentReferenceType = LinkedContentReference::class;
  protected $linkedContentReferenceDataType = '';
  protected $marginBottomType = Dimension::class;
  protected $marginBottomDataType = '';
  protected $marginLeftType = Dimension::class;
  protected $marginLeftDataType = '';
  protected $marginRightType = Dimension::class;
  protected $marginRightDataType = '';
  protected $marginTopType = Dimension::class;
  protected $marginTopDataType = '';
  protected $sizeType = Size::class;
  protected $sizeDataType = '';
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param EmbeddedDrawingProperties
   */
  public function setEmbeddedDrawingProperties(EmbeddedDrawingProperties $embeddedDrawingProperties)
  {
    $this->embeddedDrawingProperties = $embeddedDrawingProperties;
  }
  /**
   * @return EmbeddedDrawingProperties
   */
  public function getEmbeddedDrawingProperties()
  {
    return $this->embeddedDrawingProperties;
  }
  /**
   * @param EmbeddedObjectBorder
   */
  public function setEmbeddedObjectBorder(EmbeddedObjectBorder $embeddedObjectBorder)
  {
    $this->embeddedObjectBorder = $embeddedObjectBorder;
  }
  /**
   * @return EmbeddedObjectBorder
   */
  public function getEmbeddedObjectBorder()
  {
    return $this->embeddedObjectBorder;
  }
  /**
   * @param ImageProperties
   */
  public function setImageProperties(ImageProperties $imageProperties)
  {
    $this->imageProperties = $imageProperties;
  }
  /**
   * @return ImageProperties
   */
  public function getImageProperties()
  {
    return $this->imageProperties;
  }
  /**
   * @param LinkedContentReference
   */
  public function setLinkedContentReference(LinkedContentReference $linkedContentReference)
  {
    $this->linkedContentReference = $linkedContentReference;
  }
  /**
   * @return LinkedContentReference
   */
  public function getLinkedContentReference()
  {
    return $this->linkedContentReference;
  }
  /**
   * @param Dimension
   */
  public function setMarginBottom(Dimension $marginBottom)
  {
    $this->marginBottom = $marginBottom;
  }
  /**
   * @return Dimension
   */
  public function getMarginBottom()
  {
    return $this->marginBottom;
  }
  /**
   * @param Dimension
   */
  public function setMarginLeft(Dimension $marginLeft)
  {
    $this->marginLeft = $marginLeft;
  }
  /**
   * @return Dimension
   */
  public function getMarginLeft()
  {
    return $this->marginLeft;
  }
  /**
   * @param Dimension
   */
  public function setMarginRight(Dimension $marginRight)
  {
    $this->marginRight = $marginRight;
  }
  /**
   * @return Dimension
   */
  public function getMarginRight()
  {
    return $this->marginRight;
  }
  /**
   * @param Dimension
   */
  public function setMarginTop(Dimension $marginTop)
  {
    $this->marginTop = $marginTop;
  }
  /**
   * @return Dimension
   */
  public function getMarginTop()
  {
    return $this->marginTop;
  }
  /**
   * @param Size
   */
  public function setSize(Size $size)
  {
    $this->size = $size;
  }
  /**
   * @return Size
   */
  public function getSize()
  {
    return $this->size;
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
class_alias(EmbeddedObject::class, 'Google_Service_Docs_EmbeddedObject');
