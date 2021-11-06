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

class Response extends \Google\Model
{
  protected $createImageType = CreateImageResponse::class;
  protected $createImageDataType = '';
  protected $createLineType = CreateLineResponse::class;
  protected $createLineDataType = '';
  protected $createShapeType = CreateShapeResponse::class;
  protected $createShapeDataType = '';
  protected $createSheetsChartType = CreateSheetsChartResponse::class;
  protected $createSheetsChartDataType = '';
  protected $createSlideType = CreateSlideResponse::class;
  protected $createSlideDataType = '';
  protected $createTableType = CreateTableResponse::class;
  protected $createTableDataType = '';
  protected $createVideoType = CreateVideoResponse::class;
  protected $createVideoDataType = '';
  protected $duplicateObjectType = DuplicateObjectResponse::class;
  protected $duplicateObjectDataType = '';
  protected $groupObjectsType = GroupObjectsResponse::class;
  protected $groupObjectsDataType = '';
  protected $replaceAllShapesWithImageType = ReplaceAllShapesWithImageResponse::class;
  protected $replaceAllShapesWithImageDataType = '';
  protected $replaceAllShapesWithSheetsChartType = ReplaceAllShapesWithSheetsChartResponse::class;
  protected $replaceAllShapesWithSheetsChartDataType = '';
  protected $replaceAllTextType = ReplaceAllTextResponse::class;
  protected $replaceAllTextDataType = '';

  /**
   * @param CreateImageResponse
   */
  public function setCreateImage(CreateImageResponse $createImage)
  {
    $this->createImage = $createImage;
  }
  /**
   * @return CreateImageResponse
   */
  public function getCreateImage()
  {
    return $this->createImage;
  }
  /**
   * @param CreateLineResponse
   */
  public function setCreateLine(CreateLineResponse $createLine)
  {
    $this->createLine = $createLine;
  }
  /**
   * @return CreateLineResponse
   */
  public function getCreateLine()
  {
    return $this->createLine;
  }
  /**
   * @param CreateShapeResponse
   */
  public function setCreateShape(CreateShapeResponse $createShape)
  {
    $this->createShape = $createShape;
  }
  /**
   * @return CreateShapeResponse
   */
  public function getCreateShape()
  {
    return $this->createShape;
  }
  /**
   * @param CreateSheetsChartResponse
   */
  public function setCreateSheetsChart(CreateSheetsChartResponse $createSheetsChart)
  {
    $this->createSheetsChart = $createSheetsChart;
  }
  /**
   * @return CreateSheetsChartResponse
   */
  public function getCreateSheetsChart()
  {
    return $this->createSheetsChart;
  }
  /**
   * @param CreateSlideResponse
   */
  public function setCreateSlide(CreateSlideResponse $createSlide)
  {
    $this->createSlide = $createSlide;
  }
  /**
   * @return CreateSlideResponse
   */
  public function getCreateSlide()
  {
    return $this->createSlide;
  }
  /**
   * @param CreateTableResponse
   */
  public function setCreateTable(CreateTableResponse $createTable)
  {
    $this->createTable = $createTable;
  }
  /**
   * @return CreateTableResponse
   */
  public function getCreateTable()
  {
    return $this->createTable;
  }
  /**
   * @param CreateVideoResponse
   */
  public function setCreateVideo(CreateVideoResponse $createVideo)
  {
    $this->createVideo = $createVideo;
  }
  /**
   * @return CreateVideoResponse
   */
  public function getCreateVideo()
  {
    return $this->createVideo;
  }
  /**
   * @param DuplicateObjectResponse
   */
  public function setDuplicateObject(DuplicateObjectResponse $duplicateObject)
  {
    $this->duplicateObject = $duplicateObject;
  }
  /**
   * @return DuplicateObjectResponse
   */
  public function getDuplicateObject()
  {
    return $this->duplicateObject;
  }
  /**
   * @param GroupObjectsResponse
   */
  public function setGroupObjects(GroupObjectsResponse $groupObjects)
  {
    $this->groupObjects = $groupObjects;
  }
  /**
   * @return GroupObjectsResponse
   */
  public function getGroupObjects()
  {
    return $this->groupObjects;
  }
  /**
   * @param ReplaceAllShapesWithImageResponse
   */
  public function setReplaceAllShapesWithImage(ReplaceAllShapesWithImageResponse $replaceAllShapesWithImage)
  {
    $this->replaceAllShapesWithImage = $replaceAllShapesWithImage;
  }
  /**
   * @return ReplaceAllShapesWithImageResponse
   */
  public function getReplaceAllShapesWithImage()
  {
    return $this->replaceAllShapesWithImage;
  }
  /**
   * @param ReplaceAllShapesWithSheetsChartResponse
   */
  public function setReplaceAllShapesWithSheetsChart(ReplaceAllShapesWithSheetsChartResponse $replaceAllShapesWithSheetsChart)
  {
    $this->replaceAllShapesWithSheetsChart = $replaceAllShapesWithSheetsChart;
  }
  /**
   * @return ReplaceAllShapesWithSheetsChartResponse
   */
  public function getReplaceAllShapesWithSheetsChart()
  {
    return $this->replaceAllShapesWithSheetsChart;
  }
  /**
   * @param ReplaceAllTextResponse
   */
  public function setReplaceAllText(ReplaceAllTextResponse $replaceAllText)
  {
    $this->replaceAllText = $replaceAllText;
  }
  /**
   * @return ReplaceAllTextResponse
   */
  public function getReplaceAllText()
  {
    return $this->replaceAllText;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Response::class, 'Google_Service_Slides_Response');
