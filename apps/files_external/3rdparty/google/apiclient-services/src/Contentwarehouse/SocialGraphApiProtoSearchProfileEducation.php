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

class SocialGraphApiProtoSearchProfileEducation extends \Google\Collection
{
  protected $collection_key = 'fieldOfStudy';
  protected $endTimeType = GoogleTypeDate::class;
  protected $endTimeDataType = '';
  protected $fieldOfStudyType = SocialGraphApiProtoSearchProfileEntity::class;
  protected $fieldOfStudyDataType = 'array';
  protected $institutionType = SocialGraphApiProtoSearchProfileEntity::class;
  protected $institutionDataType = '';
  protected $startTimeType = GoogleTypeDate::class;
  protected $startTimeDataType = '';

  /**
   * @param GoogleTypeDate
   */
  public function setEndTime(GoogleTypeDate $endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param SocialGraphApiProtoSearchProfileEntity[]
   */
  public function setFieldOfStudy($fieldOfStudy)
  {
    $this->fieldOfStudy = $fieldOfStudy;
  }
  /**
   * @return SocialGraphApiProtoSearchProfileEntity[]
   */
  public function getFieldOfStudy()
  {
    return $this->fieldOfStudy;
  }
  /**
   * @param SocialGraphApiProtoSearchProfileEntity
   */
  public function setInstitution(SocialGraphApiProtoSearchProfileEntity $institution)
  {
    $this->institution = $institution;
  }
  /**
   * @return SocialGraphApiProtoSearchProfileEntity
   */
  public function getInstitution()
  {
    return $this->institution;
  }
  /**
   * @param GoogleTypeDate
   */
  public function setStartTime(GoogleTypeDate $startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialGraphApiProtoSearchProfileEducation::class, 'Google_Service_Contentwarehouse_SocialGraphApiProtoSearchProfileEducation');
