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

class Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentEntityRelation extends Google_Model
{
  public $objectId;
  public $relation;
  public $subjectId;

  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  public function getObjectId()
  {
    return $this->objectId;
  }
  public function setRelation($relation)
  {
    $this->relation = $relation;
  }
  public function getRelation()
  {
    return $this->relation;
  }
  public function setSubjectId($subjectId)
  {
    $this->subjectId = $subjectId;
  }
  public function getSubjectId()
  {
    return $this->subjectId;
  }
}
