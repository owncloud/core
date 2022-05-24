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

class Vertex2DList extends \Google\Collection
{
  protected $collection_key = 'yOffsets';
  public $xOffsets;
  public $yOffsets;

  public function setXOffsets($xOffsets)
  {
    $this->xOffsets = $xOffsets;
  }
  public function getXOffsets()
  {
    return $this->xOffsets;
  }
  public function setYOffsets($yOffsets)
  {
    $this->yOffsets = $yOffsets;
  }
  public function getYOffsets()
  {
    return $this->yOffsets;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Vertex2DList::class, 'Google_Service_SemanticTile_Vertex2DList');
