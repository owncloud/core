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

namespace Google\Service\Vision;

class CropHint extends \Google\Model
{
  protected $boundingPolyType = BoundingPoly::class;
  protected $boundingPolyDataType = '';
  public $confidence;
  public $importanceFraction;

  /**
   * @param BoundingPoly
   */
  public function setBoundingPoly(BoundingPoly $boundingPoly)
  {
    $this->boundingPoly = $boundingPoly;
  }
  /**
   * @return BoundingPoly
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
  public function setImportanceFraction($importanceFraction)
  {
    $this->importanceFraction = $importanceFraction;
  }
  public function getImportanceFraction()
  {
    return $this->importanceFraction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CropHint::class, 'Google_Service_Vision_CropHint');
