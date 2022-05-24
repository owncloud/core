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

class Paragraph extends \Google\Collection
{
  protected $collection_key = 'positionedObjectIds';
  protected $bulletType = Bullet::class;
  protected $bulletDataType = '';
  protected $elementsType = ParagraphElement::class;
  protected $elementsDataType = 'array';
  protected $paragraphStyleType = ParagraphStyle::class;
  protected $paragraphStyleDataType = '';
  /**
   * @var string[]
   */
  public $positionedObjectIds;
  protected $suggestedBulletChangesType = SuggestedBullet::class;
  protected $suggestedBulletChangesDataType = 'map';
  protected $suggestedParagraphStyleChangesType = SuggestedParagraphStyle::class;
  protected $suggestedParagraphStyleChangesDataType = 'map';
  protected $suggestedPositionedObjectIdsType = ObjectReferences::class;
  protected $suggestedPositionedObjectIdsDataType = 'map';

  /**
   * @param Bullet
   */
  public function setBullet(Bullet $bullet)
  {
    $this->bullet = $bullet;
  }
  /**
   * @return Bullet
   */
  public function getBullet()
  {
    return $this->bullet;
  }
  /**
   * @param ParagraphElement[]
   */
  public function setElements($elements)
  {
    $this->elements = $elements;
  }
  /**
   * @return ParagraphElement[]
   */
  public function getElements()
  {
    return $this->elements;
  }
  /**
   * @param ParagraphStyle
   */
  public function setParagraphStyle(ParagraphStyle $paragraphStyle)
  {
    $this->paragraphStyle = $paragraphStyle;
  }
  /**
   * @return ParagraphStyle
   */
  public function getParagraphStyle()
  {
    return $this->paragraphStyle;
  }
  /**
   * @param string[]
   */
  public function setPositionedObjectIds($positionedObjectIds)
  {
    $this->positionedObjectIds = $positionedObjectIds;
  }
  /**
   * @return string[]
   */
  public function getPositionedObjectIds()
  {
    return $this->positionedObjectIds;
  }
  /**
   * @param SuggestedBullet[]
   */
  public function setSuggestedBulletChanges($suggestedBulletChanges)
  {
    $this->suggestedBulletChanges = $suggestedBulletChanges;
  }
  /**
   * @return SuggestedBullet[]
   */
  public function getSuggestedBulletChanges()
  {
    return $this->suggestedBulletChanges;
  }
  /**
   * @param SuggestedParagraphStyle[]
   */
  public function setSuggestedParagraphStyleChanges($suggestedParagraphStyleChanges)
  {
    $this->suggestedParagraphStyleChanges = $suggestedParagraphStyleChanges;
  }
  /**
   * @return SuggestedParagraphStyle[]
   */
  public function getSuggestedParagraphStyleChanges()
  {
    return $this->suggestedParagraphStyleChanges;
  }
  /**
   * @param ObjectReferences[]
   */
  public function setSuggestedPositionedObjectIds($suggestedPositionedObjectIds)
  {
    $this->suggestedPositionedObjectIds = $suggestedPositionedObjectIds;
  }
  /**
   * @return ObjectReferences[]
   */
  public function getSuggestedPositionedObjectIds()
  {
    return $this->suggestedPositionedObjectIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Paragraph::class, 'Google_Service_Docs_Paragraph');
