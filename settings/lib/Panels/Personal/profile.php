<?php
/**
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OC\Settings\Panels\Personal;

use OCP\Settings\IPanel;
use OCP\IConfig;
use OCP\Template;
use OCP\IGroupManager;
use OCP\IUserSession;
use OCP\IUser;

class Profile extends IPanel {

    /* @var IConfig */
    protected $config;

    /* @var IGroupManager */
    protected $groupManager;

    /* @var IUser */
    protected $user;

    public function __construct(
        IConfig $config,
        IGroupManager $groupManager,
        IUserSession $userSession) {
      $this->config = $config;
      $this->groupManager = $groupManager;
      $this->user = $userSession->getUser();
    }

    public function getPriority() {
      return 0;
    }

    public function getPanel() {
      $tmpl = new Template('settings', 'panels/personal/profile');
      $tmpl->assign('displayName', $this->user->getDisplayName());
      $tmpl->assign('enableAvatars', $this->config->getSystemValue('enable_avatars', true) === true);
      $tmpl->assign('avatarChangeSupported', $this->user->canUserChangeAvatar());
      $tmpl->assign('displayNameChangeSupported', $this->user->canUserChangeDisplayName());
      $tmpl->assign('passwordChangeSupported', $this->user->canUserChangePassword());
      $tmpl->assign('email', $email);
      $groups = $this->groupManager->getUserIdGroups($this->user);
      $groups2 = array_map(function($group) { return $group->getGID(); }, $groups);
      sort($groups2);
      $tmpl->assign('groups', $groups2);
      $tmpl->assign('languages', $languages);
      $tmpl->assign('activelanguage', $userLang);
      $tmpl->assign('commonlanguages', $commonLanguages);
      return $tmpl;
    }

    public function getSectionID() {
      return 'general';
    }

    public function getName() {
      return 'Profile';
    }

}
