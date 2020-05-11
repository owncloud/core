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

class Google_Service_DriveActivity_Comment extends Google_Collection
{
  protected $collection_key = 'mentionedUsers';
  protected $assignmentType = 'Google_Service_DriveActivity_Assignment';
  protected $assignmentDataType = '';
  protected $mentionedUsersType = 'Google_Service_DriveActivity_User';
  protected $mentionedUsersDataType = 'array';
  protected $postType = 'Google_Service_DriveActivity_Post';
  protected $postDataType = '';
  protected $suggestionType = 'Google_Service_DriveActivity_Suggestion';
  protected $suggestionDataType = '';

  /**
   * @param Google_Service_DriveActivity_Assignment
   */
  public function setAssignment(Google_Service_DriveActivity_Assignment $assignment)
  {
    $this->assignment = $assignment;
  }
  /**
   * @return Google_Service_DriveActivity_Assignment
   */
  public function getAssignment()
  {
    return $this->assignment;
  }
  /**
   * @param Google_Service_DriveActivity_User
   */
  public function setMentionedUsers($mentionedUsers)
  {
    $this->mentionedUsers = $mentionedUsers;
  }
  /**
   * @return Google_Service_DriveActivity_User
   */
  public function getMentionedUsers()
  {
    return $this->mentionedUsers;
  }
  /**
   * @param Google_Service_DriveActivity_Post
   */
  public function setPost(Google_Service_DriveActivity_Post $post)
  {
    $this->post = $post;
  }
  /**
   * @return Google_Service_DriveActivity_Post
   */
  public function getPost()
  {
    return $this->post;
  }
  /**
   * @param Google_Service_DriveActivity_Suggestion
   */
  public function setSuggestion(Google_Service_DriveActivity_Suggestion $suggestion)
  {
    $this->suggestion = $suggestion;
  }
  /**
   * @return Google_Service_DriveActivity_Suggestion
   */
  public function getSuggestion()
  {
    return $this->suggestion;
  }
}
