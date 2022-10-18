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

class GeostoreTransitLineVariantProto extends \Google\Collection
{
  protected $collection_key = 'stops';
  protected $lineConceptType = GeostoreFeatureIdProto::class;
  protected $lineConceptDataType = '';
  protected $stopsType = GeostoreServicedStopProto::class;
  protected $stopsDataType = 'array';

  /**
   * @param GeostoreFeatureIdProto
   */
  public function setLineConcept(GeostoreFeatureIdProto $lineConcept)
  {
    $this->lineConcept = $lineConcept;
  }
  /**
   * @return GeostoreFeatureIdProto
   */
  public function getLineConcept()
  {
    return $this->lineConcept;
  }
  /**
   * @param GeostoreServicedStopProto[]
   */
  public function setStops($stops)
  {
    $this->stops = $stops;
  }
  /**
   * @return GeostoreServicedStopProto[]
   */
  public function getStops()
  {
    return $this->stops;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreTransitLineVariantProto::class, 'Google_Service_Contentwarehouse_GeostoreTransitLineVariantProto');
