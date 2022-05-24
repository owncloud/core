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

namespace Google\Service\SemanticTile;

class Line extends \Google\Model
{
  protected $basemapZOrderType = BasemapZOrder::class;
  protected $basemapZOrderDataType = '';
  protected $vertexOffsetsType = Vertex2DList::class;
  protected $vertexOffsetsDataType = '';
  public $zOrder;

  /**
   * @param BasemapZOrder
   */
  public function setBasemapZOrder(BasemapZOrder $basemapZOrder)
  {
    $this->basemapZOrder = $basemapZOrder;
  }
  /**
   * @return BasemapZOrder
   */
  public function getBasemapZOrder()
  {
    return $this->basemapZOrder;
  }
  /**
   * @param Vertex2DList
   */
  public function setVertexOffsets(Vertex2DList $vertexOffsets)
  {
    $this->vertexOffsets = $vertexOffsets;
  }
  /**
   * @return Vertex2DList
   */
  public function getVertexOffsets()
  {
    return $this->vertexOffsets;
  }
  public function setZOrder($zOrder)
  {
    $this->zOrder = $zOrder;
  }
  public function getZOrder()
  {
    return $this->zOrder;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Line::class, 'Google_Service_SemanticTile_Line');
