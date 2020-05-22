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

class Google_Service_Docs_PositionedObjectProperties extends Google_Model
{
  protected $embeddedObjectType = 'Google_Service_Docs_EmbeddedObject';
  protected $embeddedObjectDataType = '';
  protected $positioningType = 'Google_Service_Docs_PositionedObjectPositioning';
  protected $positioningDataType = '';

  /**
   * @param Google_Service_Docs_EmbeddedObject
   */
  public function setEmbeddedObject(Google_Service_Docs_EmbeddedObject $embeddedObject)
  {
    $this->embeddedObject = $embeddedObject;
  }
  /**
   * @return Google_Service_Docs_EmbeddedObject
   */
  public function getEmbeddedObject()
  {
    return $this->embeddedObject;
  }
  /**
   * @param Google_Service_Docs_PositionedObjectPositioning
   */
  public function setPositioning(Google_Service_Docs_PositionedObjectPositioning $positioning)
  {
    $this->positioning = $positioning;
  }
  /**
   * @return Google_Service_Docs_PositionedObjectPositioning
   */
  public function getPositioning()
  {
    return $this->positioning;
  }
}
