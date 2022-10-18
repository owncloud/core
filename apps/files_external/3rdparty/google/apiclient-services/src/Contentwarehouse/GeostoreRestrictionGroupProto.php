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

namespace Google\Service\Contentwarehouse;

class GeostoreRestrictionGroupProto extends \Google\Collection
{
  protected $collection_key = 'segment';
  protected $metadataType = GeostoreFieldMetadataProto::class;
  protected $metadataDataType = '';
  protected $segmentType = GeostoreFeatureIdProto::class;
  protected $segmentDataType = 'array';

  /**
   * @param GeostoreFieldMetadataProto
   */
  public function setMetadata(GeostoreFieldMetadataProto $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GeostoreFieldMetadataProto
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param GeostoreFeatureIdProto[]
   */
  public function setSegment($segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return GeostoreFeatureIdProto[]
   */
  public function getSegment()
  {
    return $this->segment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreRestrictionGroupProto::class, 'Google_Service_Contentwarehouse_GeostoreRestrictionGroupProto');
