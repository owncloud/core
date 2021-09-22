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

namespace Google\Service\DriveActivity;

class Comment extends \Google\Collection
{
  protected $collection_key = 'mentionedUsers';
  protected $assignmentType = Assignment::class;
  protected $assignmentDataType = '';
  protected $mentionedUsersType = User::class;
  protected $mentionedUsersDataType = 'array';
  protected $postType = Post::class;
  protected $postDataType = '';
  protected $suggestionType = Suggestion::class;
  protected $suggestionDataType = '';

  /**
   * @param Assignment
   */
  public function setAssignment(Assignment $assignment)
  {
    $this->assignment = $assignment;
  }
  /**
   * @return Assignment
   */
  public function getAssignment()
  {
    return $this->assignment;
  }
  /**
   * @param User[]
   */
  public function setMentionedUsers($mentionedUsers)
  {
    $this->mentionedUsers = $mentionedUsers;
  }
  /**
   * @return User[]
   */
  public function getMentionedUsers()
  {
    return $this->mentionedUsers;
  }
  /**
   * @param Post
   */
  public function setPost(Post $post)
  {
    $this->post = $post;
  }
  /**
   * @return Post
   */
  public function getPost()
  {
    return $this->post;
  }
  /**
   * @param Suggestion
   */
  public function setSuggestion(Suggestion $suggestion)
  {
    $this->suggestion = $suggestion;
  }
  /**
   * @return Suggestion
   */
  public function getSuggestion()
  {
    return $this->suggestion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Comment::class, 'Google_Service_DriveActivity_Comment');
