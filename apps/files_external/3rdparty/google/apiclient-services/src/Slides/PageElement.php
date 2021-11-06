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

namespace Google\Service\Slides;

class PageElement extends \Google\Model
{
  public $description;
  protected $elementGroupType = Group::class;
  protected $elementGroupDataType = '';
  protected $imageType = Image::class;
  protected $imageDataType = '';
  protected $lineType = Line::class;
  protected $lineDataType = '';
  public $objectId;
  protected $shapeType = Shape::class;
  protected $shapeDataType = '';
  protected $sheetsChartType = SheetsChart::class;
  protected $sheetsChartDataType = '';
  protected $sizeType = Size::class;
  protected $sizeDataType = '';
  protected $tableType = Table::class;
  protected $tableDataType = '';
  public $title;
  protected $transformType = AffineTransform::class;
  protected $transformDataType = '';
  protected $videoType = Video::class;
  protected $videoDataType = '';
  protected $wordArtType = WordArt::class;
  protected $wordArtDataType = '';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Group
   */
  public function setElementGroup(Group $elementGroup)
  {
    $this->elementGroup = $elementGroup;
  }
  /**
   * @return Group
   */
  public function getElementGroup()
  {
    return $this->elementGroup;
  }
  /**
   * @param Image
   */
  public function setImage(Image $image)
  {
    $this->image = $image;
  }
  /**
   * @return Image
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param Line
   */
  public function setLine(Line $line)
  {
    $this->line = $line;
  }
  /**
   * @return Line
   */
  public function getLine()
  {
    return $this->line;
  }
  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  public function getObjectId()
  {
    return $this->objectId;
  }
  /**
   * @param Shape
   */
  public function setShape(Shape $shape)
  {
    $this->shape = $shape;
  }
  /**
   * @return Shape
   */
  public function getShape()
  {
    return $this->shape;
  }
  /**
   * @param SheetsChart
   */
  public function setSheetsChart(SheetsChart $sheetsChart)
  {
    $this->sheetsChart = $sheetsChart;
  }
  /**
   * @return SheetsChart
   */
  public function getSheetsChart()
  {
    return $this->sheetsChart;
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
   * @param Table
   */
  public function setTable(Table $table)
  {
    $this->table = $table;
  }
  /**
   * @return Table
   */
  public function getTable()
  {
    return $this->table;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param AffineTransform
   */
  public function setTransform(AffineTransform $transform)
  {
    $this->transform = $transform;
  }
  /**
   * @return AffineTransform
   */
  public function getTransform()
  {
    return $this->transform;
  }
  /**
   * @param Video
   */
  public function setVideo(Video $video)
  {
    $this->video = $video;
  }
  /**
   * @return Video
   */
  public function getVideo()
  {
    return $this->video;
  }
  /**
   * @param WordArt
   */
  public function setWordArt(WordArt $wordArt)
  {
    $this->wordArt = $wordArt;
  }
  /**
   * @return WordArt
   */
  public function getWordArt()
  {
    return $this->wordArt;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PageElement::class, 'Google_Service_Slides_PageElement');
