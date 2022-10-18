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

namespace Google\Service\Contentwarehouse;

class DrishtiVesperVideoThumbnail extends \Google\Collection
{
  protected $collection_key = 'thumbnails';
  /**
   * @var string
   */
  public $id;
  protected $movingThumbnailsType = DrishtiVesperMovingThumbnail::class;
  protected $movingThumbnailsDataType = 'array';
  protected $thumbnailsType = DrishtiVesperThumbnail::class;
  protected $thumbnailsDataType = 'array';

  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param DrishtiVesperMovingThumbnail[]
   */
  public function setMovingThumbnails($movingThumbnails)
  {
    $this->movingThumbnails = $movingThumbnails;
  }
  /**
   * @return DrishtiVesperMovingThumbnail[]
   */
  public function getMovingThumbnails()
  {
    return $this->movingThumbnails;
  }
  /**
   * @param DrishtiVesperThumbnail[]
   */
  public function setThumbnails($thumbnails)
  {
    $this->thumbnails = $thumbnails;
  }
  /**
   * @return DrishtiVesperThumbnail[]
   */
  public function getThumbnails()
  {
    return $this->thumbnails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DrishtiVesperVideoThumbnail::class, 'Google_Service_Contentwarehouse_DrishtiVesperVideoThumbnail');
