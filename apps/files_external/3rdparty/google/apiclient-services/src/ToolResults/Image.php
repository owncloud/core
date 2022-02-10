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

namespace Google\Service\ToolResults;

class Image extends \Google\Model
{
  protected $errorType = Status::class;
  protected $errorDataType = '';
  protected $sourceImageType = ToolOutputReference::class;
  protected $sourceImageDataType = '';
  /**
   * @var string
   */
  public $stepId;
  protected $thumbnailType = Thumbnail::class;
  protected $thumbnailDataType = '';

  /**
   * @param Status
   */
  public function setError(Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Status
   */
  public function getError()
  {
    return $this->error;
  }
  /**
   * @param ToolOutputReference
   */
  public function setSourceImage(ToolOutputReference $sourceImage)
  {
    $this->sourceImage = $sourceImage;
  }
  /**
   * @return ToolOutputReference
   */
  public function getSourceImage()
  {
    return $this->sourceImage;
  }
  /**
   * @param string
   */
  public function setStepId($stepId)
  {
    $this->stepId = $stepId;
  }
  /**
   * @return string
   */
  public function getStepId()
  {
    return $this->stepId;
  }
  /**
   * @param Thumbnail
   */
  public function setThumbnail(Thumbnail $thumbnail)
  {
    $this->thumbnail = $thumbnail;
  }
  /**
   * @return Thumbnail
   */
  public function getThumbnail()
  {
    return $this->thumbnail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Image::class, 'Google_Service_ToolResults_Image');
