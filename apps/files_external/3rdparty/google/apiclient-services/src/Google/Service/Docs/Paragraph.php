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

class Google_Service_Docs_Paragraph extends Google_Collection
{
  protected $collection_key = 'positionedObjectIds';
  protected $bulletType = 'Google_Service_Docs_Bullet';
  protected $bulletDataType = '';
  protected $elementsType = 'Google_Service_Docs_ParagraphElement';
  protected $elementsDataType = 'array';
  protected $paragraphStyleType = 'Google_Service_Docs_ParagraphStyle';
  protected $paragraphStyleDataType = '';
  public $positionedObjectIds;
  protected $suggestedBulletChangesType = 'Google_Service_Docs_SuggestedBullet';
  protected $suggestedBulletChangesDataType = 'map';
  protected $suggestedParagraphStyleChangesType = 'Google_Service_Docs_SuggestedParagraphStyle';
  protected $suggestedParagraphStyleChangesDataType = 'map';
  protected $suggestedPositionedObjectIdsType = 'Google_Service_Docs_ObjectReferences';
  protected $suggestedPositionedObjectIdsDataType = 'map';

  /**
   * @param Google_Service_Docs_Bullet
   */
  public function setBullet(Google_Service_Docs_Bullet $bullet)
  {
    $this->bullet = $bullet;
  }
  /**
   * @return Google_Service_Docs_Bullet
   */
  public function getBullet()
  {
    return $this->bullet;
  }
  /**
   * @param Google_Service_Docs_ParagraphElement
   */
  public function setElements($elements)
  {
    $this->elements = $elements;
  }
  /**
   * @return Google_Service_Docs_ParagraphElement
   */
  public function getElements()
  {
    return $this->elements;
  }
  /**
   * @param Google_Service_Docs_ParagraphStyle
   */
  public function setParagraphStyle(Google_Service_Docs_ParagraphStyle $paragraphStyle)
  {
    $this->paragraphStyle = $paragraphStyle;
  }
  /**
   * @return Google_Service_Docs_ParagraphStyle
   */
  public function getParagraphStyle()
  {
    return $this->paragraphStyle;
  }
  public function setPositionedObjectIds($positionedObjectIds)
  {
    $this->positionedObjectIds = $positionedObjectIds;
  }
  public function getPositionedObjectIds()
  {
    return $this->positionedObjectIds;
  }
  /**
   * @param Google_Service_Docs_SuggestedBullet
   */
  public function setSuggestedBulletChanges($suggestedBulletChanges)
  {
    $this->suggestedBulletChanges = $suggestedBulletChanges;
  }
  /**
   * @return Google_Service_Docs_SuggestedBullet
   */
  public function getSuggestedBulletChanges()
  {
    return $this->suggestedBulletChanges;
  }
  /**
   * @param Google_Service_Docs_SuggestedParagraphStyle
   */
  public function setSuggestedParagraphStyleChanges($suggestedParagraphStyleChanges)
  {
    $this->suggestedParagraphStyleChanges = $suggestedParagraphStyleChanges;
  }
  /**
   * @return Google_Service_Docs_SuggestedParagraphStyle
   */
  public function getSuggestedParagraphStyleChanges()
  {
    return $this->suggestedParagraphStyleChanges;
  }
  /**
   * @param Google_Service_Docs_ObjectReferences
   */
  public function setSuggestedPositionedObjectIds($suggestedPositionedObjectIds)
  {
    $this->suggestedPositionedObjectIds = $suggestedPositionedObjectIds;
  }
  /**
   * @return Google_Service_Docs_ObjectReferences
   */
  public function getSuggestedPositionedObjectIds()
  {
    return $this->suggestedPositionedObjectIds;
  }
}
