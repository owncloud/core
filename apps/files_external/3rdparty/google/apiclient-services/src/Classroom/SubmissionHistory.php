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

class SubmissionHistory extends \Google\Model
{
  protected $gradeHistoryType = GradeHistory::class;
  protected $gradeHistoryDataType = '';
  protected $stateHistoryType = StateHistory::class;
  protected $stateHistoryDataType = '';

  /**
   * @param GradeHistory
   */
  public function setGradeHistory(GradeHistory $gradeHistory)
  {
    $this->gradeHistory = $gradeHistory;
  }
  /**
   * @return GradeHistory
   */
  public function getGradeHistory()
  {
    return $this->gradeHistory;
  }
  /**
   * @param StateHistory
   */
  public function setStateHistory(StateHistory $stateHistory)
  {
    $this->stateHistory = $stateHistory;
  }
  /**
   * @return StateHistory
   */
  public function getStateHistory()
  {
    return $this->stateHistory;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SubmissionHistory::class, 'Google_Service_Classroom_SubmissionHistory');
