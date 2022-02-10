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

namespace Google\Service\Classroom;

class GradebookSettings extends \Google\Collection
{
  protected $collection_key = 'gradeCategories';
  /**
   * @var string
   */
  public $calculationType;
  /**
   * @var string
   */
  public $displaySetting;
  protected $gradeCategoriesType = GradeCategory::class;
  protected $gradeCategoriesDataType = 'array';

  /**
   * @param string
   */
  public function setCalculationType($calculationType)
  {
    $this->calculationType = $calculationType;
  }
  /**
   * @return string
   */
  public function getCalculationType()
  {
    return $this->calculationType;
  }
  /**
   * @param string
   */
  public function setDisplaySetting($displaySetting)
  {
    $this->displaySetting = $displaySetting;
  }
  /**
   * @return string
   */
  public function getDisplaySetting()
  {
    return $this->displaySetting;
  }
  /**
   * @param GradeCategory[]
   */
  public function setGradeCategories($gradeCategories)
  {
    $this->gradeCategories = $gradeCategories;
  }
  /**
   * @return GradeCategory[]
   */
  public function getGradeCategories()
  {
    return $this->gradeCategories;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GradebookSettings::class, 'Google_Service_Classroom_GradebookSettings');
