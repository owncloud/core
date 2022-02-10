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

class UpdatePageElementTransformRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $applyMode;
  /**
   * @var string
   */
  public $objectId;
  protected $transformType = AffineTransform::class;
  protected $transformDataType = '';

  /**
   * @param string
   */
  public function setApplyMode($applyMode)
  {
    $this->applyMode = $applyMode;
  }
  /**
   * @return string
   */
  public function getApplyMode()
  {
    return $this->applyMode;
  }
  /**
   * @param string
   */
  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  /**
   * @return string
   */
  public function getObjectId()
  {
    return $this->objectId;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdatePageElementTransformRequest::class, 'Google_Service_Slides_UpdatePageElementTransformRequest');
