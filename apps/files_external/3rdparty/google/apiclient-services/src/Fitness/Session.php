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

namespace Google\Service\Fitness;

class Session extends \Google\Model
{
  /**
   * @var string
   */
  public $activeTimeMillis;
  /**
   * @var int
   */
  public $activityType;
  protected $applicationType = Application::class;
  protected $applicationDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $endTimeMillis;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $modifiedTimeMillis;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $startTimeMillis;

  /**
   * @param string
   */
  public function setActiveTimeMillis($activeTimeMillis)
  {
    $this->activeTimeMillis = $activeTimeMillis;
  }
  /**
   * @return string
   */
  public function getActiveTimeMillis()
  {
    return $this->activeTimeMillis;
  }
  /**
   * @param int
   */
  public function setActivityType($activityType)
  {
    $this->activityType = $activityType;
  }
  /**
   * @return int
   */
  public function getActivityType()
  {
    return $this->activityType;
  }
  /**
   * @param Application
   */
  public function setApplication(Application $application)
  {
    $this->application = $application;
  }
  /**
   * @return Application
   */
  public function getApplication()
  {
    return $this->application;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setEndTimeMillis($endTimeMillis)
  {
    $this->endTimeMillis = $endTimeMillis;
  }
  /**
   * @return string
   */
  public function getEndTimeMillis()
  {
    return $this->endTimeMillis;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setModifiedTimeMillis($modifiedTimeMillis)
  {
    $this->modifiedTimeMillis = $modifiedTimeMillis;
  }
  /**
   * @return string
   */
  public function getModifiedTimeMillis()
  {
    return $this->modifiedTimeMillis;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setStartTimeMillis($startTimeMillis)
  {
    $this->startTimeMillis = $startTimeMillis;
  }
  /**
   * @return string
   */
  public function getStartTimeMillis()
  {
    return $this->startTimeMillis;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Session::class, 'Google_Service_Fitness_Session');
