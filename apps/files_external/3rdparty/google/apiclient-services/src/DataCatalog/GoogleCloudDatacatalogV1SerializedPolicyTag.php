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

namespace Google\Service\DataCatalog;

class GoogleCloudDatacatalogV1SerializedPolicyTag extends \Google\Collection
{
  protected $collection_key = 'childPolicyTags';
  protected $childPolicyTagsType = GoogleCloudDatacatalogV1SerializedPolicyTag::class;
  protected $childPolicyTagsDataType = 'array';
  public $description;
  public $displayName;
  public $policyTag;

  /**
   * @param GoogleCloudDatacatalogV1SerializedPolicyTag[]
   */
  public function setChildPolicyTags($childPolicyTags)
  {
    $this->childPolicyTags = $childPolicyTags;
  }
  /**
   * @return GoogleCloudDatacatalogV1SerializedPolicyTag[]
   */
  public function getChildPolicyTags()
  {
    return $this->childPolicyTags;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setPolicyTag($policyTag)
  {
    $this->policyTag = $policyTag;
  }
  public function getPolicyTag()
  {
    return $this->policyTag;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1SerializedPolicyTag::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1SerializedPolicyTag');
