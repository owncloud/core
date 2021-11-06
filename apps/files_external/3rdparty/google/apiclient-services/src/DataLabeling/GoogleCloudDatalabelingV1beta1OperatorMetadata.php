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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1beta1OperatorMetadata extends \Google\Collection
{
  protected $collection_key = 'comments';
  public $comments;
  public $labelVotes;
  public $score;
  public $totalVotes;

  public function setComments($comments)
  {
    $this->comments = $comments;
  }
  public function getComments()
  {
    return $this->comments;
  }
  public function setLabelVotes($labelVotes)
  {
    $this->labelVotes = $labelVotes;
  }
  public function getLabelVotes()
  {
    return $this->labelVotes;
  }
  public function setScore($score)
  {
    $this->score = $score;
  }
  public function getScore()
  {
    return $this->score;
  }
  public function setTotalVotes($totalVotes)
  {
    $this->totalVotes = $totalVotes;
  }
  public function getTotalVotes()
  {
    return $this->totalVotes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1OperatorMetadata::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1OperatorMetadata');
