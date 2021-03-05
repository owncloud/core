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

class Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentProvenance extends Google_Collection
{
  protected $collection_key = 'parents';
  public $id;
  protected $parentsType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentProvenanceParent';
  protected $parentsDataType = 'array';
  public $revision;
  public $type;

  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentProvenanceParent[]
   */
  public function setParents($parents)
  {
    $this->parents = $parents;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentProvenanceParent[]
   */
  public function getParents()
  {
    return $this->parents;
  }
  public function setRevision($revision)
  {
    $this->revision = $revision;
  }
  public function getRevision()
  {
    return $this->revision;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
