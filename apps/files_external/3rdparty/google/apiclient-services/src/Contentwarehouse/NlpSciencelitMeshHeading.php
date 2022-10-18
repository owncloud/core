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

class NlpSciencelitMeshHeading extends \Google\Collection
{
  protected $collection_key = 'meshQualifier';
  protected $meshDescriptorType = NlpSciencelitSubjectHeading::class;
  protected $meshDescriptorDataType = '';
  protected $meshQualifierType = NlpSciencelitSubjectHeading::class;
  protected $meshQualifierDataType = 'array';

  /**
   * @param NlpSciencelitSubjectHeading
   */
  public function setMeshDescriptor(NlpSciencelitSubjectHeading $meshDescriptor)
  {
    $this->meshDescriptor = $meshDescriptor;
  }
  /**
   * @return NlpSciencelitSubjectHeading
   */
  public function getMeshDescriptor()
  {
    return $this->meshDescriptor;
  }
  /**
   * @param NlpSciencelitSubjectHeading[]
   */
  public function setMeshQualifier($meshQualifier)
  {
    $this->meshQualifier = $meshQualifier;
  }
  /**
   * @return NlpSciencelitSubjectHeading[]
   */
  public function getMeshQualifier()
  {
    return $this->meshQualifier;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSciencelitMeshHeading::class, 'Google_Service_Contentwarehouse_NlpSciencelitMeshHeading');
