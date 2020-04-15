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

class Google_Service_Digitalassetlinks_Statement extends Google_Model
{
  public $relation;
  protected $sourceType = 'Google_Service_Digitalassetlinks_Asset';
  protected $sourceDataType = '';
  protected $targetType = 'Google_Service_Digitalassetlinks_Asset';
  protected $targetDataType = '';

  public function setRelation($relation)
  {
    $this->relation = $relation;
  }
  public function getRelation()
  {
    return $this->relation;
  }
  /**
   * @param Google_Service_Digitalassetlinks_Asset
   */
  public function setSource(Google_Service_Digitalassetlinks_Asset $source)
  {
    $this->source = $source;
  }
  /**
   * @return Google_Service_Digitalassetlinks_Asset
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param Google_Service_Digitalassetlinks_Asset
   */
  public function setTarget(Google_Service_Digitalassetlinks_Asset $target)
  {
    $this->target = $target;
  }
  /**
   * @return Google_Service_Digitalassetlinks_Asset
   */
  public function getTarget()
  {
    return $this->target;
  }
}
