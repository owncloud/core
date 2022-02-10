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

class PageBackgroundFill extends \Google\Model
{
  /**
   * @var string
   */
  public $propertyState;
  protected $solidFillType = SolidFill::class;
  protected $solidFillDataType = '';
  protected $stretchedPictureFillType = StretchedPictureFill::class;
  protected $stretchedPictureFillDataType = '';

  /**
   * @param string
   */
  public function setPropertyState($propertyState)
  {
    $this->propertyState = $propertyState;
  }
  /**
   * @return string
   */
  public function getPropertyState()
  {
    return $this->propertyState;
  }
  /**
   * @param SolidFill
   */
  public function setSolidFill(SolidFill $solidFill)
  {
    $this->solidFill = $solidFill;
  }
  /**
   * @return SolidFill
   */
  public function getSolidFill()
  {
    return $this->solidFill;
  }
  /**
   * @param StretchedPictureFill
   */
  public function setStretchedPictureFill(StretchedPictureFill $stretchedPictureFill)
  {
    $this->stretchedPictureFill = $stretchedPictureFill;
  }
  /**
   * @return StretchedPictureFill
   */
  public function getStretchedPictureFill()
  {
    return $this->stretchedPictureFill;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PageBackgroundFill::class, 'Google_Service_Slides_PageBackgroundFill');
